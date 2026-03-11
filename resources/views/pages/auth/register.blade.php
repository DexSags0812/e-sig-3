<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Preview</title>
</head>
</html>
@php
// This is just a preview wrapper - remove this block when pasting into your project
@endphp

<x-layouts::auth>

<style>
    body, html {
        background: linear-gradient(135deg, #0d1b2e 0%, #112240 50%, #0a1628 100%) !important;
        min-height: 100vh !important;
        height: 100% !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    body > div,
    body > main,
    body > section,
    body > div > div,
    main,
    .min-h-screen {
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
        min-height: 100vh !important;
        width: 100% !important;
    }

    .esig-card {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 16px;
        backdrop-filter: blur(10px);
        padding: 2.5rem 3.5rem;
        width: 90vw !important;
        max-width: 780px !important;
        margin: auto !important;
    }

    .esig-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .esig-subtitle {
        color: #94a3b8;
        font-size: 0.875rem;
        text-align: center;
        margin-top: 0.25rem;
    }

    .esig-label {
        display: block;
        font-size: 0.8rem;
        color: #94a3b8;
        margin-bottom: 0.4rem;
    }

    .esig-input {
        width: 100%;
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 8px;
        padding: 0.6rem 0.9rem;
        color: #ffffff;
        font-size: 0.9rem;
        outline: none;
        transition: border-color 0.2s;
    }

    .esig-input::placeholder { color: #4a5568; }
    .esig-input:focus { border-color: #3b82f6; }

    .esig-select {
        width: 100%;
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 8px;
        padding: 0.6rem 0.9rem;
        color: #94a3b8;
        font-size: 0.9rem;
        outline: none;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2394a3b8'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 1rem;
        cursor: pointer;
        transition: border-color 0.2s;
    }

    .esig-select:focus { border-color: #3b82f6; color: #fff; }
    .esig-select option { background: #1e293b; color: #fff; }

    .upload-zone {
        border: 2px dashed rgba(255,255,255,0.2);
        border-radius: 10px;
        padding: 1.5rem;
        text-align: center;
        cursor: pointer;
        transition: border-color 0.2s;
        color: #94a3b8;
        font-size: 0.875rem;
    }

    .upload-zone:hover { border-color: #3b82f6; }

    .upload-hint {
        font-size: 0.75rem;
        color: #64748b;
        margin-top: 0.4rem;
    }

    .radio-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #cbd5e1;
        font-size: 0.9rem;
        cursor: pointer;
    }

    .radio-label input[type="radio"] {
        accent-color: #3b82f6;
        width: 1rem;
        height: 1rem;
    }

    .esig-btn {
        width: 100%;
        background: #2563eb;
        color: white;
        font-weight: 600;
        font-size: 0.95rem;
        padding: 0.8rem;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
    }

    .esig-btn:hover { background: #1d4ed8; }

    .footer-text {
        text-align: center;
        font-size: 0.75rem;
        color: #4a5568;
        margin-top: 1rem;
    }

    .footer-text a { color: #3b82f6; text-decoration: none; }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .esig-card { animation: fadeUp 0.4s ease both; }
</style>

<div class="esig-card">

    {{-- Header --}}
    <div class="text-center mb-6">
        <div class="text-center mb-2">
            <img src="/dost.png" alt="Logo" style="height:80px; margin:0 auto 1rem;" />
        </div>
        <div class="esig-title">E-Signer Portal</div>
        <p class="esig-subtitle">Complete your profile to access the signing platform</p>
    </div>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="flex flex-col gap-4">
        @csrf

        @if ($errors->any())
            <div class="text-red-400 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Name Row --}}
        <div style="display:grid; grid-template-columns: 1fr 80px 1fr 100px; gap: 0.75rem;">
            <div>
                <label class="esig-label">First Name</label>
                <input name="firstname" type="text" class="esig-input" style="text-transform: capitalize;" value="{{ old('firstname') }}" required />
            </div>
            <div>
                <label class="esig-label">MI</label>
                <input name="mi" type="text" class="esig-input" style="text-transform: uppercase;" maxlength="1" value="{{ old('mi') }}" />
            </div>
            <div>
                <label class="esig-label">Last Name</label>
                <input name="lastname" type="text" class="esig-input" style="text-transform: capitalize;" value="{{ old('lastname') }}" required />
            </div>
            <div>
                <label class="esig-label">Ext. Name</label>
                <select name="extension_name" class="esig-select">
                    <option value="" {{ old('extension_name') == '' ? 'selected' : '' }}>None</option>
                    <option value="Jr." {{ old('extension_name') == 'Jr.' ? 'selected' : '' }}>Jr.</option>
                    <option value="Sr." {{ old('extension_name') == 'Sr.' ? 'selected' : '' }}>Sr.</option>
                    <option value="II" {{ old('extension_name') == 'II' ? 'selected' : '' }}>II</option>
                    <option value="III" {{ old('extension_name') == 'III' ? 'selected' : '' }}>III</option>
                    <option value="IV" {{ old('extension_name') == 'IV' ? 'selected' : '' }}>IV</option>
                    <option value="V" {{ old('extension_name') == 'V' ? 'selected' : '' }}>V</option>
                </select>
            </div>
        </div>

        {{-- Email --}}
        <div>
            <label class="esig-label">Email</label>
            <input name="email" type="email" class="esig-input" placeholder="you@company.com" value="{{ old('email') }}" required />
        </div>

        {{-- E-Sign Upload --}}
        <div>
            <label class="esig-label">E-Sign Upload</label>
            <div class="upload-zone" onclick="document.getElementById('esig-upload').click()">
                <svg id="upload-icon" style="width:1.25rem;height:1.25rem;display:inline-block;margin-bottom:0.25rem;" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                </svg>
                <span id="upload-label"> Click to upload your signature</span>
                <img id="preview-img" src="#" alt="Preview" style="display:none; max-height:80px; margin:0.5rem auto 0;" />
            </div>
            <p class="upload-hint">Accepted formats: PNG only (Max 5MB)</p>
            <input id="esig-upload" name="esig" type="file" accept="image/png" class="hidden" required onchange="previewSig(event)" />
        </div>

        {{-- Position & Division --}}
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 0.75rem;">
            <div>
                <label class="esig-label">Company Position</label>
                <select name="position" class="esig-select" required>
                    <option value="" disabled {{ old('position') ? '' : 'selected' }}>Select position</option>
                    <option value="Regional Director" {{ old('position') == 'Regional Director' ? 'selected' : '' }}>Regional Director</option>
                    <option value="Chief Science Research Specialist" {{ old('position') == 'Chief Science Research Specialist' ? 'selected' : '' }}>Chief Science Research Specialist</option>
                    <option value="Chief Administrative Officer" {{ old('position') == 'Chief Administrative Officer' ? 'selected' : '' }}>Chief Administrative Officer</option>
                    <option value="Supervising Science Research Specialist" {{ old('position') == 'Supervising Science Research Specialist' ? 'selected' : '' }}>Supervising Science Research Specialist</option>
                    <option value="Administrative Officer V" {{ old('position') == 'Administrative Officer V' ? 'selected' : '' }}>Administrative Officer V</option>
                    <option value="Senior Science Research Specialist" {{ old('position') == 'Senior Science Research Specialist' ? 'selected' : '' }}>Senior Science Research Specialist</option>
                    <option value="Accountant" {{ old('position') == 'Accountant' ? 'selected' : '' }}>Accountant</option>
                    <option value="Science Research Specialist II" {{ old('position') == 'Science Research Specialist II' ? 'selected' : '' }}>Science Research Specialist II</option>
                    <option value="Science Research Specialist I" {{ old('position') == 'Science Research Specialist I' ? 'selected' : '' }}>Science Research Specialist I</option>
                    <option value="Science Research Analyst" {{ old('position') == 'Science Research Analyst' ? 'selected' : '' }}>Science Research Analyst</option>
                    <option value="Administrative Assistant III" {{ old('position') == 'Administrative Assistant III' ? 'selected' : '' }}>Administrative Assistant III</option>
                    <option value="Science Aide" {{ old('position') == 'Science Aide' ? 'selected' : '' }}>Science Aide</option>
                    <option value="Administrative Aide IV" {{ old('position') == 'Administrative Aide IV' ? 'selected' : '' }}>Administrative Aide IV</option>
                    <option value="Administrative Aide I" {{ old('position') == 'Administrative Aide I' ? 'selected' : '' }}>Administrative Aide I</option>
                    <option value="Project Technical Specialist III" {{ old('position') == 'Project Technical Specialist III' ? 'selected' : '' }}>Project Technical Specialist III</option>
                    <option value="Project Technical Specialist I" {{ old('position') == 'Project Technical Specialist I' ? 'selected' : '' }}>Project Technical Specialist I</option>
                    <option value="Science Research Assistant" {{ old('position') == 'Science Research Assistant' ? 'selected' : '' }}>Science Research Assistant</option>
                    <option value="Project Technical Assistant IV" {{ old('position') == 'Project Technical Assistant IV' ? 'selected' : '' }}>Project Technical Assistant IV</option>
                    <option value="Project Technical Assistant III" {{ old('position') == 'Project Technical Assistant III' ? 'selected' : '' }}>Project Technical Assistant III</option>
                    <option value="Project Technical Assistant II" {{ old('position') == 'Project Technical Assistant II' ? 'selected' : '' }}>Project Technical Assistant II</option>
                    <option value="Project Technical Assistant I" {{ old('position') == 'Project Technical Assistant I' ? 'selected' : '' }}>Project Technical Assistant I</option>
                    <option value="Project Administrative Aide V" {{ old('position') == 'Project Administrative Aide V' ? 'selected' : '' }}>Project Administrative Aide V</option>
                    <option value="Project Administrative Aide III" {{ old('position') == 'Project Administrative Aide III' ? 'selected' : '' }}>Project Administrative Aide III</option>
                    <option value="Project Administrative Aide I" {{ old('position') == 'Project Administrative Aide I' ? 'selected' : '' }}>Project Administrative Aide I</option>
                    <option value="Project Technical Aide V" {{ old('position') == 'Project Technical Aide V' ? 'selected' : '' }}>Project Technical Aide V</option>
                    <option value="Project Technical Aide III" {{ old('position') == 'Project Technical Aide III' ? 'selected' : '' }}>Project Technical Aide III</option>
                    <option value="Clerk II" {{ old('position') == 'Clerk II' ? 'selected' : '' }}>Clerk II</option>
                    <option value="Project Utility Aide II" {{ old('position') == 'Project Utility Aide II' ? 'selected' : '' }}>Project Utility Aide II</option>
                    <option value="Project Laborer I" {{ old('position') == 'Project Laborer I' ? 'selected' : '' }}>Project Laborer I</option>
                    <option value="Communications Equipment Operator III" {{ old('position') == 'Communications Equipment Operator III' ? 'selected' : '' }}>Communications Equipment Operator III</option>
                    <option value="On-the-Job Trainee" {{ old('position') == 'On-the-Job Trainee' ? 'selected' : '' }}>On-the-Job Trainee</option>
                </select>
            </div>
            <div>
                <label class="esig-label">Division</label>
                <select name="division" class="esig-select" required>
                    <option value="" disabled {{ old('division') ? '' : 'selected' }}>Select division</option>
                    <option value="Office of the Regional Director" {{ old('division') == 'Office of the Regional Director' ? 'selected' : '' }}>Office of the Regional Director</option>
                    <option value="Office of the Assistant Regional Director for FOS" {{ old('division') == 'Office of the Assistant Regional Director for FOS' ? 'selected' : '' }}>Office of the Assistant Regional Director for FOS</option>
                    <option value="Office of the Assistant Regional Director for TS" {{ old('division') == 'Office of the Assistant Regional Director for TS' ? 'selected' : '' }}>Office of the Assistant Regional Director for TS</option>
                    <option value="ORD - Records Unit" {{ old('division') == 'ORD - Records Unit' ? 'selected' : '' }}>ORD - Records Unit</option>
                    <option value="ORD - Management Information System" {{ old('division') == 'ORD - Management Information System' ? 'selected' : '' }}>ORD - Management Information System</option>
                    <option value="ORD - Planning Unit" {{ old('division') == 'ORD - Planning Unit' ? 'selected' : '' }}>ORD - Planning Unit</option>
                    <option value="ORD - RRDIC" {{ old('division') == 'ORD - RRDIC' ? 'selected' : '' }}>ORD - RRDIC</option>
                    <option value="ORD - CIEERDEC" {{ old('division') == 'ORD - CIEERDEC' ? 'selected' : '' }}>ORD - CIEERDEC</option>
                    <option value="ORD - CRHRDC" {{ old('division') == 'ORD - CRHRDC' ? 'selected' : '' }}>ORD - CRHRDC</option>
                    <option value="Office of the Assistant Regional Director for FAS" {{ old('division') == 'Office of the Assistant Regional Director for FAS' ? 'selected' : '' }}>Office of the Assistant Regional Director for FAS</option>
                    <option value="FAS - Human Resource" {{ old('division') == 'FAS - Human Resource' ? 'selected' : '' }}>FAS - Human Resource</option>
                    <option value="FAS - Accounting" {{ old('division') == 'FAS - Accounting' ? 'selected' : '' }}>FAS - Accounting</option>
                    <option value="FAS - Budget" {{ old('division') == 'FAS - Budget' ? 'selected' : '' }}>FAS - Budget</option>
                    <option value="FAS - Property & Supply; General Services" {{ old('division') == 'FAS - Property & Supply; General Services' ? 'selected' : '' }}>FAS - Property & Supply; General Services</option>
                    <option value="FAS - Cashier" {{ old('division') == 'FAS - Cashier' ? 'selected' : '' }}>FAS - Cashier</option>
                    <option value="FAS - Gender and Development Unit" {{ old('division') == 'FAS - Gender and Development Unit' ? 'selected' : '' }}>FAS - Gender and Development Unit</option>
                    <option value="TS - Disaster Risk Reduction and Management" {{ old('division') == 'TS - Disaster Risk Reduction and Management' ? 'selected' : '' }}>TS - Disaster Risk Reduction and Management</option>
                    <option value="TS - Scholarship" {{ old('division') == 'TS - Scholarship' ? 'selected' : '' }}>TS - Scholarship</option>
                    <option value="TS - S & T Promo" {{ old('division') == 'TS - S & T Promo' ? 'selected' : '' }}>TS - S & T Promo</option>
                    <option value="TS - Regional Standards and Testing Laboratories" {{ old('division') == 'TS - Regional Standards and Testing Laboratories' ? 'selected' : '' }}>TS - Regional Standards and Testing Laboratories</option>
                    <option value="TS - Regional Metrology Laboratory" {{ old('division') == 'TS - Regional Metrology Laboratory' ? 'selected' : '' }}>TS - Regional Metrology Laboratory</option>
                    <option value="TS - Advanced Manufacturing Center" {{ old('division') == 'TS - Advanced Manufacturing Center' ? 'selected' : '' }}>TS - Advanced Manufacturing Center</option>
                    <option value="TS - P & L" {{ old('division') == 'TS - P & L' ? 'selected' : '' }}>TS - P & L</option>
                    <option value="TS - R & D" {{ old('division') == 'TS - R & D' ? 'selected' : '' }}>TS - R & D</option>
                    <option value="TS - FOB" {{ old('division') == 'TS - FOB' ? 'selected' : '' }}>TS - FOB</option>
                    <option value="TS - Grind" {{ old('division') == 'TS - Grind' ? 'selected' : '' }}>TS - Grind</option>
                    <option value="TS - LGIA" {{ old('division') == 'TS - LGIA' ? 'selected' : '' }}>TS - LGIA</option>
                    <option value="TS - TECHNICAL CONSULTANCY SERVICES" {{ old('division') == 'TS - TECHNICAL CONSULTANCY SERVICES' ? 'selected' : '' }}>TS - TECHNICAL CONSULTANCY SERVICES</option>
                    <option value="TS - MICROBIOLOGICAL TESTING LABORATORY" {{ old('division') == 'TS - MICROBIOLOGICAL TESTING LABORATORY' ? 'selected' : '' }}>TS - MICROBIOLOGICAL TESTING LABORATORY</option>
                    <option value="TS - CHEMICAL TESTING LABORATORY" {{ old('division') == 'TS - CHEMICAL TESTING LABORATORY' ? 'selected' : '' }}>TS - CHEMICAL TESTING LABORATORY</option>
                    <option value="TS - SERICULTURE UNIT" {{ old('division') == 'TS - SERICULTURE UNIT' ? 'selected' : '' }}>TS - SERICULTURE UNIT</option>
                    <option value="TS - SPECIAL PROJECTS" {{ old('division') == 'TS - SPECIAL PROJECTS' ? 'selected' : '' }}>TS - SPECIAL PROJECTS</option>
                    <option value="TS - SETUP" {{ old('division') == 'TS - SETUP' ? 'selected' : '' }}>TS - SETUP</option>
                    <option value="TS - OAR TS" {{ old('division') == 'TS - OAR TS' ? 'selected' : '' }}>TS - OAR TS</option>
                    <option value="FOS - SETUP" {{ old('division') == 'FOS - SETUP' ? 'selected' : '' }}>FOS - SETUP</option>
                    <option value="FOS - CEST" {{ old('division') == 'FOS - CEST' ? 'selected' : '' }}>FOS - CEST</option>
                    <option value="FOS - SSCP" {{ old('division') == 'FOS - SSCP' ? 'selected' : '' }}>FOS - SSCP</option>
                    <option value="PSTO - ABRA" {{ old('division') == 'PSTO - ABRA' ? 'selected' : '' }}>PSTO - ABRA</option>
                    <option value="PSTO - APAYAO" {{ old('division') == 'PSTO - APAYAO' ? 'selected' : '' }}>PSTO - APAYAO</option>
                    <option value="PSTO - BENGUET" {{ old('division') == 'PSTO - BENGUET' ? 'selected' : '' }}>PSTO - BENGUET</option>
                    <option value="PSTO - IFUGAO" {{ old('division') == 'PSTO - IFUGAO' ? 'selected' : '' }}>PSTO - IFUGAO</option>
                    <option value="PSTO - KALINGA" {{ old('division') == 'PSTO - KALINGA' ? 'selected' : '' }}>PSTO - KALINGA</option>
                    <option value="PSTO - MT. PROVINCE" {{ old('division') == 'PSTO - MT. PROVINCE' ? 'selected' : '' }}>PSTO - MT. PROVINCE</option>
                </select>
            </div>
        </div>

        {{-- Role --}}
        <div>
            <label class="esig-label">Role</label>
            <div style="display:flex; gap:1.5rem; margin-top:0.25rem;">
                <label class="radio-label">
                    <input type="radio" name="role" value="requestor" {{ old('role', 'requestor') == 'requestor' ? 'checked' : '' }} />
                    Requestor
                </label>
                <label class="radio-label">
                    <input type="radio" name="role" value="signer" {{ old('role') == 'signer' ? 'checked' : '' }} />
                    Signer
                </label>
            </div>
        </div>

        {{-- Password Row --}}
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 0.75rem;">
            <div>
                <label class="esig-label">Password</label>
                <div style="position:relative;">
                    <input id="password-input" name="password" type="password" class="esig-input" placeholder="Enter your password" required autocomplete="new-password" style="padding-right:2.5rem;" />
                    <button type="button" onclick="togglePassword('password-input')" style="position:absolute;right:0.75rem;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#94a3b8;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </button>
                </div>
            </div>
            <div>
                <label class="esig-label">Confirm Password</label>
                <div style="position:relative;">
                    <input id="confirm-input" name="password_confirmation" type="password" class="esig-input" placeholder="Confirm your password" required autocomplete="new-password" style="padding-right:2.5rem;" />
                    <button type="button" onclick="togglePassword('confirm-input')" style="position:absolute;right:0.75rem;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#94a3b8;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Submit --}}
        <button type="submit" class="esig-btn mt-2">Continue to Dashboard</button>

        <p class="footer-text">
            By continuing, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
        </p>

        @if (Route::has('login'))
            <p class="footer-text">
                Already registered? <a href="{{ route('login') }}">Login</a>
            </p>
        @endif

    </form>
</div>

<script>
    // Signature preview
    function previewSig(event) {
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
            const img = document.getElementById('preview-img');
            const label = document.getElementById('upload-label');
            const icon = document.getElementById('upload-icon');

            img.src = e.target.result;
            img.style.display = 'block';
            label.textContent = ' ' + file.name;
            if (icon) icon.style.display = 'none';
        };
        reader.readAsDataURL(file);
    }

    // Password toggle
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        input.type = input.type === 'password' ? 'text' : 'password';
    }

    // Force center via JS as fallback
    document.addEventListener('DOMContentLoaded', function () {
        const allDivs = document.querySelectorAll('body > div, body > main, body > section');
        allDivs.forEach(el => {
            el.style.display = 'flex';
            el.style.flexDirection = 'column';
            el.style.alignItems = 'center';
            el.style.justifyContent = 'center';
            el.style.minHeight = '100vh';
        });
    });
</script>

</x-layouts::auth>