<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('partials.head')
    </head>
    <body class="min-h-screen" style="background: linear-gradient(135deg, #0d1b2e 0%, #112240 50%, #0a1628 100%) !important;">
        <flux:sidebar sticky collapsible :open="false" class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.header class="flex items-center justify-end">
                <img src="/dost.png" alt="Logo" style="height:36px;" />
                <flux:sidebar.toggle icon="bars-2" class="hidden lg:inline-flex" />
            </flux:sidebar.header>
            <flux:sidebar.nav>
                <flux:sidebar.group :heading="__('Platrom')" class="grid">

                    @php
                        $userRole = Str::lower(auth()->user()->role);
                    @endphp

                    {{-- SHARED: Dashboard --}}
                    <flux:sidebar.item icon="home" 
                    :href="auth()->user()->role === 'signer' ? route('dashboard.signer') : route('dashboard.requestor')" 
                    :current="request()->routeIs('dashboard.*')" 
                    wire:navigate>
                    {{ __('Dashboard') }}
                </flux:sidebar.item>    

                    {{-- REQUESTOR VIEW --}}
                    @if($userRole === 'requestor')
                        <flux:sidebar.item icon="plus-circle" :href="route('new-request')" :current="request()->routeIs('new-request')" wire:navigate>
                            {{ __('New Request') }}
                        </flux:sidebar.item>
                        <flux:sidebar.item icon="check-badge" :href="route('requestor.signed')" :current="request()->routeIs('requestor.signed')" wire:navigate>
                            {{ __('Signed Docs') }}
                        </flux:sidebar.item>
                        <flux:sidebar.item icon="document-duplicate" :href="route('requestor.signed')" :current="request()->routeIs('documents')" wire:navigate>
                            {{ __('Pending Requests') }}
                        </flux:sidebar.item>

                    {{-- SIGNEE/SIGNER VIEW --}}
                        @elseif($userRole === 'signer' || $userRole === 'signee')
                            <flux:sidebar.item icon="inbox" :href="route('inbox')" :current="request()->routeIs('inbox')" wire:navigate>
                                {{ __('Inbox') }}
                            </flux:sidebar.item>
                            <flux:sidebar.item icon="check-badge" :href="route('signee.signed')" :current="request()->routeIs('signee.signed')" wire:navigate>
                                {{ __('Signed Documents') }}
                            </flux:sidebar.item>
                        @endif

                </flux:sidebar.group>
            </flux:sidebar.nav>
            <flux:spacer />
            <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        </flux:sidebar>

        {{-- MOBILE HEADER --}}
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
            <flux:spacer />
            <flux:dropdown position="top" align="end">
                <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />
                <flux:menu>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    <flux:menu.separator />
                    <form method="POST" action="{{ route('logout')   }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full cursor-pointer">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{-- Content --}}
        {{ $slot }}

        @fluxScripts
    </body>
</html>