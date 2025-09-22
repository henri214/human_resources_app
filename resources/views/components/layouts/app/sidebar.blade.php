<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Candidates')" class="grid">
                <flux:navlist.item icon="users" :href="route('candidatesindex')"
                    :current="request()->routeIs('candidatesindex')" wire:navigate>{{ __('List of Candidates') }}
                </flux:navlist.item>
                <flux:navlist.item icon="plus" :href="route('candidatescreate')"
                    :current="request()->routeIs('candidatescreate')" wire:navigate>{{ __('Create a new Candidate') }}
                </flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group :heading="__('Jobs')" class="grid">
                <flux:navlist.item icon="folder" :href="route('jobsindex')" :current="request()->routeIs('jobsindex')"
                    wire:navigate>{{ __('List of Jobs') }}
                </flux:navlist.item>
                <flux:navlist.item icon="plus" :href="route('jobscreate')"
                    :current="request()->routeIs('jobscreate')" wire:navigate>{{ __('Create a new Job') }}
                </flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.group :heading="__('Interviews')" class="grid">
                <flux:navlist.item icon="document" :href="route('interviewsindex')"
                    :current="request()->routeIs('interviewsindex')" wire:navigate>{{ __('List of Interviews') }}
                </flux:navlist.item>
                <flux:navlist.item icon="plus" :href="route('interviewscreate')"
                    :current="request()->routeIs('interviewscreate')" wire:navigate>{{ __('Create a new Interview') }}
                </flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.group :heading="__('Communications')" class="grid">
                <flux:navlist.item icon="calendar" :href="route('communicationsindex')"
                    :current="request()->routeIs('communicationsindex')" wire:navigate>
                    {{ __('List of Communications') }}
                </flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.group :heading="__('Whatsapp')" class="grid">
                <flux:navlist.item icon="calendar" :href="route('jobswhatsapp-contact')"
                    :current="request()->routeIs('jobswhatsapp-contact')" wire:navigate>
                    {{ __('Send Message on WhatsApp') }}
                </flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.group :heading="__('Email')" class="grid">
                <flux:navlist.item icon="calendar" :href="route('jobssend-emails')"
                    :current="request()->routeIs('jobssend-emails')" wire:navigate>
                    {{ __('Send Email on Jobs') }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />
        {{-- <flux:dropdown>
            <flux:profile :name="App\Models\Candidate::find(session('candidate_id'))->name ?? 'Select Candidate'"
                icon-trailing="chevrons-up-down">
            </flux:profile>
            <flux:menu>
                @foreach (App\Models\Candidate::all() as $candidate)
                    <flux:menu.radio.group>
                        @livewire('candidate-switch', ['candidate' => $candidate], key($candidate->id))
                    </flux:menu.radio.group>
                @endforeach
            </flux:menu>
        </flux:dropdown> --}}
        @if (session()->has('errorMsg'))
            <x-auth-session-status class="text-center text-red-500" :status="session('errorMsg')">

            </x-auth-session-status>
        @endif
        {{-- <flux:navlist variant="outline">

            <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire"
                target="_blank">
                {{ __('Documentation') }}
            </flux:navlist.item>
        </flux:navlist> --}}

        <!-- Desktop User Menu -->
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon:trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>
