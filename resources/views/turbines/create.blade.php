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
<x-modal.card title="Добавить турбокомпрессор" blur wire:model.defer="cardModal">
    <!-- Form for adding a turbine -->
    <div class="space-y-4">
        <x-input label="Серийный номер"/>

        <x-select
            :options="['Garrett', 'KKK', 'Holset']"
            label="Производитель"/>

        <x-textarea label="Дополнительно" />
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
