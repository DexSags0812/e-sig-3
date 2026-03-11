<x-layouts::app>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';
</script>
<style>
    .dash-stat-card { background:#111111;border:1px solid #1f1f1f;border-radius:14px;padding:1.5rem;flex:1;transition:border-color .2s,transform .15s; }
    .dash-stat-card:hover { border-color:#2d2d2d;transform:translateY(-1px); }
    .dash-icon { width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:1rem; }
    .dash-icon svg { width:22px;height:22px; }
    .dash-stat-label { color:#71717a;font-size:.82rem;margin-bottom:.3rem;font-weight:500;letter-spacing:.01em; }
    .dash-stat-number { color:#fff;font-size:2rem;font-weight:700;line-height:1; }

    .inbox-card { background:#111111;border:1px solid #1f1f1f;border-radius:14px;padding:1.75rem 2rem;margin-bottom:20px;display:flex;align-items:flex-start;gap:1.25rem;transition:border-color .2s,transform .15s; }
    .inbox-card:hover { border-color:#2d2d2d;transform:translateY(-1px); }
    .doc-avatar { width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;flex-shrink:0;letter-spacing:.5px;color:#fff; }
    .doc-title { color:#f9fafb;font-size:.97rem;font-weight:600;margin-bottom:5px; }
    .doc-sender { color:#9ca3af;font-size:.82rem;margin-bottom:3px; }
    .doc-sender span { color:#d1d5db;font-weight:500; }
    .doc-meta { color:#6b7280;font-size:.78rem;margin-bottom:1rem; }
    .badge { display:inline-flex;align-items:center;gap:5px;border-radius:20px;padding:4px 12px;font-size:12px;font-weight:600;margin-right:4px; }
    .badge-pending { background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.3);color:#f59e0b; }
    .badge-completed { background:rgba(16,185,129,.12);border:1px solid rgba(16,185,129,.3);color:#10b981; }
    .badge-dot { width:7px;height:7px;border-radius:50%;background:currentColor; }
    .doc-action-meta { color:#6b7280;font-size:.78rem;display:inline-flex;align-items:center;gap:5px; }
    .doc-action-meta svg { width:13px;height:13px; }

    .btn-sign { background:#3b82f6;color:#fff;border:none;border-radius:8px;padding:8px 18px;font-size:13px;font-weight:600;cursor:pointer;transition:background .15s,transform .1s;text-decoration:none;display:inline-flex;align-items:center;gap:6px; }
    .btn-sign:hover { background:#2563eb;transform:translateY(-1px);color:#fff; }
    .btn-view { background:transparent;color:#9ca3af;border:1px solid #2a2a2a;border-radius:8px;padding:8px 18px;font-size:13px;font-weight:500;cursor:pointer;transition:all .15s;text-decoration:none;display:inline-flex;align-items:center; }
    .btn-view:hover { border-color:#444;color:#e5e7eb; }
    .btn-send { background:#10b981;color:#fff;border:none;border-radius:8px;padding:8px 18px;font-size:13px;font-weight:600;cursor:pointer;display:inline-flex;align-items:center;gap:6px;transition:background .15s; }
    .btn-send:hover { background:#059669; }
    .btn-send-disabled { opacity:.6;cursor:not-allowed; }

    .tab-nav { display:flex;gap:24px;border-bottom:1px solid #1f1f1f;margin-bottom:1.5rem; }
    .tab-btn { background:none;border:none;color:#6b7280;font-size:14px;font-weight:500;padding:10px 0;cursor:pointer;position:relative;transition:color .15s;display:inline-flex;align-items:center;gap:7px;text-decoration:none; }
    .tab-btn.active { color:#f9fafb; }
    .tab-btn.active::after { content:'';position:absolute;bottom:-1px;left:0;right:0;height:2px;background:#3b82f6;border-radius:2px; }
    .tab-badge { background:#3b82f6;color:#fff;border-radius:20px;padding:1px 7px;font-size:11px;font-weight:700; }

    .search-wrap { position:relative;flex:1; }
    .search-wrap svg { position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#4b5563;width:16px;height:16px; }
    .search-input { background:#111;border:1px solid #222;border-radius:10px;color:#e5e7eb;font-size:14px;padding:12px 16px 12px 44px;outline:none;width:100%;transition:border-color .2s; }
    .search-input::placeholder { color:#4b5563; }
    .search-input:focus { border-color:#3b82f6; }
    .filter-btn { background:#111;border:1px solid #222;border-radius:10px;color:#9ca3af;font-size:14px;padding:12px 20px;cursor:pointer;display:flex;align-items:center;gap:8px;transition:all .15s;white-space:nowrap; }
    .filter-btn:hover { border-color:#333;color:#e5e7eb; }

    @keyframes spin { from{transform:rotate(0deg)}to{transform:rotate(360deg)} }

    .modal-backdrop { position:fixed;inset:0;z-index:9999;display:flex;align-items:center;justify-content:center;padding:16px; }
    .modal-bg { position:absolute;inset:0;background:rgba(0,0,0,.85);backdrop-filter:blur(6px); }
    .modal-box { position:relative;background:#111;border:1px solid #2a2a2a;border-radius:16px;width:92%;max-width:980px;height:92vh;display:flex;flex-direction:column;overflow:hidden;box-shadow:0 30px 80px rgba(0,0,0,.9);margin:auto; }
    .modal-header { display:flex;align-items:center;justify-content:space-between;padding:.9rem 1.25rem;border-bottom:1px solid #1f1f1f;flex-shrink:0; }
    .modal-footer { display:flex;align-items:center;justify-content:space-between;padding:.65rem 1.25rem;border-top:1px solid #1f1f1f;flex-shrink:0; }
    .modal-body { flex:1;min-height:0;display:flex;overflow:hidden; }

    .sig-sidebar { width:108px;flex-shrink:0;background:#0c0c0c;border-right:1px solid #1a1a1a;display:flex;flex-direction:column;align-items:center;padding:1rem .5rem .75rem;gap:.6rem;overflow:hidden; }
    .sig-sidebar-label { color:#4b5563;font-size:.62rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;text-align:center;line-height:1.4; }
    .sig-divider { width:100%;height:1px;background:#1f1f1f; }
    .sig-chip { width:88px;min-height:50px;border:1.5px dashed #3b82f6;border-radius:8px;display:flex;align-items:center;justify-content:center;cursor:grab;background:rgba(59,130,246,.07);padding:5px;user-select:none;transition:background .15s,border-color .15s;position:relative;overflow:hidden; }
    .sig-chip:hover { background:rgba(59,130,246,.15);border-color:#60a5fa; }
    .sig-chip img { width:100%;height:auto;object-fit:contain;pointer-events:none;display:block; }
    .sig-chip-nosig { width:88px;border:1.5px dashed #f59e0b;border-radius:8px;background:rgba(245,158,11,.06);color:#f59e0b;font-size:.6rem;text-align:center;line-height:1.5;padding:8px 5px; }
    .page-badge { background:rgba(59,130,246,.1);border:1px solid rgba(59,130,246,.2);border-radius:6px;padding:3px 7px;color:#60a5fa;font-size:.6rem;font-weight:600;width:88px;text-align:center; }
    .sidebar-hint { margin-top:auto;color:#2a2a2a;font-size:.58rem;text-align:center;line-height:1.5;padding-top:.5rem; }

    .pdf-area { flex:1;min-width:0;min-height:0;display:flex;flex-direction:column;background:#0a0a0a; }

    /* PDF.js canvas container */
    .pdf-canvas-wrap {
        flex:1;
        min-height:0;
        position:relative;
        overflow:auto;
        background:#525659;
        display:flex;
        align-items:flex-start;
        justify-content:center;
    }
    .pdf-canvas-inner {
        position:relative;
        display:inline-block;
        margin: 8px auto;
    }
    #pdf-render-canvas {
        display:block;
        box-shadow:0 2px 12px rgba(0,0,0,.5);
    }
    .pdf-interact-layer {
        position:absolute;
        inset:0;
        z-index:5;
        cursor:crosshair;
    }

    .pdf-nav { display:flex;align-items:center;justify-content:center;gap:12px;padding:7px 16px;border-top:1px solid #1a1a1a;background:#0c0c0c;flex-shrink:0; }
    .nav-btn { background:#1a1a1a;border:1px solid #272727;border-radius:7px;color:#9ca3af;width:30px;height:30px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .15s; }
    .nav-btn:hover:not([disabled]) { border-color:#444;color:#fff;background:#222; }
    .nav-btn[disabled] { opacity:.25;cursor:not-allowed;pointer-events:none; }
    .nav-info { color:#6b7280;font-size:12px;font-weight:500;min-width:90px;text-align:center; }
    .nav-info strong { color:#e5e7eb; }

    .placed-sig { position:absolute;z-index:20;cursor:move;user-select:none; }
    .placed-sig img { width:100%;height:100%;object-fit:contain;display:block;pointer-events:none; }
    .placed-sig-border { position:absolute;inset:0;border:2px dashed #3b82f6;border-radius:4px;pointer-events:none; }
    .placed-sig-label { position:absolute;top:-22px;left:0;background:#3b82f6;color:#fff;font-size:10px;font-weight:600;padding:2px 8px;border-radius:4px;white-space:nowrap;pointer-events:none; }
    .placed-sig-resize { position:absolute;bottom:-5px;right:-5px;width:14px;height:14px;background:#3b82f6;border-radius:3px;cursor:se-resize;z-index:21; }
    .placed-sig-del { position:absolute;top:-22px;right:0;background:#ef4444;color:#fff;font-size:10px;font-weight:700;padding:2px 6px;border-radius:4px;cursor:pointer;border:none;line-height:1.4; }

    #sig-ghost { position:fixed;pointer-events:none;z-index:99999;width:180px;height:80px;opacity:.78;display:none; }
    #sig-ghost img { width:100%;height:100%;object-fit:contain;display:block; }
    #sig-ghost-border { position:absolute;inset:0;border:2px dashed #3b82f6;border-radius:4px; }
</style>

{{-- PDF.js from CDN --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
</script>

<div id="sig-ghost">
    @if(auth()->user()->esig)
        <img src="{{ asset('storage/' . auth()->user()->esig) }}" alt="" draggable="false">
    @endif
    <div id="sig-ghost-border"></div>
</div>

<div class="p-6 lg:p-10 max-w-5xl mx-auto">

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-white text-2xl font-bold tracking-tight mb-1">Inbox</h1>
            <p class="text-zinc-500 text-sm">Manage your signature requests and documents</p>
        </div>
    </div>

    <div class="flex gap-4 mb-8">
        <div class="dash-stat-card">
            <div class="dash-icon" style="background:rgba(34,197,94,.12);">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="color:#22c55e;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="dash-stat-label">Documents Signed</div>
            <div class="dash-stat-number">{{ $signedCount ?? 0 }}</div>
        </div>
        <div class="dash-stat-card">
            <div class="dash-icon" style="background:rgba(245,158,11,.12);">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="color:#f59e0b;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="dash-stat-label">Pending Signatures</div>
            <div class="dash-stat-number">{{ $pendingCount ?? 0 }}</div>
        </div>
        <div class="dash-stat-card">
            <div class="dash-icon" style="background:rgba(59,130,246,.12);">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="color:#3b82f6;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
            </div>
            <div class="dash-stat-label">Sent Requests</div>
            <div class="dash-stat-number">{{ $sentCount ?? 0 }}</div>
        </div>
    </div>

    <div class="flex gap-3 mb-6">
        <div class="search-wrap">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
            <input type="text" class="search-input" placeholder="Search documents...">
        </div>
        <button class="filter-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12"/></svg>
            Filter
        </button>
    </div>

    <div
        x-data="{
            activeTab: 'all',
            showModal: false,
            previewUrl: '',
            previewTitle: '',
            docId: null,
            sending: false,
            sendSuccess: false,
            sigSrc: '{{ auth()->user()->esig ? asset('storage/' . auth()->user()->esig) : '' }}',
            currentPage: 1,
            totalPages: 1,
            placements: {},
            ix: null,
            pdfDoc: null,
            renderScale: 1,
            canvasW: 0,
            canvasH: 0,

            getSig(pg,id)  { return (this.placements[pg]||[]).find(s=>s.id===id)||null; },
            pageSigs(pg)   { return this.placements[pg]||[]; },
            hasSigs()      { return Object.values(this.placements).some(a=>a&&a.length>0); },
            delSig(pg,id)  { if(this.placements[pg]) this.placements[pg]=this.placements[pg].filter(s=>s.id!==id); },

            open(url,title,id){
                this.previewUrl=url; this.previewTitle=title; this.docId=id;
                this.showModal=true; this.sendSuccess=false;
                this.placements={}; this.currentPage=1; this.totalPages=1; this.ix=null;
                this.pdfDoc=null; this.canvasW=0; this.canvasH=0;
                window.__sd=false;
                setTimeout(()=>this.loadPdf(), 300);
            },
            close(){
                this.showModal=false; this.previewUrl=''; this.docId=null;
                this.sendSuccess=false; this.placements={}; this.ix=null;
                window.__pdfDoc = null;
                window.__sd=false;
                const g=document.getElementById('sig-ghost'); if(g) g.style.display='none';
            },

            async loadPdf(){
                try {
                    console.log('Loading PDF:', this.previewUrl);
                    const loadingTask = pdfjsLib.getDocument({ url: this.previewUrl });
                    window.__pdfDoc = await loadingTask.promise;
                    this.totalPages = window.__pdfDoc.numPages;
                    console.log('PDF loaded, pages:', this.totalPages);
                    await this.renderPage(this.currentPage);
                } catch(e){
                    console.error('PDF load error:', e);
                    alert('Could not load PDF: ' + e.message);
                }
            },

            async renderPage(pageNum){
                if(!window.__pdfDoc) return;
                try {
                    const page = await window.__pdfDoc.getPage(pageNum);

                    await this.$nextTick();
                    const wrap = document.getElementById('pdf-canvas-wrap');
                    const containerW = wrap ? Math.max(wrap.clientWidth - 16, 400) : 400;

                    const viewport0 = page.getViewport({ scale: 1 });
                    const scale = containerW / viewport0.width;
                    const viewport = page.getViewport({ scale });

                    const canvas = document.getElementById('pdf-render-canvas');
                    if(!canvas) return;
                    canvas.width  = viewport.width;
                    canvas.height = viewport.height;
                    this.canvasW  = viewport.width;
                    this.canvasH  = viewport.height;

                    const inner = document.getElementById('pdf-canvas-inner');
                    if(inner){
                        inner.style.width  = viewport.width  + 'px';
                        inner.style.height = viewport.height + 'px';
                    }

                    const ctx = canvas.getContext('2d');
                    await page.render({ canvasContext: ctx, viewport }).promise;
                    console.log('Page rendered:', pageNum, viewport.width, 'x', viewport.height);
                } catch(e){
                    console.error('Render error:', e);
                }
            },

            async prev(){
                if(this.currentPage>1){
                    this.currentPage--;
                    await this.renderPage(this.currentPage);
                }
            },
            async next(){
                if(this.currentPage<this.totalPages){
                    this.currentPage++;
                    await this.renderPage(this.currentPage);
                }
            },

            chipDown(e){
                if(!this.sigSrc) return;
                e.preventDefault();
                window.__sd=true;
                const g=document.getElementById('sig-ghost');
                g.style.display='block';
                g.style.left=(e.clientX-90)+'px';
                g.style.top=(e.clientY-40)+'px';
            },

            moveDown(e,pg,id){
                if(e.target.classList.contains('placed-sig-resize')||
                   e.target.classList.contains('placed-sig-del')) return;
                const sig=this.getSig(pg,id); if(!sig) return;
                e.preventDefault(); e.stopPropagation();
                const cr=document.getElementById('pdf-canvas-inner').getBoundingClientRect();
                this.ix={ type:'move', pg, id,
                    offX:e.clientX-cr.left-sig.x,
                    offY:e.clientY-cr.top-sig.y, cr };
            },
            resizeDown(e,pg,id){
                e.preventDefault(); e.stopPropagation();
                const sig=this.getSig(pg,id); if(!sig) return;
                this.ix={ type:'resize', pg, id,
                    sx:e.clientX, sy:e.clientY, sw:sig.w, sh:sig.h };
            },

            gMove(e){
                if(window.__sd){
                    const g=document.getElementById('sig-ghost');
                    g.style.left=(e.clientX-90)+'px';
                    g.style.top=(e.clientY-40)+'px';
                }
                if(!this.ix) return;
                const sig=this.getSig(this.ix.pg,this.ix.id); if(!sig) return;
                if(this.ix.type==='move'){
                    const cr=this.ix.cr;
                    sig.x=Math.max(0,Math.min(e.clientX-cr.left-this.ix.offX, cr.width-sig.w));
                    sig.y=Math.max(0,Math.min(e.clientY-cr.top-this.ix.offY, cr.height-sig.h));
                } else {
                    sig.w=Math.max(60, this.ix.sw+(e.clientX-this.ix.sx));
                    sig.h=Math.max(30, this.ix.sh+(e.clientY-this.ix.sy));
                }
                e.preventDefault();
            },

            gUp(e){
                if(window.__sd){
                    window.__sd=false;
                    const g=document.getElementById('sig-ghost');
                    g.style.display='none';
                    const cv=document.getElementById('pdf-canvas-inner');
                    if(cv){
                        const cr=cv.getBoundingClientRect();
                        if(e.clientX>=cr.left&&e.clientX<=cr.right&&
                           e.clientY>=cr.top&&e.clientY<=cr.bottom){
                            const pg=this.currentPage;
                            if(!this.placements[pg]) this.placements[pg]=[];

                            const sigImg = new Image();
                            sigImg.src = this.sigSrc;
                            const naturalW = sigImg.naturalWidth || 180;
                            const naturalH = sigImg.naturalHeight || 80;
                            const sigW = 180;
                            const sigH = Math.round((naturalH / naturalW) * sigW);

                            this.placements[pg]=[
                                ...this.placements[pg],
                                { id:Date.now(),
                                x:Math.max(0,e.clientX-cr.left-90),
                                y:Math.max(0,e.clientY-cr.top-(sigH/2)),
                                w:sigW, h:sigH,
                                canvas_w: this.canvasW,
                                canvas_h: this.canvasH }
                            ];
                        }
                    }
                }
                this.ix=null;
            },

            async send(){
                if(!this.docId||this.sending) return;
                if(!this.hasSigs()){ alert('Place your signature on the document first.'); return; }
                this.sending=true;
                try {
                    const signatures=[];
                    for(const [pg,sigs] of Object.entries(this.placements)){
                        for(const s of sigs){
                            signatures.push({
                                page: parseInt(pg),
                                sig_x: s.x,
                                sig_y: s.y,
                                sig_w: s.w,
                                sig_h: s.h,
                                canvas_w: s.canvas_w,
                                canvas_h: s.canvas_h
                            });
                        }
                    }
                    const payload={ signatures };
                    const res=await fetch(`/documents/${this.docId}/sign`,{
                        method:'POST',
                        headers:{'Content-Type':'application/json',
                                 'X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content},
                        body:JSON.stringify(payload)
                    });
                    if(!res.ok){
                        alert(res.status===403?'Unauthorized.':
                              res.status===404?'Route not found.':
                              res.status===422?'Please upload your e-signature first.':
                              'Error '+res.status);
                        return;
                    }
                    const data=await res.json();
                    if(data.success){
                        this.sendSuccess=true;
                        setTimeout(()=>{ this.close(); window.location.reload(); },1200);
                    } else { alert(data.message||'Signing failed.'); }
                } catch(e){ alert('Network error: '+e.message); }
                finally { this.sending=false; }
            },
        }"
        @mousemove.window="gMove($event)"
        @mouseup.window="gUp($event)"
    >

        {{-- ═══════════ MODAL ═══════════ --}}
        <div x-show="showModal"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="modal-backdrop"
             @keydown.escape.window="close()">

            <div class="modal-bg" @click="close()"></div>

            <div x-show="showModal"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="modal-box">

                <div class="modal-header">
                    <div style="display:flex;align-items:center;gap:10px;">
                        <div style="background:rgba(59,130,246,.12);width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#3b82f6" stroke-width="2" width="18" height="18"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                        </div>
                        <div>
                            <div style="color:#f9fafb;font-weight:600;font-size:.95rem;" x-text="previewTitle"></div>
                            <div style="color:#6b7280;font-size:.72rem;">Hold &amp; drag your signature from the left panel onto the document</div>
                        </div>
                    </div>
                    <button @click="close()" style="background:#1a1a1a;border:1px solid #2a2a2a;border-radius:8px;width:32px;height:32px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#9ca3af;" onmouseover="this.style.borderColor='#444';this.style.color='#fff'" onmouseout="this.style.borderColor='#2a2a2a';this.style.color='#9ca3af'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="sig-sidebar">
                        <div class="sig-sidebar-label">Your<br>Signature</div>
                        <div class="sig-divider"></div>

                        <template x-if="sigSrc">
                            <div class="sig-chip" @mousedown.prevent="chipDown($event)" title="Hold and drag onto the document">
                                <img :src="sigSrc" alt="eSignature">
                                <div style="position:absolute;bottom:3px;left:50%;transform:translateX(-50%);font-size:.5rem;color:#3b82f6;font-weight:700;white-space:nowrap;pointer-events:none;">✦ HOLD &amp; DRAG</div>
                            </div>
                        </template>
                        <template x-if="!sigSrc">
                            <div class="sig-chip-nosig">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#f59e0b" stroke-width="1.5" width="22" height="22" style="margin:0 auto 4px;display:block;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                                No eSignature.<br>Upload in profile.
                            </div>
                        </template>

                        <div class="sig-divider"></div>

                        <template x-for="(sigs,pg) in placements" :key="pg">
                            <template x-if="sigs&&sigs.length>0">
                                <div class="page-badge" x-text="'P'+pg+': '+sigs.length+' sig'"></div>
                            </template>
                        </template>

                        <div class="sidebar-hint">Drag to<br>place sig</div>
                    </div>

                    <div class="pdf-area">
                        <div class="pdf-canvas-wrap" id="pdf-canvas-wrap">
                            <div class="pdf-canvas-inner" id="pdf-canvas-inner">
                                <canvas id="pdf-render-canvas"></canvas>
                                <div class="pdf-interact-layer"></div>

                                <template x-for="sig in pageSigs(currentPage)" :key="sig.id">
                                    <div class="placed-sig"
                                         :style="`left:${sig.x}px;top:${sig.y}px;width:${sig.w}px;height:${sig.h}px;`"
                                         @mousedown.stop="moveDown($event,currentPage,sig.id)">
                                        <img :src="sigSrc" alt="" draggable="false">
                                        <div class="placed-sig-border"></div>
                                        <div class="placed-sig-label">✦ Drag · Corner to resize</div>
                                        <button class="placed-sig-del" @mousedown.stop @click.stop="delSig(currentPage,sig.id)">✕</button>
                                        <div class="placed-sig-resize" @mousedown.stop="resizeDown($event,currentPage,sig.id)"></div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="pdf-nav">
                            <button class="nav-btn" @click="prev()" :disabled="currentPage<=1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" width="13" height="13"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                            </button>
                            <span class="nav-info">Page <strong x-text="currentPage"></strong> of <span x-text="totalPages"></span></span>
                            <button class="nav-btn" @click="next()" :disabled="currentPage>=totalPages">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" width="13" height="13"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <p style="color:#4b5563;font-size:.75rem;margin:0;display:flex;align-items:center;gap:5px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="12" height="12"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/></svg>
                        Hold &amp; drag sig from sidebar · Sigs are locked per-page · ‹ › to navigate
                    </p>
                    <div style="display:flex;gap:10px;align-items:center;">
                        <div x-show="sendSuccess" style="background:rgba(16,185,129,.12);border:1px solid rgba(16,185,129,.3);color:#10b981;border-radius:8px;padding:7px 14px;font-size:13px;font-weight:600;display:flex;align-items:center;gap:6px;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            ✅ Signed! Closing...
                        </div>
                        <template x-if="!sendSuccess">
                            <div style="display:flex;gap:10px;align-items:center;">
                                <button @click="close()" class="btn-view" style="cursor:pointer;">Cancel</button>
                                <button @click="send()" :disabled="sending||!hasSigs()" class="btn-send" :class="(sending||!hasSigs())?'btn-send-disabled':''">
                                    <svg x-show="!sending" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
                                    <svg x-show="sending" style="animation:spin 1s linear infinite;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/></svg>
                                    <span x-text="sending?'Signing...':(hasSigs()?'Confirm & Send':'Place signature first')"></span>
                                </button>
                            </div>
                        </template>
                    </div>
                </div>

            </div>
        </div>

        {{-- ── Tabs ── --}}
        <div class="tab-nav">
            <button @click="activeTab='all'" :class="activeTab==='all'?'active':''" class="tab-btn">All Documents</button>
            <button @click="activeTab='pending'" :class="activeTab==='pending'?'active':''" class="tab-btn">
                Pending
                @if(($pendingCount??0)>0)<span class="tab-badge">{{ $pendingCount }}</span>@endif
            </button>
            <button @click="activeTab='completed'" :class="activeTab==='completed'?'active':''" class="tab-btn">Completed</button>
        </div>

        @forelse($documents as $doc)
            @php
                $senderUser   = $doc->user;
                $senderName   = $senderUser ? trim(($senderUser->firstname??'').' '.($senderUser->lastname??'')) : 'Unknown';
                $senderName   = $senderName ?: ($senderUser->email??'Unknown');
                $initials     = collect(explode(' ',$senderName))->map(fn($w)=>strtoupper($w[0]??''))->take(2)->implode('');
                $avatarColors = ['#6366f1','#8b5cf6','#0ea5e9','#f59e0b','#10b981','#ef4444','#ec4899'];
                $avatarColor  = $avatarColors[$doc->id % count($avatarColors)];
                $avatarBg     = $avatarColor.'26';
                $isPending    = $doc->status==='pending';
            @endphp

            <div class="inbox-card"
                 x-show="activeTab==='all'||activeTab==='{{ $doc->status }}'"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-1"
                 x-transition:enter-end="opacity-100 translate-y-0">

                <div class="doc-avatar" style="background:{{ $avatarBg }};color:{{ $avatarColor }};">{{ $initials }}</div>

                <div style="flex:1;min-width:0;">
                    <div class="doc-title">{{ $doc->title }}</div>
                    <div class="doc-sender">From <span>{{ $senderName }}</span></div>
                    <div class="doc-meta">{{ $doc->recipient_email }}</div>

                    <div class="flex items-center gap-3 mb-4 flex-wrap">
                    @if($isPending)
                            <button @click="open('{{ asset('storage/'.$doc->path) }}','{{ addslashes($doc->title) }}',{{ $doc->id }})" class="btn-sign">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/></svg>
                                Sign Document
                            </button>
                            <button @click="open('{{ asset('storage/'.$doc->path) }}','{{ addslashes($doc->title) }}',{{ $doc->id }})" class="btn-view">View Details</button>
                        @else
                            {{-- Completed: view only, no signing allowed --}}
                            <a href="{{ asset('storage/'.$doc->path) }}" target="_blank" class="btn-view">View Document</a>
                            <span style="display:inline-flex;align-items:center;gap:5px;background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.25);color:#10b981;border-radius:8px;padding:8px 14px;font-size:13px;font-weight:600;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" width="13" height="13"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Completed
                            </span>
                        @endif
                        <span class="doc-action-meta">{{ $doc->created_at->diffForHumans() }}</span>
                        <span class="doc-action-meta">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                            {{ $isPending ? 'Signature Required' : 'Signed on '.($doc->signed_at?$doc->signed_at->format('M d, Y'):$doc->updated_at->format('M d, Y')) }}
                        </span>
                    </div>

                    <div class="flex gap-3 flex-wrap" style="margin-top:.75rem;">
                        @if($isPending)
                            <button @click="open('{{ asset('storage/'.$doc->path) }}','{{ addslashes($doc->title) }}',{{ $doc->id }})" class="btn-sign">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/></svg>
                                Sign Document
                            </button>
                        @endif
                        <button @click="open('{{ asset('storage/'.$doc->path) }}','{{ addslashes($doc->title) }}',{{ $doc->id }})" class="btn-view">View Details</button>
                    </div>
                </div>
            </div>

        @empty
            <div style="text-align:center;padding:4rem 2rem;color:#4b5563;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:48px;height:48px;margin:0 auto 1rem;display:block;color:#2d2d2d;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                <p style="font-size:.95rem;font-weight:600;color:#6b7280;margin-bottom:4px;">No documents yet</p>
                <p style="font-size:.82rem;">Wala ka pang natatanggap na documents.</p>
            </div>
        @endforelse

    </div>
</div>

{{-- Update DocumentController sign() to use simple ratio --}}
</x-layouts::app>