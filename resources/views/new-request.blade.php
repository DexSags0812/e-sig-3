<x-layouts::app>
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

    .nr-card {
        background: #1a1a1a;
        border: 1px solid #2a2a2a;
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .nr-section-title {
        color: #ffffff;
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .nr-label {
        display: block;
        font-size: 0.8rem;
        color: #71717a;
        margin-bottom: 0.4rem;
    }

    .nr-input, .nr-textarea, .nr-select {
        width: 100%;
        background: #262626;
        border: 1px solid #333;
        border-radius: 8px;
        padding: 0.6rem 0.9rem;
        color: #ffffff;
        font-size: 0.9rem;
        outline: none;
        transition: border-color 0.2s;
    }

    .nr-input:focus, .nr-textarea:focus {
        border-color: #3b82f6;
    }

    .upload-zone {
        border: 2px dashed #333;
        border-radius: 12px;
        padding: 2.5rem 1.5rem;
        text-align: center;
        cursor: pointer;
        transition: border-color 0.2s, background 0.2s;
        color: #3b82f6;
        font-size: 0.875rem;
        background: #1e1e1e;
        position: relative;
        min-height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .upload-zone:hover { border-color: #3b82f6; background: #1a2535; }

    .pdf-frame-preview {
        width: 100%;
        height: 350px;
        border: none;
        background: white;
    }

    .preview-overlay {
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 40px;
        z-index: 10;
        background: rgba(0,0,0,0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 10px;
        font-weight: bold;
        text-transform: uppercase;
        opacity: 0;
        transition: opacity 0.2s;
    }

    .upload-zone:hover .preview-overlay { opacity: 1; }

    .change-btn {
        margin-top: 1rem;
        background: #262626;
        border: 1px solid #3b82f6;
        color: #3b82f6;
        padding: 0.5rem 1.5rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
        z-index: 20;
    }

    .change-btn:hover { background: #3b82f6; color: #ffffff; }

    .hidden { display: none !important; }

    .recipient-row {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
        position: relative;
    }

    .recipient-avatar {
        width: 36px; height: 36px;
        border-radius: 50%;
        background: #3b82f6;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.75rem;
        font-weight: 700;
        color: white;
        flex-shrink: 0;
    }

    .remove-btn {
        width: 28px; height: 28px;
        border-radius: 50%;
        background: #ef4444;
        border: none;
        cursor: pointer;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }

    .send-btn {
        background: #2563eb;
        color: white;
        font-weight: 600;
        padding: 0.8rem 2rem;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
    }

    .send-btn:hover { background: #1d4ed8; }

    .add-recipient-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: transparent;
        border: 1px dashed #3b82f6;
        color: #3b82f6;
        border-radius: 8px;
        padding: 0.5rem 1.2rem;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }

    .add-recipient-btn:hover { background: rgba(59,130,246,0.1); }

    /* ── User Search Dropdown ── */
    .user-search-wrap {
        flex: 1;
        position: relative;
    }

    .user-search-input {
        width: 100%;
        background: #262626;
        border: 1px solid #333;
        border-radius: 8px;
        padding: 0.6rem 0.9rem 0.6rem 2.4rem;
        color: #ffffff;
        font-size: 0.9rem;
        outline: none;
        transition: border-color 0.2s;
    }

    .user-search-input:focus { border-color: #3b82f6; }
    .user-search-input::placeholder { color: #4b5563; }

    .search-icon {
        position: absolute;
        left: 10px; top: 50%;
        transform: translateY(-50%);
        color: #4b5563;
        pointer-events: none;
    }

    .user-dropdown {
        position: absolute;
        top: calc(100% + 6px);
        left: 0; right: 0;
        background: #1e1e1e;
        border: 1px solid #2a2a2a;
        border-radius: 10px;
        z-index: 999;
        max-height: 220px;
        overflow-y: auto;
        box-shadow: 0 8px 32px rgba(0,0,0,0.6);
        display: none;
    }

    .user-dropdown.open { display: block; }

    .user-dropdown::-webkit-scrollbar { width: 5px; }
    .user-dropdown::-webkit-scrollbar-track { background: #1a1a1a; }
    .user-dropdown::-webkit-scrollbar-thumb { background: #333; border-radius: 3px; }

    .user-option {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        cursor: pointer;
        transition: background 0.15s;
        border-bottom: 1px solid #222;
    }

    .user-option:last-child { border-bottom: none; }
    .user-option:hover { background: #262626; }

    .user-option-avatar {
        width: 32px; height: 32px;
        border-radius: 50%;
        background: #3b82f6;
        display: flex; align-items: center; justify-content: center;
        font-size: 16px;
        font-weight: 700;
        color: #fff;
        flex-shrink: 0;
    }

    .user-option-name  { color: #f9fafb; font-size: 0.875rem; font-weight: 500; }
    .user-option-email { color: #ffffff; font-size: 0.72rem; }
    .user-option-meta  { color: #4b83c0; font-size: 0.68rem; margin-top: 1px; }

    .user-option-badge {
        margin-left: auto;
        background: rgba(59,130,246,0.15);
        border: 1px solid rgba(59,130,246,0.3);
        color: #60a5fa;
        font-size: 16px;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 20px;
        text-transform: capitalize;
        flex-shrink: 0;
    }

    .no-results {
        padding: 14px;
        color: #ffffff;
        font-size: 0.82rem;
        text-align: center;
    }

    /* ── Selected user chip ── */
    .selected-user-chip {
        display: flex;
        align-items: center;
        gap: 8px;
        background: rgba(59,130,246,0.1);
        border: 1px solid rgba(59,130,246,0.3);
        border-radius: 8px;
        padding: 8px 12px;
        width: 100%;
    }

    .selected-user-chip .chip-name     { color: #f9fafb; font-size: 0.875rem; font-weight: 600; }
    .selected-user-chip .chip-details  { display: flex; align-items: center; gap: 1.25rem; margin-top: 3px; flex-wrap: wrap; }
    .selected-user-chip .chip-email    { color: #706c6c; font-size: 1rem; }
    .selected-user-chip .chip-position { color: #ffffff; font-size: 0.9rem; }
    .selected-user-chip .chip-division { color: #ffffff; font-size: 0.9rem; }

    .chip-clear {
        margin-left: auto;
        background: none;
        border: none;
        color: #6b7280;
        cursor: pointer;
        padding: 0;
        line-height: 1;
        font-size: 16px;
        transition: color 0.15s;
        flex-shrink: 0;
    }

    .chip-clear:hover { color: #ef4444; }
</style>

<div class="pr-header">
  <div class="pr-header-icon">
    <svg viewBox="0 0 24 24" stroke-width="1.8">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
    </svg>
  </div>
  <div class="pr-header-text">
    <h1>New Signature Request</h1>
  </div>
</div>

<form id="nr-form" method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
    @csrf

    {{-- ── Document Details ── --}}
    <div class="nr-card">
        <div class="nr-section-title">Document Details</div>
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; align-items: start;">

            <div class="flex flex-col items-center">
                <div class="upload-zone w-full" id="upload-zone">
                    <div id="upload-placeholder" class="w-full h-full flex flex-col items-center justify-center"
                         onclick="document.getElementById('pdf-upload').click()">
                        <svg style="width:2rem;height:2rem;display:block;margin:0 auto 0.75rem;color:#3b82f6;"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                        </svg>
                        <span id="upload-label">Click to upload PDF document</span>
                    </div>
                    <iframe id="pdf-frame" class="pdf-frame-preview hidden"></iframe>
                    <div id="preview-overlay" class="preview-overlay hidden"
                         onclick="window.open(pdfUrl, '_blank')">
                        Click to expand full preview ↗
                    </div>
                </div>
                <button type="button" id="change-doc-btn" class="change-btn hidden"
                        onclick="triggerChange()">Change Document</button>
                <input type="file" id="pdf-upload" name="document" accept=".pdf"
                       class="hidden" onchange="updateUploadLabel(event)"/>
            </div>

            <div class="flex flex-col gap-4">
                <div>
                    <label class="nr-label">Document Title</label>
                    <input name="title" type="text" class="nr-input"
                           placeholder="Document Title" required/>
                </div>
                <div>
                    <label class="nr-label">Message to Signer(s)</label>
                    <textarea name="message" class="nr-textarea" rows="3"
                              placeholder="Message to Signer(s)"></textarea>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Recipients ── --}}
    <div class="nr-card">
        <div class="nr-section-title">Recipients</div>
        <div id="recipients-list"></div>
        <button type="button" class="add-recipient-btn" onclick="addRecipient()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
            </svg>
            Add Recipient
        </button>
    </div>

    <div class="flex justify-center mt-4">
        <button type="submit" class="send-btn" style="padding:0.8rem 4rem;font-size:1rem;">
            Review & Send
        </button>
    </div>
</form>

<script>
    let recipientCount = 0;
    let pdfUrl = null;

    const allUsers = @json($signees);

    function triggerChange() {
        const fileInput = document.getElementById('pdf-upload');
        fileInput.value = '';
        fileInput.click();
    }

    function updateUploadLabel(event) {
        const file = event.target.files[0];
        const placeholder = document.getElementById('upload-placeholder');
        const pdfFrame    = document.getElementById('pdf-frame');
        const overlay     = document.getElementById('preview-overlay');
        const zone        = document.getElementById('upload-zone');
        const changeBtn   = document.getElementById('change-doc-btn');

        if (file) {
            if (file.type !== 'application/pdf') { alert('Please upload a valid PDF.'); return; }
            if (pdfUrl) URL.revokeObjectURL(pdfUrl);
            pdfUrl = URL.createObjectURL(file);
            placeholder.classList.add('hidden');
            pdfFrame.src = pdfUrl + "#toolbar=0&navpanes=0";
            pdfFrame.classList.remove('hidden');
            overlay.classList.remove('hidden');
            changeBtn.classList.remove('hidden');
            zone.style.padding = '0';
            zone.style.borderColor = '#3b82f6';
        }
    }

    function addRecipient() {
        recipientCount++;
        const id   = recipientCount;
        const list = document.getElementById('recipients-list');
        const row  = document.createElement('div');
        row.className = 'recipient-row';
        row.id = 'recipient-' + id;

        row.innerHTML = `
            <div class="recipient-avatar" id="avatar-${id}">${id}</div>

            <div class="user-search-wrap" id="search-wrap-${id}">

                <!-- Search input -->
                <div id="search-box-${id}" style="position:relative;">
                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                    </svg>
                    <input
                        type="text"
                        class="user-search-input"
                        id="search-input-${id}"
                        placeholder="Search by name or email..."
                        autocomplete="off"
                        oninput="filterUsers(${id})"
                        onfocus="openDropdown(${id})"
                    />
                    <input type="hidden" name="recipients[${id}][email]" id="selected-email-${id}" required />
                </div>

                <!-- Dropdown -->
                <div class="user-dropdown" id="dropdown-${id}">
                    <div class="no-results" id="no-results-${id}" style="display:none;">No users found.</div>
                </div>

                <!-- Selected chip -->
                <div id="chip-${id}" style="display:none;">
                    <div class="selected-user-chip">
                        <div style="flex:1;min-width:0;">
                            <div class="chip-name" id="chip-name-${id}"></div>
                            <div class="chip-details">
                                <div class="chip-email"    id="chip-email-${id}"></div>
                                <div class="chip-position" id="chip-position-${id}"></div>
                                <div class="chip-division" id="chip-division-${id}"></div>
                            </div>
                        </div>
                        <button type="button" class="chip-clear" onclick="clearSelection(${id})" title="Clear">✕</button>
                    </div>
                </div>
            </div>

            <button type="button" class="remove-btn" onclick="removeRecipient(${id})">
                <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        `;

        list.appendChild(row);
        renderDropdown(id, allUsers);

        document.addEventListener('click', function(e) {
            const wrap = document.getElementById('search-wrap-' + id);
            if (wrap && !wrap.contains(e.target)) closeDropdown(id);
        });
    }

    function renderDropdown(id, users) {
        const dropdown  = document.getElementById('dropdown-' + id);
        const noResults = document.getElementById('no-results-' + id);

        dropdown.querySelectorAll('.user-option').forEach(el => el.remove());

        if (users.length === 0) { noResults.style.display = 'block'; return; }
        noResults.style.display = 'none';

        users.forEach(user => {
            const initials = ((user.firstname?.[0] ?? '') + (user.lastname?.[0] ?? '')).toUpperCase() || '?';
            const fullName = (user.firstname + ' ' + user.lastname).trim() || user.email;
            const role     = user.role ?? 'signee';
            const meta     = [user.position, user.division].filter(Boolean).join(' · ');

            const option = document.createElement('div');
            option.className = 'user-option';
            option.innerHTML = `
                <div class="user-option-avatar">${initials}</div>
                <div style="min-width:0;flex:1;">
                    <div class="user-option-name">${fullName}</div>
                    <div class="user-option-email">${user.email}</div>
                    ${meta ? `<div class="user-option-meta">${meta}</div>` : ''}
                </div>
                <span class="user-option-badge">${role}</span>
            `;
            option.addEventListener('click', () => selectUser(id, user));
            dropdown.appendChild(option);
        });
    }

    function filterUsers(id) {
        const query    = document.getElementById('search-input-' + id).value.toLowerCase();
        const filtered = allUsers.filter(u => {
            const fullName = ((u.firstname ?? '') + ' ' + (u.lastname ?? '')).toLowerCase();
            return fullName.includes(query) || u.email.toLowerCase().includes(query);
        });
        renderDropdown(id, filtered);
        openDropdown(id);
    }

    function openDropdown(id)  { const d = document.getElementById('dropdown-' + id); if (d) d.classList.add('open'); }
    function closeDropdown(id) { const d = document.getElementById('dropdown-' + id); if (d) d.classList.remove('open'); }

    function selectUser(id, user) {
        const fullName = (user.firstname + ' ' + user.lastname).trim() || user.email;

        document.getElementById('selected-email-' + id).value       = user.email;
        document.getElementById('chip-name-' + id).textContent      = fullName;
        document.getElementById('chip-email-' + id).textContent     = user.email;
        document.getElementById('chip-position-' + id).textContent  = user.position ?? '';
        document.getElementById('chip-division-' + id).textContent  = user.division ?? '';

        document.getElementById('search-box-' + id).style.display = 'none';
        document.getElementById('chip-' + id).style.display       = 'block';

        const initials = ((user.firstname?.[0] ?? '') + (user.lastname?.[0] ?? '')).toUpperCase() || '?';
        document.getElementById('avatar-' + id).textContent = initials;

        closeDropdown(id);
    }

    function clearSelection(id) {
        document.getElementById('selected-email-' + id).value      = '';
        document.getElementById('search-input-' + id).value        = '';
        document.getElementById('chip-position-' + id).textContent = '';
        document.getElementById('chip-division-' + id).textContent = '';
        document.getElementById('chip-' + id).style.display        = 'none';
        document.getElementById('search-box-' + id).style.display  = 'block';
        document.getElementById('avatar-' + id).textContent        = id;
        renderDropdown(id, allUsers);
    }

    function removeRecipient(id) {
        const row = document.getElementById('recipient-' + id);
        if (row) row.remove();
    }

    addRecipient();
</script>
</x-layouts::app>