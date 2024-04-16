<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Справочники:
            <!-- Navigation Links -->
            <x-nav-link :href="route('dictionaries.providers')" :active="request()->routeIs('dictionaries.providers')" wire:navigate>
                {{ __('Поставщики') }}
            </x-nav-link>
            <x-nav-link :href="route('dictionaries.manufacturers')" :active="request()->routeIs('dictionaries.manufacturers')" wire:navigate>
                {{ __('Производители') }}
            </x-nav-link>
            <x-nav-link :href="route('dictionaries.detail-types')" :active="request()->routeIs('dictionaries.detail-types')" wire:navigate>
                {{ __('Типы деталей') }}
            </x-nav-link>
            <x-nav-link :href="route('dictionaries.order-statuses')" :active="request()->routeIs('dictionaries.order-statuses')" wire:navigate>
                {{ __('Статусы заказов') }}
            </x-nav-link>
            <x-nav-link :href="route('dictionaries.purchase-statuses')" :active="request()->routeIs('dictionaries.purchase-statuses')" wire:navigate>
                {{ __('Статусы закупок') }}
            </x-nav-link>
        </h2>
    </x-slot>
</x-app-layout>
