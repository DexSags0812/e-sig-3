<x-layouts::app>
<style>
    body, html {
        background: #0f2240 !important;
        min-height: 100vh !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    body > div, body > main, main, .min-h-screen {
        background: #0f2240 !important;
        min-height: 100vh !important;
        width: 100% !important;
        max-width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    * { box-sizing: border-box; }

    .profile-wrapper {
        background: #0f2240;
        min-height: 100vh;
        padding: 2rem 2.5rem;
        width: 100%;
        font-family: 'DM Sans', sans-serif;
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .profile-header-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: linear-gradient(135deg, #2563eb, #06b6d4);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .profile-header-icon svg { width: 26px; height: 26px; color: #fff; }

    .profile-header-text h1 {
        font-family: 'Sora', sans-serif;
        font-size: 1.9rem;
        font-weight: 800;
        color: #ffffff;
        margin: 0;
        line-height: 1.1;
    }

    .profile-header-text p {
        color: #94a3b8;
        font-size: 0.85rem;
        margin: 0.2rem 0 0;
    }

    .profile-card {
        background: #1e3a5f;
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        animation: fadeUp 0.4s ease both;
    }

    .profile-card:nth-child(2) { animation-delay: 0.05s; }
    .profile-card:nth-child(3) { animation-delay: 0.10s; }
    .profile-card:nth-child(4) { animation-delay: 0.15s; }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .avatar-card {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .avatar-circle {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2563eb, #06b6d4);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 0 0 4px rgba(6,182,212,0.2);
    }

    .avatar-circle svg { width: 40px; height: 40px; color: #fff; }

    .avatar-info h2 {
        font-family: 'Sora', sans-serif;
        font-size: 1.4rem;
        font-weight: 800;
        color: #ffffff;
        margin: 0 0 0.25rem;
    }

    .avatar-info .avatar-position {
        color: #94a3b8;
        font-size: 0.9rem;
        margin: 0 0 0.75rem;
    }

    .btn-edit {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #2563eb;
        color: #fff;
        font-size: 0.85rem;
        font-weight: 600;
        padding: 0.5rem 1.2rem;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.2s, transform 0.15s;
    }
    .btn-edit:hover { background: #1d4ed8; transform: translateY(-1px); color: #fff; }
    .btn-edit svg { width: 14px; height: 14px; }

    .section-title {
        font-family: 'Sora', sans-serif;
        font-size: 1.1rem;
        font-weight: 800;
        color: #ffffff;
        margin: 0 0 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid rgba(255,255,255,0.08);
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem 2rem;
    }

    .info-label {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #64748b;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        margin-bottom: 0.4rem;
    }

    .info-label svg { width: 13px; height: 13px; color: #06b6d4; }

    .info-value {
        color: #e2e8f0;
        font-size: 0.95rem;
        font-weight: 500;
    }

    .setting-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 1.25rem;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 12px;
        margin-bottom: 0.75rem;
        transition: border-color 0.2s;
    }
    .setting-row:hover { border-color: rgba(6,182,212,0.3); }
    .setting-row:last-child { margin-bottom: 0; }

    .setting-info h4 {
        color: #e2e8f0;
        font-size: 0.9rem;
        font-weight: 600;
        margin: 0 0 0.15rem;
    }

    .setting-info p {
        color: #64748b;
        font-size: 0.78rem;
        margin: 0;
    }

    .toggle-switch {
        position: relative;
        width: 44px;
        height: 24px;
        flex-shrink: 0;
    }
    .toggle-switch input { opacity: 0; width: 0; height: 0; }
    .toggle-slider {
        position: absolute;
        inset: 0;
        background: #334155;
        border-radius: 999px;
        cursor: pointer;
        transition: background 0.2s;
    }
    .toggle-slider::before {
        content: '';
        position: absolute;
        width: 18px; height: 18px;
        left: 3px; top: 3px;
        background: #fff;
        border-radius: 50%;
        transition: transform 0.2s;
        box-shadow: 0 1px 4px rgba(0,0,0,0.3);
    }
    .toggle-switch input:checked + .toggle-slider { background: #2563eb; }
    .toggle-switch input:checked + .toggle-slider::before { transform: translateX(20px); }

    .btn-sm {
        padding: 0.45rem 1.1rem;
        border-radius: 9px;
        font-size: 0.82rem;
        font-weight: 700;
        border: none;
        cursor: pointer;
        transition: opacity 0.2s, transform 0.15s;
    }
    .btn-sm:hover { opacity: 0.88; transform: translateY(-1px); }
    .btn-primary { background: #2563eb; color: #fff; }
    .btn-danger  { background: #dc2626; color: #fff; }

    .signature-canvas-wrap {
        background: #ffffff;
        border-radius: 14px;
        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
        width: 280px;
        height: 90px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .signature-text {
        font-family: 'Dancing Script', cursive;
        font-size: 2.5rem;
        color: #1e3a8a;
        user-select: none;
    }

    .sig-actions {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .btn-sig {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 0.55rem 1.2rem;
        border-radius: 10px;
        font-size: 0.85rem;
        font-weight: 700;
        border: none;
        cursor: pointer;
        transition: opacity 0.2s, transform 0.15s;
        text-decoration: none;
    }
    .btn-sig:hover { opacity: 0.88; transform: translateY(-1px); }
    .btn-sig svg { width: 14px; height: 14px; }
    .btn-sig-primary { background: #2563eb; color: #fff; }
    .btn-sig-danger  { background: #dc2626; color: #fff; }

    .alert-success {
        background: rgba(34,197,94,0.1);
        border: 1px solid rgba(34,197,94,0.3);
        color: #4ade80;
        border-radius: 12px;
        padding: 0.85rem 1.25rem;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .alert-error {
        background: rgba(239,68,68,0.1);
        border: 1px solid rgba(239,68,68,0.3);
        color: #f87171;
        border-radius: 12px;
        padding: 0.85rem 1.25rem;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    .modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.6);
        z-index: 999;
        align-items: center;
        justify-content: center;
    }
    .modal-overlay.active { display: flex; }

    .modal-box {
        background: #1e3a5f;
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 20px;
        padding: 2rem;
        width: 100%;
        max-width: 460px;
        animation: fadeUp 0.25s ease;
    }

    .modal-title {
        font-family: 'Sora', sans-serif;
        font-size: 1.1rem;
        font-weight: 800;
        color: #fff;
        margin: 0 0 1.25rem;
    }

    .modal-field { margin-bottom: 1rem; }
    .modal-field label {
        display: block;
        color: #94a3b8;
        font-size: 0.78rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.4rem;
    }
    .modal-field input {
        width: 100%;
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 10px;
        padding: 0.65rem 0.9rem;
        color: #e2e8f0;
        font-size: 0.9rem;
        outline: none;
        transition: border-color 0.2s;
        font-family: 'DM Sans', sans-serif;
    }
    .modal-field input:focus { border-color: #06b6d4; }

    .modal-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: flex-end;
        margin-top: 1.5rem;
    }

    .btn-cancel {
        background: rgba(255,255,255,0.07);
        color: #94a3b8;
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 10px;
        padding: 0.55rem 1.2rem;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
        font-family: 'DM Sans', sans-serif;
    }
    .btn-cancel:hover { background: rgba(255,255,255,0.12); }

    .btn-save {
        background: #2563eb;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 0.55rem 1.4rem;
        font-size: 0.85rem;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s;
        font-family: 'DM Sans', sans-serif;
    }
    .btn-save:hover { background: #1d4ed8; }

    .sig-upload-zone {
        border: 2px dashed rgba(255,255,255,0.2);
        border-radius: 10px;
        padding: 1.5rem;
        text-align: center;
        cursor: pointer;
        transition: border-color 0.2s, background 0.2s;
        color: #94a3b8;
        font-size: 0.875rem;
    }
    .sig-upload-zone:hover  { border-color: #06b6d4; background: rgba(6,182,212,0.04); }
    .sig-upload-zone.has-file { border-color: #06b6d4; background: rgba(6,182,212,0.06); }
</style>

<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=DM+Sans:wght@400;500;600;700&family=Sora:wght@700;800&display=swap" rel="stylesheet">

<div class="profile-wrapper">

    {{-- ── Flash Messages ── --}}
    @if(session('success'))
        <div class="alert-success">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" style="width:16px;height:16px;flex-shrink:0;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            @foreach($errors->all() as $error)
                <div>• {{ $error }}</div>
            @endforeach
        </div>
    @endif

    {{-- ── Page Header ── --}}
    <div class="profile-header">
        <div class="profile-header-icon">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
            </svg>
        </div>
        <div class="profile-header-text">
            <h1>My Profile</h1>
            <p>Manage your account information and settings</p>
        </div>
    </div>

    {{-- ── Avatar Card ── --}}
    <div class="profile-card">
        <div class="avatar-card">
            <div class="avatar-circle">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                </svg>
            </div>
            <div class="avatar-info">
                <h2>
                    {{ auth()->user()->firstname }}
                    {{ auth()->user()->mi ? auth()->user()->mi . '.' : '' }}
                    {{ auth()->user()->lastname }}
                </h2>
                <p class="avatar-position">{{ auth()->user()->position ?? 'No Position Assigned' }}</p>
                <button class="btn-edit" onclick="openEditModal()">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/>
                    </svg>
                    Edit Profile
                </button>
            </div>
        </div>
    </div>

    {{-- ── Personal Information ── --}}
    <div class="profile-card">
        <div class="section-title">Personal Information</div>
        <div class="info-grid">

            <div class="info-field">
                <div class="info-label">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                    </svg>
                    Email Address
                </div>
                <div class="info-value">{{ auth()->user()->email }}</div>
            </div>

            <div class="info-field">
                <div class="info-label">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0"/>
                    </svg>
                    Position
                </div>
                <div class="info-value">{{ auth()->user()->position ?? '—' }}</div>
            </div>

            <div class="info-field">
                <div class="info-label">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                    </svg>
                    Department / Division
                </div>
                <div class="info-value">{{ auth()->user()->division ?? '—' }}</div>
            </div>

            <div class="info-field">
                <div class="info-label">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                    </svg>
                    Role
                </div>
                <div class="info-value" style="text-transform: capitalize;">{{ auth()->user()->role ?? '—' }}</div>
            </div>

            <div class="info-field">
                <div class="info-label">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                    </svg>
                    Phone Number
                </div>
                <div class="info-value">{{ auth()->user()->phone ?? '—' }}</div>
            </div>

            <div class="info-field">
                <div class="info-label">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                    </svg>
                    Join Date
                </div>
                <div class="info-value">{{ auth()->user()->created_at->format('F d, Y') }}</div>
            </div>

        </div>
    </div>

    {{-- ── Account Settings ── --}}
    <div class="profile-card">
        <div class="section-title">Account Settings</div>

        <div class="setting-row">
            <div class="setting-info">
                <h4>Email Notifications</h4>
                <p>Receive updates about your requests</p>
            </div>
            <label class="toggle-switch">
                <input type="checkbox" checked>
                <span class="toggle-slider"></span>
            </label>
        </div>

        <div class="setting-row">
            <div class="setting-info">
                <h4>Two-Factor Authentication</h4>
                <p>Add an extra layer of security</p>
            </div>
            <button class="btn-sm btn-primary">Enable</button>
        </div>

        <div class="setting-row">
            <div class="setting-info">
                <h4>Change Password</h4>
                <p>Update your account password</p>
            </div>
            <button class="btn-sm btn-primary" onclick="openPasswordModal()">Change</button>
        </div>
    </div>

    {{-- ── Signature ── --}}
    <div class="profile-card">
        <div class="section-title">Signature</div>

        <div class="signature-canvas-wrap" id="sig-preview">
            @if(auth()->user()->esig)
                <img src="{{ asset('storage/' . auth()->user()->esig) }}"
                     style="max-height:60px; max-width:220px; object-fit:contain;"
                     alt="Signature"
                     onerror="this.style.display='none'; document.getElementById('sig-fallback').style.display='block';">
                <span id="sig-fallback" class="signature-text" style="display:none;">
                    {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                </span>
            @else
                <span class="signature-text">
                    {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                </span>
            @endif
        </div>

        <div class="sig-actions">
            <button class="btn-sig btn-sig-primary" onclick="openSigModal()">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/>
                </svg>
                Change Signature
            </button>
            <button class="btn-sig btn-sig-danger" onclick="clearSignature()">
                Clear Signature
            </button>
        </div>
    </div>

</div>

{{-- ── Edit Profile Modal ── --}}
<div class="modal-overlay" id="editModal">
    <div class="modal-box">
        <div class="modal-title">Edit Profile</div>
        <form method="POST" action="/profile/update">
            @csrf
            @method('PATCH')
            <div class="modal-field">
                <label>First Name</label>
                <input type="text" name="firstname" value="{{ auth()->user()->firstname }}">
            </div>
            <div class="modal-field">
                <label>Middle Initial</label>
                <input type="text" name="mi" value="{{ auth()->user()->mi }}" maxlength="2">
            </div>
            <div class="modal-field">
                <label>Last Name</label>
                <input type="text" name="lastname" value="{{ auth()->user()->lastname }}">
            </div>
            <div class="modal-field">
                <label>Phone Number</label>
                <input type="text" name="phone" value="{{ auth()->user()->phone }}">
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closeEditModal()">Cancel</button>
                <button type="submit" class="btn-save">Save Changes</button>
            </div>
        </form>
    </div>
</div>

{{-- ── Change Password Modal ── --}}
<div class="modal-overlay" id="passwordModal">
    <div class="modal-box">
        <div class="modal-title">Change Password</div>
        <form method="POST" action="/password/update">
            @csrf
            @method('PUT')
            <div class="modal-field">
                <label>Current Password</label>
                <input type="password" name="current_password" placeholder="••••••••">
            </div>
            <div class="modal-field">
                <label>New Password</label>
                <input type="password" name="password" placeholder="••••••••">
            </div>
            <div class="modal-field">
                <label>Confirm New Password</label>
                <input type="password" name="password_confirmation" placeholder="••••••••">
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closePasswordModal()">Cancel</button>
                <button type="submit" class="btn-save">Update Password</button>
            </div>
        </form>
    </div>
</div>

{{-- ── Change Signature Modal ── --}}
<div class="modal-overlay" id="sigModal">
    <div class="modal-box">
        <div class="modal-title">Change Signature</div>
        <p style="color:#94a3b8;font-size:0.82rem;margin:0 0 1rem;">Upload your signature image (PNG only, max 5MB)</p>

        <form method="POST" action="/signature/update" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="sig-upload-zone" id="sig-upload-zone"
                 onclick="document.getElementById('sig-file-input').click()">

                {{-- Placeholder shown before file is chosen --}}
                <div id="sig-no-preview">
                    <svg style="width:1.5rem;height:1.5rem;display:inline-block;margin-bottom:0.5rem;"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                    </svg>
                    <div>Click to upload your signature</div>
                </div>

                {{-- Preview shown after file is chosen --}}
                <div id="sig-has-preview" style="display:none;">
                    <img id="sig-upload-preview" src="" alt="Signature Preview"
                         style="max-height:80px;max-width:100%;object-fit:contain;border-radius:6px;margin-bottom:0.5rem;">
                    <div id="sig-file-name" style="font-size:0.75rem;color:#06b6d4;font-weight:600;"></div>
                    <div style="font-size:0.72rem;color:#94a3b8;margin-top:0.25rem;">Click to choose a different file</div>
                </div>

            </div>

            <p style="font-size:0.72rem;color:#64748b;margin-top:0.4rem;">Accepted: PNG only · Max 5MB</p>

            <input id="sig-file-input" name="esig" type="file" accept="image/png"
                   style="display:none;" onchange="previewUploadedSig(event)" required>

            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closeSigModal()">Cancel</button>
                <button type="submit" class="btn-save">Save Signature</button>
            </div>
        </form>
    </div>
</div>

<script>
    // ── Modal helpers ──
    function openEditModal()      { document.getElementById('editModal').classList.add('active'); }
    function closeEditModal()     { document.getElementById('editModal').classList.remove('active'); }
    function openPasswordModal()  { document.getElementById('passwordModal').classList.add('active'); }
    function closePasswordModal() { document.getElementById('passwordModal').classList.remove('active'); }

    function openSigModal() {
        document.getElementById('sigModal').classList.add('active');
        // Reset to placeholder state every time modal opens
        document.getElementById('sig-no-preview').style.display  = 'block';
        document.getElementById('sig-has-preview').style.display = 'none';
        document.getElementById('sig-upload-preview').src        = '';
        document.getElementById('sig-file-name').textContent     = '';
        document.getElementById('sig-file-input').value          = '';
        document.getElementById('sig-upload-zone').classList.remove('has-file');
    }

    function closeSigModal() {
        document.getElementById('sigModal').classList.remove('active');
    }

    // Close on overlay click
    document.querySelectorAll('.modal-overlay').forEach(el => {
        el.addEventListener('click', e => { if (e.target === el) el.classList.remove('active'); });
    });

    // ── Signature upload preview ──
    function previewUploadedSig(event) {
        const file = event.target.files[0];
        if (!file) return;

        if (file.type !== 'image/png') {
            alert('Only PNG files are allowed.');
            event.target.value = '';
            return;
        }

        if (file.size > 5 * 1024 * 1024) {
            alert('File size must not exceed 5MB.');
            event.target.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            // Swap placeholder → preview
            document.getElementById('sig-no-preview').style.display  = 'none';
            document.getElementById('sig-has-preview').style.display = 'block';
            document.getElementById('sig-upload-preview').src        = e.target.result;
            document.getElementById('sig-file-name').textContent     = file.name;
            document.getElementById('sig-upload-zone').classList.add('has-file');
        };
        reader.readAsDataURL(file);
    }

    // ── Clear signature display ──
    function clearSignature() {
        document.getElementById('sig-preview').innerHTML =
            `<span class="signature-text">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</span>`;
    }

    // ── Auto-open correct modal on validation errors ──
    @if($errors->hasAny(['firstname','lastname','mi','phone']))
        openEditModal();
    @elseif($errors->hasAny(['current_password','password']))
        openPasswordModal();
    @elseif($errors->hasAny(['esig']))
        openSigModal();
    @endif
</script>

</x-layouts::app>