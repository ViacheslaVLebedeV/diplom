<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Детали:
            <!-- Navigation Links -->
            <x-nav-link :href="route('details.create')" :active="request()->routeIs('details.create')" wire:navigate>
                {{ __('Добавить деталь') }}
            </x-nav-link>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('На Главную') }}
            </x-nav-link>
        </h2>
    </x-slot>
</x-app-layout>
<x-modal.card title="Добавить деталь" blur wire:model.defer="cardModal">
    <!-- Добавление детали -->
    <div class="space-y-4">
        <x-input label="Серийный номер"/>
        <x-select
            :options="['Jrone', 'E&E Turbo', 'Krauf']"
            label="Производитель"/>
        <x-select
            :options="['Вал', 'Колесо', 'Корпус']"
            label="Тип детали"/>
        <x-input label="Количество (шт.)"/>
        <x-input label="Стоимость (руб.)"/>
        <x-textarea label="Описание" />
    </div>

    <x-slot name="footer">
        <div class="flex justify-between gap-x-4">
            <x-button flat negative label="Отмена" wire:click="delete" />

            <div class="flex">
                <x-button primary label="Сохранить" wire:click="save" />
            </div>
        </div>
    </x-slot>
</x-modal.card>

