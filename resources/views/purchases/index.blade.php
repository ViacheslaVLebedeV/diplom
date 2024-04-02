<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Закупки:
            <!-- Navigation Links -->
            <div class="flex">
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('На Главную') }}
                    </x-nav-link>
                </div>
            </div>
        </h2>
    </x-slot>
</x-app-layout>
