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
  .pr-table-card {
    background: #111d2e;
    border: 1px solid #1e2d45;
    border-radius: 14px;
    overflow: hidden;
  }

  .pr-table { width: 100%; border-collapse: collapse; }

  .pr-table thead tr {
    background: #0f1a2e;
    border-bottom: 1px solid #1e2d45;
  }

  .pr-table thead th {
    padding: 0.75rem 1.25rem;
    text-align: left;
    font-size: 0.7rem;
    font-weight: 600;
    color: #475569;
    letter-spacing: 0.07em;
    text-transform: uppercase;
  }

  .pr-table tbody tr {
    border-bottom: 1px solid #1a2840;
    transition: background 0.15s;
    opacity: 0;
    animation: fadeUp 0.35s ease forwards;
  }

  .pr-table tbody tr:last-child { border-bottom: none; }
  .pr-table tbody tr:hover { background: rgba(37,99,235,0.05); }

  .pr-table tbody tr:nth-child(1) { animation-delay: 0.06s; }
  .pr-table tbody tr:nth-child(2) { animation-delay: 0.12s; }
  .pr-table tbody tr:nth-child(3) { animation-delay: 0.18s; }
  .pr-table tbody tr:nth-child(4) { animation-delay: 0.24s; }
  .pr-table tbody tr:nth-child(5) { animation-delay: 0.30s; }

  .pr-table tbody td {
    padding: 0.65rem 1.25rem;
    vertical-align: middle;
    font-size: 0.85rem;
  }

  .recipient-cell { display: flex; align-items: center; gap: 10px; }

  .avatar {
    width: 34px; height: 34px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 12px;
    font-weight: 700;
    color: #fff;
    flex-shrink: 0;
  }

  .recipient-email { font-weight: 500; color: #cbd5e1; font-size: 0.82rem; line-height: 1.3; }
  .recipient-role { font-size: 0.68rem; color: #475569; margin-top: 1px; }

  .doc-cell { display: flex; align-items: center; gap: 8px; }
  .doc-cell svg { width: 15px; height: 15px; stroke: #3b82f6; fill: none; flex-shrink: 0; }
  .doc-name { color: #94a3b8; font-weight: 400; font-size: 0.82rem; }

  .date-val { color: #94a3b8; font-size: 0.82rem; }

  .time-cell { display: flex; align-items: center; gap: 6px; color: #94a3b8; font-size: 0.82rem; }
  .time-cell svg { width: 13px; height: 13px; stroke: #475569; fill: none; flex-shrink: 0; }

  .btn-preview {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    color: #3b82f6;
    font-size: 0.82rem;
    font-weight: 600;
    text-decoration: none;
    background: none;
    border: none;
    cursor: pointer;
    padding: 4px 0;
    transition: color 0.15s;
  }

  .btn-preview svg { width: 15px; height: 15px; stroke: currentColor; fill: none; transition: transform 0.15s; }
  .btn-preview:hover { color: #60a5fa; }
  .btn-preview:hover svg { transform: scale(1.15); }

  .empty-row td { text-align: center; padding: 3rem 2rem; }
  .empty-row svg { width: 40px; height: 40px; stroke: #1e3a5f; fill: none; margin: 0 auto 0.75rem; display: block; }
  .empty-row p { font-size: 0.85rem; color: #475569; }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(8px); }
    to   { opacity: 1; transform: translateY(0); }
  }
</style>


<div class="pr-header">
  <div class="pr-header-icon">
    <svg viewBox="0 0 24 24" stroke-width="1.8">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
    </svg>
  </div>
  <div class="pr-header-text">
    <h1>Pending Requests Dashboard</h1>
    <p>Track and manage your PDF document requests</p>
  </div>
</div>

<div class="pr-table-card">
  <table class="pr-table">
    <thead>
      <tr>
        <th>Recipient</th>
        <th>Document</th>
        <th>Date</th>
        <th>Time</th>
        <th style="text-align:right;">Action</th>
      </tr>
    </thead>
    <tbody>
      @php
        $avatarColors = ['#3b82f6','#6366f1','#0ea5e9','#10b981','#f59e0b','#ef4444','#8b5cf6'];
      @endphp

      @forelse($documents as $doc)
        @php
          $sender   = $doc->user;
          $initials = $sender
            ? strtoupper(substr($sender->firstname ?? '', 0, 1) . substr($sender->lastname ?? '', 0, 1))
            : strtoupper(substr($doc->recipient_email ?? '?', 0, 1));
          $bgColor  = $avatarColors[$doc->id % count($avatarColors)];
        @endphp

        <tr>
          <td>
            <div class="recipient-cell">
              <div class="avatar" style="background: {{ $bgColor }};">{{ $initials }}</div>
              <div>
                <div class="recipient-email">{{ $doc->recipient_email }}</div>
                @if($sender)
                  <div class="recipient-role">{{ $sender->role ?? ($sender->firstname . ' ' . $sender->lastname) }}</div>
                @endif
              </div>
            </div>
          </td>

          <td>
            <div class="doc-cell">
              <svg viewBox="0 0 24 24" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
              </svg>
              <span class="doc-name">{{ $doc->title }}</span>
            </div>
          </td>

          <td><span class="date-val">{{ $doc->updated_at->format('Y-m-d') }}</span></td>

          <td>
            <div class="time-cell">
              <svg viewBox="0 0 24 24" stroke-width="1.8">
                <circle cx="12" cy="12" r="9"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 3"/>
              </svg>
              {{ $doc->updated_at->format('h:i A') }}
            </div>
          </td>

          <td style="text-align:right;">
            <a href="{{ asset('storage/' . $doc->path) }}" target="_blank" class="btn-preview">
              <svg viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
              Preview
            </a>
          </td>
        </tr>

      @empty
        <tr class="empty-row">
          <td colspan="5">
            <svg viewBox="0 0 24 24" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
            </svg>
            <p>No pending documents found.</p>
          </td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
</x-layouts::app>