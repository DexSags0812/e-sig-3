<x-layouts::auth>
    <div class="flex flex-col gap-6">
        <div class="flex flex-col items-center gap-2">
            <img src="/dost.png" alt="Logo" style="height:80px; margin-bottom:0.5rem;" />
            <x-auth-header :title="__('eSig-System')" :description="__('Enter your credentials to access your account')" />
        </div>

        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6">
            @csrf
        {{-- Dark blue gradient background override --}}
<style>
    body, html {
        background: linear-gradient(135deg, #0d1b2e 0%, #112240 50%, #0a1628 100%) !important;
        min-height: 100vh;
    }

    .esig-card {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 16px;
        backdrop-filter: blur(10px);
        padding: 2.5rem 3.5rem;
        width: 100%;
        max-width: 780px;
        margin: 0 auto;
    }
    
    .esig-card {
    width: 90vw !important;
    max-width: 780px !important;
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

    .min-h-screen {
    display: flex;
    justify-content: center;
    align-items: center;
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
            <flux:input
                name="email"
                :label="__('Email Address')"
                :value="old('email')"
                type="email"
                class="text-center" 
                required
                autofocus
                autocomplete="username"
                placeholder="you@company.com"
            />

            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Password')"
                    type="password"
                    class="text-center"
                    required
                    autocomplete="current-password"
                    placeholder="Enter your password"
                    viewable
                />
                
                @if (Route::has('password.request'))
                    <flux:link class="absolute top-0 text-xs end-0" :href="route('password.request')" wire:navigate>
                        {{ __('Forgot?') }}
                    </flux:link>
                @endif
            </div>

            <div class="flex items-center justify-between px-1">
                <flux:checkbox name="remember" :label="__('Remember me')" />
            </div>

            <div class="mt-2">
                <flux:button type="submit" variant="primary" class="w-full !bg-blue-600 hover:!bg-blue-500 py-3 shadow-lg shadow-blue-600/20">
                    {{ __('Sign In') }}
                </flux:button>
            </div>

            @if (Route::has('register'))
                <div class="text-center text-sm">
                     Don't have an account? 
                 <a href="{{ route('register') }}" class="underline underline-offset-4">
                    Sign up
                </a>
        </div>
            @endif
        </form>
    </div>
</x-layouts::auth>