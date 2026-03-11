<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\DocumentController;
use App\Models\User;
use App\Models\Document;

// ──────────────────────────────────────────
// Root Redirect
// ──────────────────────────────────────────
Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'signer'
            ? redirect()->route('dashboard.signer')
            : redirect()->route('dashboard.requestor');
    }
    return redirect()->route('login');
})->name('home');

// ──────────────────────────────────────────
// Guest Routes (Login / Register)
// ──────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login',     [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login',    [AuthenticatedSessionController::class, 'store']);
    Route::get('/register',  [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// ──────────────────────────────────────────
// Authenticated Routes
// ──────────────────────────────────────────
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // ── Dashboards ──────────────────────────
    Route::get('/dashboard/requestor', function () {
        if (auth()->user()->role !== 'requestor') {
            return redirect()->route('dashboard.signer');
        }
        return view('dashboard-requestor', [
            'signedCount'     => 0,
            'pendingCount'    => 0,
            'totalRequests'   => 0,
            'recentDocuments' => [],
        ]);
    })->name('dashboard.requestor');

    Route::get('/dashboard/signer', function () {
        if (auth()->user()->role !== 'signer') {
            return redirect()->route('dashboard.requestor');
        }
        return view('dashboard-signer', [
            'signedCount'  => 0,
            'pendingCount' => 0,
            'sentCount'    => 0,
            'documents'    => collect([]),
        ]);
    })->name('dashboard.signer');

    // ── Requestor Routes ────────────────────
    Route::get('/new-request', function () {
        $signees = User::whereIn('role', ['signee', 'signer'])->get();
        return view('new-request', compact('signees'));
    })->name('new-request');

    Route::post('/new-request', [DocumentController::class, 'store'])->name('documents.store');

    Route::get('/requestor/signed', function () {
        $documents = Document::where('status', 'signed')
            ->where('user_id', auth()->id())
            ->with('user')
            ->latest()
            ->get();
        return view('requestor-signed', compact('documents'));
    })->name('requestor.signed');

    Route::get('/requestor/pending', function () {
        $documents = Document::where('status', 'pending')
            ->where('user_id', auth()->id())
            ->with('user')
            ->latest()
            ->get();
        return view('requestor-pending', compact('documents'));
    })->name('requestor.pending');

    Route::get('/documents/{id}/download', function ($id) {
        $doc = Document::findOrFail($id);
        return \Storage::download($doc->path, $doc->title . '.pdf');
    })->name('documents.download');

    Route::get('/documents', function () {
        return redirect()->route('new-request');
    })->name('documents');

    // ── Signer / Signee Routes ───────────────
    Route::get('/inbox', function () {
        $documents    = Document::where('recipient_email', auth()->user()->email)
                            ->with('user')
                            ->latest()
                            ->get();
        $signedCount  = $documents->where('status', 'signed')->count();
        $pendingCount = $documents->where('status', 'pending')->count();
        $sentCount    = 0;

        return view('dashboard-signer-inbox', compact('documents', 'signedCount', 'pendingCount', 'sentCount'));
    })->name('inbox');

    Route::post('/documents/{id}/sign', [DocumentController::class, 'sign'])->name('documents.sign');

    // ── Signee Signed Documents ──────────────
    Route::get('/signee/signed', function () {
        $documents = Document::where('status', 'signed')
            ->where('recipient_email', auth()->user()->email)
            ->with('user')
            ->latest()
            ->get();
        return view('signee-signed', compact('documents'));
    })->name('signee.signed');

});

require __DIR__.'/settings.php';