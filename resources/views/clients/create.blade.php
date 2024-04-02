<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Клиенты:
            <!-- Navigation links -->
            <x-nav-link :href="route('clients.create')" :active="request()->routeIs('clients.create')" wire:navigate>
                {{ __('Добавить клиента') }}
            </x-nav-link>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('На Главную') }}
            </x-nav-link>
        </h2>
    </x-slot>
    <x-modal.card title="Добавить клиента" blur wire:model.defer="cardModal">
        <!-- Form for adding a client -->
        <div class="space-y-4">
            <x-input label="Фамилия"
                     placeholder="Иванов"/>
            <x-input label="Имя"
                     placeholder="Иван"/>
            <x-input label="Отчество (если есть)"
                     placeholder="Иванович"/>
            <x-inputs.phone label="Номер телфона" mask="['+7 (###) ###-##-##', '+7 (###) ###-##-##']" />
            <x-input label="Эл. почта"
                     placeholder="example@mail.ru"/>
            <x-textarea label="Дополнительно" placeholder="Примечание для клиента" />
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative label="Отмена" wire:click="delete" />

                <div class="flex">
                    <x-button primary label="Добавить" wire:click="save" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</x-app-layout>
