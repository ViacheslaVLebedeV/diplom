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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-6 gap-6">

                <div class="col-span-4">
                    <x-card title="Поставщики">

                        <form action="{{ route("providers.store")  }}" method="POST" class="grid grid-cols-2 gap-3">

                            @csrf
                            <div class="col-span-2">
                                <x-input label="Название"
                                         name="name"
                                         placeholder="Пример: СТ-ПАРТС"/>
                            </div>
                            @csrf
                            <div class="grid grid-cols-2 gap-6">
                                <x-input label="Код"
                                         name="sku"
                                         placeholder="Пример: 1"/>
                            </div>
                            @csrf
                            <div class="col-span-4">
                                <x-input label="Примечание"
                                         name="note"
                                         placeholder="Пример: Основной поставщик"/>
                            </div>
                            <x-button class="mt-3" color="primary" type="submit">Добавить</x-button>
                        </form>

                        <x-table class="mt-3">
                            <x-slot:thead>
                                <x-th>Название</x-th>
                                <x-th>Код</x-th>
                                <x-th>Примечание</x-th>
                                <x-th>Действие</x-th>
                            </x-slot:thead>
                            <x-slot:tbody>
                                @foreach($providers as $provider)
                                    <tr>
                                        <x-td>{{ $provider->name }}</x-td>
                                        <x-td>{{ $provider->sku }}</x-td>
                                        <x-td>{{ $provider->note }}</x-td>
                                        <x-td>
                                            <form action="{{ route("providers.destroy", $provider->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-button.circle type="submit" negative icon="trash" />
                                            </form>
                                        </x-td>
                                    </tr>
                                @endforeach
                            </x-slot:tbody>
                            @if($providers->count() == 0)
                                <x-slot:caption>
                                    Список пуст
                                </x-slot:caption>
                            @endif
                        </x-table>

                    </x-card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
