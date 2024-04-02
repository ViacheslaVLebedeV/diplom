<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Турбокомпрессоры:
            <!-- Navigation Links -->
            <x-nav-link :href="route('turbines.create')" :active="request()->routeIs('turbines.create')" wire:navigate>
                {{ __('Добавить') }}
            </x-nav-link>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('На Главную') }}
            </x-nav-link>
        </h2>
    </x-slot>
</x-app-layout>
