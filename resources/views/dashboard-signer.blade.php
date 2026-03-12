<x-layouts::app>
<style>
    /* ── Force Full Page ── */
    body, html {
        background: #f1f5f9 !important;
        min-height: 100vh !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    body > div,
    body > main,
    main,
    .min-h-screen {
        background: #f1f5f9 !important;
        min-height: 100vh !important;
        width: 100% !important;
        max-width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    .dash-wrapper {
        background: #0f2240;
        min-height: 100vh;
        padding: 4rem 2.5rem;
        width: 100%;
        box-sizing: border-box;
    }

    .dash-header {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
        position: relative;
    }

    .dash-title {
        font-size: 2rem;
        font-weight: 800;
        color: #ffffff;
        text-align: center;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }

    .new-request-btn {
        background: #06b6d4;
        color: white;
        font-weight: 600;
        font-size: 0.875rem;
        padding: 0.6rem 1.2rem;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.4rem;
        transition: background 0.2s;
        text-decoration: none;
        margin-left: auto;
    }
    .new-request-btn:hover { background: #0891b2; color: white; }

    .dept-banner {
        background: linear-gradient(135deg, #2563eb 0%, #06b6d4 100%);
        border-radius: 20px;
        padding: 1.75rem 2rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        margin-bottom: 3rem;
        position: relative;
        overflow: hidden;
    }

    .dept-banner::before {
        content: '';
        position: absolute;
        right: -30px; top: -30px;
        width: 180px; height: 180px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
        pointer-events: none;
    }

    .dept-banner::after {
        content: '';
        position: absolute;
        right: 60px; bottom: -50px;
        width: 140px; height: 140px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
        pointer-events: none;
    }

    .dept-icon {
        width: 56px; height: 56px;
        border-radius: 14px;
        background: rgba(255,255,255,0.2);
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .dept-icon svg { width: 26px; height: 26px; color: #fff; }

    .dept-user-name {
        font-size: 1.25rem;
        font-weight: 1000;
        color: rgba(0,0,0,0.85);
        margin-bottom: 0.15rem;
    }

    .dept-division-name {
        font-size: 1.5rem;
        font-weight: 800;
        color: #ffffff;
        letter-spacing: -0.02em;
        line-height: 1.15;
    }

    .dept-position-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f97316;
        color: #000000;
        font-size: 1.5rem;
        font-weight: 800;
        padding: 3px 12px;
        border-radius: 20px;
        margin-top: 0.4rem;
    }

    .stat-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.25rem;
        margin-bottom: 1.5rem;
    }

    .stat-card {
        background: #ffffff;
        border: 1px solid #000000;
        border-radius: 16px;
        padding: 1.4rem 1.6rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-decoration: none;
        transition: box-shadow 0.2s, border-color 0.2s;
    }
    .stat-card:hover { box-shadow: 0 4px 20px rgba(0,0,0,0.07); border-color: #cbd5e1; }

    .stat-label { color: #000000; font-size: 0.82rem; margin-bottom: 0.35rem; }
    .stat-number { color: #0f172a; font-size: 2rem; font-weight: 800; }

    .stat-icon {
        width: 52px; height: 52px;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .stat-icon svg { width: 24px; height: 24px; }

    .bottom-grid {
        display: grid;
        grid-template-columns: 1fr 680px;
        gap: 2rem;
    }

    .cal-card {
        background: #1e3a5f;
        border: 2px solid #000000;
        border-radius: 10px;
        padding: 1rem;
    }

    .cal-top-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.25rem;
    }

    .cal-title { font-size: 1rem; font-weight: 800; color: #ffffff; }

    .cal-meta { display: flex; align-items: center; gap: 1.25rem; }

    .cal-clock {
        display: flex; align-items: center; gap: 5px;
        font-size: 0.8rem; color: #ffffff; font-weight: 600;
    }

    .cal-month-label {
        display: flex; align-items: center; gap: 5px;
        font-size: 0.8rem; color: #ffffff; font-weight: 600;
    }

    .cal-nav { display: flex; gap: 6px; }
    .cal-nav-btn {
        background: #f8fafc;
        border: 1px solid #000000;
        color: #ffffff;
        width: 30px; height: 30px;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
        transition: all 0.15s;
    }
    .cal-nav-btn:hover { border-color: #06b6d4; color: #06b6d4; background: #ecfeff; }

    .cal-grid { width: 100%; border-collapse: collapse; }
    .cal-grid th {
        color: #ffffff;
        font-size: 0.75rem;
        font-weight: 600;
        text-align: center;
        padding: 6px 0 10px;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }
    .cal-grid td { text-align: center; padding: 3px; }

    .cal-day {
        width: 40px; height: 40px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.85rem;
        color: #ffffff;
        cursor: pointer;
        margin: 0 auto;
        position: relative;
        transition: background 0.15s, color 0.15s;
        font-weight: 500;
        border: 1px solid transparent;
    }
    .cal-day:hover:not(.other-month) { background: #f0f9ff; color: #0891b2; border-color: #bae6fd; }
    .cal-day.today {
        background: #0891b2;
        color: #fff;
        font-weight: 800;
        border-color: transparent;
        box-shadow: 0 2px 10px rgba(6,182,212,0.35);
    }
    .cal-day.selected:not(.today) {
        background: #f0f9ff;
        border-color: #06b6d4;
        color: #0891b2;
    }
    .cal-day.has-event::after {
        content: '';
        position: absolute;
        bottom: 4px; left: 50%;
        transform: translateX(-50%);
        width: 4px; height: 4px;
        border-radius: 50%;
        background: #f97316;
    }
    .cal-day.today.has-event::after { background: rgba(255,255,255,0.9); }
    .cal-day.other-month { color: #cbd5e1; cursor: default; }

    .events-card {
        background: #1e3a5f;
        border: 2px solid #000000;
        border-radius: 16px;
        padding: 0.7rem 0.75rem;
    }

    .events-header {
        display: flex; align-items: center; gap: 7px;
        font-size: 0.9rem; font-weight: 800;
        color: #ffffff;
        margin-bottom: 1rem;
    }
    .events-header svg { color: #06b6d4; }

    .event-item {
        background: #1c304b;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 8px 10px;
        margin-bottom: 8px;
        transition: border-color 0.15s;
    }
    .event-item:hover { border-color: #bae6fd; }

    .event-top { display: flex; align-items: center; gap: 8px; margin-bottom: 5px; }

    .event-icon {
        width: 34px; height: 34px;
        border-radius: 9px;
        background: #e0f2fe;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .event-icon svg { width: 16px; height: 16px; color: #06b6d4; }

    .event-info { flex: 1; min-width: 0; }
    .event-title { color: #ffffff; font-size: 0.83rem; font-weight: 600; }
    .event-type  { color: #94a3b8; font-size: 0.72rem; margin-top: 1px; }

    .event-bottom {
        display: flex; align-items: center;
        justify-content: space-between;
        margin-top: 6px;
    }

    .event-time-row {
        display: flex; align-items: center; gap: 4px;
        color: #94a3b8; font-size: 0.72rem;
    }

    .event-badge {
        font-size: 10px; font-weight: 700;
        padding: 2px 9px; border-radius: 20px;
    }
    .badge-pending  { background: rgba(249,115,22,0.1); color: #f97316; border: 1px solid rgba(249,115,22,0.2); }
    .badge-signed   { background: rgba(34,197,94,0.1);  color: #16a34a; border: 1px solid rgba(34,197,94,0.2); }

    .cal-empty {
        color: #94a3b8; font-size: 0.8rem;
        text-align: center; padding: 2.5rem 0;
        font-style: italic;
    }
</style>

<div class="dash-wrapper">

    {{-- ── Page Header ── --}}
    <div class="dash-header">
        <h1 class="dash-title">Signee Dashboard</h1>
        <a href="{{ route('new-request') }}" class="new-request-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
            </svg>
            New Request
        </a>
    </div>

    {{-- ── Department Banner ── --}}
    <div class="dept-banner">
        <div class="dept-icon">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
            </svg>
        </div>
        <div>
            <div class="dept-user-name">
                {{ auth()->user()->firstname }}
                {{ auth()->user()->mi ? auth()->user()->mi . '.' : '' }}
                {{ auth()->user()->lastname }}
            </div>
            <div class="dept-division-name">{{ auth()->user()->division ?? 'No Division Assigned' }}</div>
            <div class="dept-position-badge">{{ auth()->user()->position ?? 'No Position Assigned' }}</div>
        </div>
    </div>

    {{-- ── Stat Cards ── --}}
    <div class="stat-grid">

        <div class="stat-card">
            <div>
                <div class="stat-label">Total Requests</div>
                <div class="stat-number">{{ $totalRequests ?? 0 }}</div>
            </div>
            <div class="stat-icon" style="background:#e0f2fe;">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" style="color:#06b6d4;">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                </svg>
            </div>
        </div>

        <a href="{{ route('requestor.pending') }}" class="stat-card">
            <div>
                <div class="stat-label">Pending</div>
                <div class="stat-number">{{ $pendingCount ?? 0 }}</div>
            </div>
            <div class="stat-icon" style="background:#fff7ed;">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" style="color:#f97316;">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </a>

        <a href="{{ route('requestor.approved') }}" class="stat-card">
            <div>
                <div class="stat-label">Approved</div>
                <div class="stat-number">{{ $approvedCount ?? 0 }}</div>
            </div>
            <div class="stat-icon" style="background:#dcfce7;">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" style="color:#16a34a;">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </a>

        <a href="{{ route('requestor.rejected') }}" class="stat-card">
            <div>
                <div class="stat-label">Rejected</div>
                <div class="stat-number">{{ $rejectedCount ?? 0 }}</div>
            </div>
            <div class="stat-icon" style="background:#fee2e2;">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" style="color:#dc2626;">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </a>

    </div>

    {{-- ── Bottom: Calendar + Events ── --}}
    <div class="bottom-grid">

        <div class="cal-card">
            <div class="cal-top-bar">
                <div class="cal-title">Calendar</div>
                <div class="cal-meta">
                    <div class="cal-clock">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                             style="width:13px;height:13px;">
                            <circle cx="12" cy="12" r="10"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"/>
                        </svg>
                        <span id="live-time"></span>
                    </div>
                    <div class="cal-month-label">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                             style="width:13px;height:13px;color:#06b6d4;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                        </svg>
                        <span id="cal-month-label"></span>
                    </div>
                    <div class="cal-nav">
                        <button class="cal-nav-btn" onclick="changeMonth(-1)">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" width="12" height="12">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
                            </svg>
                        </button>
                        <button class="cal-nav-btn" onclick="changeMonth(1)">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" width="12" height="12">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <table class="cal-grid">
                <thead>
                    <tr>
                        <th>Sun</th><th>Mon</th><th>Tue</th>
                        <th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
                    </tr>
                </thead>
                <tbody id="cal-body"></tbody>
            </table>
        </div>

        <div class="events-card">
            <div class="events-header">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                     style="width:16px;height:16px;">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                </svg>
                <span id="events-date-label">Today's Documents</span>
            </div>
            <div id="events-list"></div>
        </div>

    </div>

</div>

<script>
    const allDocs = @json($recentDocuments ?? []);

    const today = new Date();
    let currentYear  = today.getFullYear();
    let currentMonth = today.getMonth();
    let selectedDay  = today.getDate();

    const monthNames = [
        'January','February','March','April','May','June',
        'July','August','September','October','November','December'
    ];

    function buildDocMap() {
        const map = {};
        allDocs.forEach(doc => {
            const d   = new Date(doc.created_at);
            const key = `${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')}`;
            if (!map[key]) map[key] = [];
            map[key].push(doc);
        });
        return map;
    }

    function renderCalendar() {
        const docMap      = buildDocMap();
        const label       = document.getElementById('cal-month-label');
        const body        = document.getElementById('cal-body');
        label.textContent = `${monthNames[currentMonth]} ${currentYear}`;

        const firstDay    = new Date(currentYear, currentMonth, 1).getDay();
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
        const daysInPrev  = new Date(currentYear, currentMonth, 0).getDate();

        // Build a flat array of all cells first, then chunk into rows
        const cells = [];

        // Previous month trailing days
        for (let i = 0; i < firstDay; i++) {
            cells.push({ day: daysInPrev - firstDay + i + 1, type: 'prev' });
        }

        // Current month days
        for (let d = 1; d <= daysInMonth; d++) {
            cells.push({ day: d, type: 'current' });
        }

        // Next month leading days — fill to complete the last row
        const remaining = cells.length % 7 === 0 ? 0 : 7 - (cells.length % 7);
        for (let i = 1; i <= remaining; i++) {
            cells.push({ day: i, type: 'next' });
        }

        // Render rows
        let html = '';
        for (let i = 0; i < cells.length; i += 7) {
            html += '<tr>';
            for (let j = i; j < i + 7; j++) {
                const cell = cells[j];
                if (cell.type !== 'current') {
                    html += `<td><div class="cal-day other-month">${cell.day}</div></td>`;
                } else {
                    const d          = cell.day;
                    const isToday    = d === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear();
                    const isSelected = d === selectedDay;
                    const key        = `${currentYear}-${String(currentMonth+1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
                    const hasEvent   = !!docMap[key];

                    let cls = 'cal-day';
                    if (isToday)         cls += ' today';
                    else if (isSelected) cls += ' selected';
                    if (hasEvent)        cls += ' has-event';

                    html += `<td><div class="${cls}" onclick="selectDay(${d})">${d}</div></td>`;
                }
            }
            html += '</tr>';
        }

        body.innerHTML = html;
        renderEvents(selectedDay);
    }

    function selectDay(day) {
        selectedDay = day;
        renderCalendar();
    }

    function renderEvents(day) {
        const docMap = buildDocMap();
        const key    = `${currentYear}-${String(currentMonth+1).padStart(2,'0')}-${String(day).padStart(2,'0')}`;
        const docs   = docMap[key] || [];
        const label  = document.getElementById('events-date-label');
        const list   = document.getElementById('events-list');

        const isToday = day === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear();
        label.textContent = isToday
            ? "Today's Documents"
            : `${monthNames[currentMonth]} ${day}, ${currentYear}`;

        if (docs.length === 0) {
            list.innerHTML = `<div class="cal-empty">No documents on this day.</div>`;
            return;
        }

        list.innerHTML = docs.map(doc => {
            const d     = new Date(doc.created_at);
            const time  = d.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            const badge = doc.status === 'completed' || doc.status === 'signed'
                ? 'badge-signed' : 'badge-pending';
            const statusLabel = doc.status.charAt(0).toUpperCase() + doc.status.slice(1);

            return `
                <div class="event-item">
                    <div class="event-top">
                        <div class="event-icon">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                            </svg>
                        </div>
                        <div class="event-info">
                            <div class="event-title">${doc.title}</div>
                            <div class="event-type">PDF Document</div>
                        </div>
                    </div>
                    <div class="event-bottom">
                        <div class="event-time-row">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                 style="width:11px;height:11px;">
                                <circle cx="12" cy="12" r="10"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"/>
                            </svg>
                            ${time}
                        </div>
                        <span class="event-badge ${badge}">${statusLabel}</span>
                    </div>
                </div>
            `;
        }).join('');
    }

    function changeMonth(delta) {
        currentMonth += delta;
        if (currentMonth > 11) { currentMonth = 0; currentYear++; }
        if (currentMonth < 0)  { currentMonth = 11; currentYear--; }
        selectedDay = 1;
        renderCalendar();
    }

    function updateClock() {
        const el = document.getElementById('live-time');
        if (el) el.textContent = new Date().toLocaleTimeString([], {
            hour: '2-digit', minute: '2-digit', second: '2-digit'
        });
    }

    // ── KEY FIX: re-render calendar whenever the tab becomes visible again ──
    document.addEventListener('visibilitychange', function () {
        if (document.visibilityState === 'visible') {
            renderCalendar();
        }
    });

    setInterval(updateClock, 1000);
    updateClock();
    renderCalendar();
</script>

</x-layouts::app>