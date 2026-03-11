<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'document'   => 'required|file|mimes:pdf|max:20480',
            'title'      => 'required|string|max:255',
            'recipients' => 'required|array|min:1',
        ]);

        $path = $request->file('document')->store('documents', 'public');

        foreach ($request->recipients as $recipient) {
            Document::create([
                'user_id'         => auth()->id(),
                'title'           => $request->title,
                'path'            => $path,
                'message'         => $request->message,
                'recipient_email' => $recipient['email'],
                'status'          => 'pending',
            ]);
        }

        return redirect()->route('new-request')->with('success', 'Request sent successfully!');
    }

    public function sign(Request $request, $id)
    {
        $doc = Document::findOrFail($id);

        if ($doc->recipient_email !== auth()->user()->email) {
            return response()->json(['success' => false, 'message' => 'Unauthorized.'], 403);
        }

        $user = auth()->user();
        if (!$user->esig) {
            return response()->json(['success' => false, 'message' => 'No e-signature found.'], 422);
        }

        $signatures = $request->input('signatures', []);

        $sourcePath = Storage::disk('public')->path($doc->path);
        $sigPath    = Storage::disk('public')->path($user->esig);
        $outputName = 'documents/signed_' . $doc->id . '_' . time() . '.pdf';
        $outputPath = Storage::disk('public')->path($outputName);

        try {
            $pdf       = new Fpdi();
            $pageCount = $pdf->setSourceFile($sourcePath);

            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $tplId = $pdf->importPage($pageNo);
                $size  = $pdf->getTemplateSize($tplId);

                $pdfW = $size['width'];
                $pdfH = $size['height'];

                $pdf->AddPage($pdfW > $pdfH ? 'L' : 'P', [$pdfW, $pdfH]);
                $pdf->useTemplate($tplId, 0, 0, $pdfW, $pdfH);

                $pageSigs = array_filter($signatures, fn($s) => (int)$s['page'] === $pageNo);

                foreach ($pageSigs as $sig) {
                    $cW = (float)($sig['canvas_w'] ?? 800);
                    $cH = (float)($sig['canvas_h'] ?? 1000);

                    $x = ((float)$sig['sig_x'] / $cW) * $pdfW;
                    $y = ((float)$sig['sig_y'] / $cH) * $pdfH;
                    $w = ((float)$sig['sig_w'] / $cW) * $pdfW;
                    $h = ((float)$sig['sig_h'] / $cH) * $pdfH;

                    $x = max(0, min($x, $pdfW - $w));
                    $y = max(0, min($y, $pdfH - $h));

                    $pdf->Image($sigPath, $x, $y, $w, $h, '');
                }
            }

            $pdf->Output('F', $outputPath);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'PDF error: ' . $e->getMessage()], 500);
        }

        $doc->update([
            'path'      => $outputName,
            'status'    => 'signed',
            'signed_at' => now(),
        ]);

        return response()->json(['success' => true]);
    }
}