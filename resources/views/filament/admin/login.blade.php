{{--
    Desain ini adalah terjemahan dari kode React yang Anda berikan,
    menggunakan komponen Blade, Tailwind CSS, dan Alpine.js.
--}}
<x-filament-panels::page.simple class="fi-auth-login">

    {{-- Header Kustom (dari React) --}}
    <div class="text-center">
        {{-- Ikon Factory (diterjemahkan ke Heroicon 'building-office-2') --}}
        <svg class="mx-auto h-12 w-12 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M8.25 21h7.5M8.25 3h7.5m-7.5 18h7.5M12 21v-3.75c0-.621.504-1.125 1.125-1.125h1.5c.621 0 1.125.504 1.125 1.125V21m-4.5 0v-3.75c0-.621-.504-1.125-1.125-1.125h-1.5c-.621 0-1.125.504-1.125 1.125V21" />
        </svg>
        <h2 class="mt-6 text-3xl font-extrabold text-gray-900 dark:text-white">
            CRM Percetakan
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Masuk ke sistem manajemen
        </p>
    </div>

    @if (filament()->auth()->hasLogin())
        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE, scopes: $this->getRenderHookScopes()) }}

        {{--
            Formulir ini ('Card' di React) akan merender:
            - "Masukkan email dan password Anda" (jika Anda menambahkannya di AdminPanelProvider)
            - Input Email
            - Input Password (lengkap dengan tombol show/hide 'Eye'/'EyeOff')
            - Tombol "Remember me"
            - Alert Error (jika login gagal)
        --}}
        <x-filament-panels::form wire:submit="authenticate" class="mt-8">
            {{ $this->form }}

            <x-filament-panels::form.actions
                :actions="$this->getCachedFormActions()"
                :full-width="$this->hasFullWidthFormActions()"
            />
        </x-filament-panels::form>

        {{-- Bagian "Credential Demo" (diterjemahkan ke Alpine.js) --}}
        <div x-data="{ showCredentials: false }" class="space-y-4">
            <div class="text-center">
                <button
                    type="button"
                    @click="showCredentials = !showCredentials"
                    class="flex items-center justify-center mx-auto text-sm font-medium text-primary-600 hover:text-primary-700 dark:text-primary-500 dark:hover:text-primary-400"
                >
                    <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    Lihat Credential Demo
                </button>
            </div>

            <div
                x-show="showCredentials"
                x-cloak
                x-transition
                class="fi-color-info rounded-lg bg-info-50 p-4 text-sm text-info-700 dark:bg-info-500/10 dark:text-info-400"
                role="alert"
            >
                <div class="flex items-start space-x-3 rtl:space-x-reverse">
                    <svg class="h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    <div class="space-y-2 text-sm">
                        <p class="font-semibold">Credential untuk testing:</p>
                        <div class="space-y-1">
                            <p>
                                <strong>Admin:</strong> admin@example.com / password
                            </p>
                            <p>
                                <strong>Desain:</strong> desain@example.com / password
                            </p>
                            <p>
                                <strong>Produksi:</strong> produksi@example.com / password
                            </p>
                            <p>
                                <strong>Manajemen:</strong> manajemen@example.com / password
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, scopes: $this->getRenderHookScopes()) }}
    @endif
</x-filament-panels::page.simple>

