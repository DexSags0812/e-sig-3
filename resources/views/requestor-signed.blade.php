<x-layouts::app>
@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
@endpush
<style>
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');

  .pr-header {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1.1rem;
    margin-bottom: 2.5rem;
    font-family: 'Plus Jakarta Sans', sans-serif;
  }

  .pr-header-icon {
    width: 52px; height: 52px;
    border-radius: 14px;
    background: #2563eb;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 8px 24px rgba(37,99,235,0.35);
  }

  .pr-header-icon svg { width: 24px; height: 24px; stroke: #fff; fill: none; }

  .pr-header-text h1 {
    font-size: 1.75rem;
    font-weight: 800;
    color: #f1f5f9;
    letter-spacing: -0.03em;
    line-height: 1.2;
    margin: 0;
  }

  .pr-header-text p {
    font-size: 0.825rem;
    color: #64748b;
    margin: 2px 0 0;
    font-weight: 400;
  }

  .page-subtitle { color: #888; font-size: 0.875rem; }

  .stat-banner {
    background: #111111;
    border: 1px solid #1e1e1e;
    border-radius: 16px;
    padding: 1.75rem 2rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    opacity: 0;
    animation: fadeUp 0.35s ease 0.02s forwards;
  }

  .stat-label {
    color: #888;
    font-size: 0.75rem;
    font-weight: 500;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-bottom: 0.5rem;
  }

  .stat-number {
    font-family: 'Syne', sans-serif;
    font-size: 3rem;
    font-weight: 800;
    color: #f4f4f4;
    line-height: 1;
  }

  .stat-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(22,163,74,0.1);
    border: 1px solid rgba(22,163,74,0.25);
    color: #4ade80;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 5px 14px;
    border-radius: 20px;
  }

  .stat-badge-dot {
    width: 6px; height: 6px;
    border-radius: 50%;
    background: #4ade80;
  }

  .doc-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
    gap: 1.25rem;
  }

  .doc-card {
    background: #111111;
    border: 1px solid #1e1e1e;
    border-radius: 16px;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    position: relative;
    overflow: hidden;
    opacity: 0;
    animation: fadeUp 0.4s ease forwards;
    transition: border-color 0.2s, transform 0.2s, box-shadow 0.2s;
  }

  .doc-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.05), transparent);
  }

  .doc-card:hover {
    border-color: #2a2a2a;
    transform: translateY(-2px);
    box-shadow: 0 16px 48px rgba(0,0,0,0.5);
  }

  .doc-card:nth-child(1) { animation-delay: 0.06s; }
  .doc-card:nth-child(2) { animation-delay: 0.12s; }
  .doc-card:nth-child(3) { animation-delay: 0.18s; }
  .doc-card:nth-child(4) { animation-delay: 0.24s; }
  .doc-card:nth-child(5) { animation-delay: 0.30s; }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .card-icon {
    width: 46px; height: 46px;
    border-radius: 12px;
    background: rgba(22,163,74,0.1);
    border: 1px solid rgba(22,163,74,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .card-icon svg { width: 22px; height: 22px; stroke: #4ade80; fill: none; }

  .card-title {
    font-family: 'Syne', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    color: #f4f4f4;
    line-height: 1.35;
  }

  .sender-row { display: flex; align-items: center; gap: 10px; }

  .avatar {
    width: 36px; height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Syne', sans-serif;
    font-size: 11px;
    font-weight: 700;
    flex-shrink: 0;
    color: #fff;
  }

  .sender-name { color: #f4f4f4; font-size: 0.85rem; font-weight: 500; margin-bottom: 1px; }
  .sender-role { color: #888; font-size: 0.75rem; }

  .date-row {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #888;
    font-size: 0.775rem;
  }

  .date-row svg { width: 13px; height: 13px; stroke: #444; flex-shrink: 0; fill: none; }

  .btn-row { display: flex; gap: 8px; margin-top: auto; }

  .btn-view {
    flex: 1;
    background: #2563eb;
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 10px 16px;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    transition: background 0.15s, transform 0.1s;
    text-decoration: none;
  }

  .btn-view:hover { background: #1d4ed8; transform: translateY(-1px); }
  .btn-view svg { width: 14px; height: 14px; stroke: currentColor; fill: none; }

  .btn-download {
    background: #161616;
    border: 1px solid #2a2a2a;
    color: #888;
    border-radius: 10px;
    padding: 10px 14px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.15s;
    text-decoration: none;
  }

  .btn-download:hover { border-color: #444; color: #f4f4f4; transform: translateY(-1px); }
  .btn-download svg { width: 14px; height: 14px; stroke: currentColor; fill: none; }

  .empty-state {
    grid-column: 1 / -1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 5rem 2rem;
    color: #444;
    gap: 1rem;
  }

  .empty-state svg { width: 48px; height: 48px; stroke: #333; fill: none; }
  .empty-state p { font-size: 0.9rem; color: #666; }
</style>

<div class="signed-wrap">

    {{-- Header --}}
<div class="pr-header">
  <div class="pr-header-icon">
    <svg viewBox="0 0 24 24" stroke-width="1.8">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
    </svg>
  </div>
  <div class="pr-header-text">
    <h1>Pending Requests Dashboard</h1>
    
  </div>
</div>

    {{-- Stat Banner --}}
    <div class="stat-banner">
        <div>
            <div class="stat-label">Total Signed Documents</div>
            <div class="stat-number">{{ $documents->count() }}</div>
        </div>
        <div class="stat-badge">
            <span class="stat-badge-dot"></span>
            All completed
        </div>
    </div>

    {{-- Document Cards --}}
    <div class="doc-grid">
        @forelse($documents as $doc)
            @php
                $sender = $doc->user;
                $initials = $sender
                    ? strtoupper(substr($sender->firstname ?? '', 0, 1) . substr($sender->lastname ?? '', 0, 1))
                    : '??';
                $colors = ['#6366f1','#0ea5e9','#ec4899','#f59e0b','#10b981','#ef4444','#8b5cf6'];
                $color = $colors[$doc->id % count($colors)];
            @endphp

            <div class="doc-card">
                <div class="card-icon">
                    <svg viewBox="0 0 24 24" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                    </svg>
                </div>

                <div class="card-title">{{ $doc->title }}</div>

                <div class="sender-row">
                    <div class="avatar" style="background: {{ $color }};">{{ $initials }}</div>
                    <div>
                        <div class="sender-name">
                            {{ $sender ? ($sender->firstname . ' ' . $sender->lastname) : $doc->recipient_email }}
                        </div>
                        <div class="sender-role">{{ $doc->recipient_email }}</div>
                    </div>
                </div>

                <div class="date-row">
                    <svg viewBox="0 0 24 24" stroke-width="1.8">
                        <rect x="3" y="4" width="18" height="18" rx="2"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 2v4M8 2v4M3 10h18"/>
                    </svg>
                    Signed on {{ $doc->updated_at->format('M d, Y h:i A') }}
                </div>

                <div class="btn-row">
                    <a href="{{ asset('storage/' . $doc->path) }}" target="_blank" class="btn-view">
                        <svg viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        View
                    </a>
                    <a href="{{ route('documents.download', $doc->id) }}" class="btn-download">
                        <svg viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <svg viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                </svg>
                <p>No signed documents found.</p>
            </div>
        @endforelse
    </div>

</div>
</x-layouts::app>