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
                    <x-card title="Типы деталей">

                        <form action="{{ route("detail-types.store")  }}" method="POST" class="grid grid-cols-2 gap-3">
                            @csrf
                            <div class="col-span-1">
                                <x-input label="Название"
                                         name="name"
                                         placeholder="Пример: Картридж"/>
                            </div>
                            @csrf
                            <div class="col-span-4">
                                <x-input label="Примечание"
                                         name="note"
                                         placeholder="Пример: Несущая конструкция"/>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <x-button color="primary" type="submit">Добавить</x-button>
                            </div>
                        </form>

                        <x-table class="mt-3">
                            <x-slot:thead>
                                <x-th>Название</x-th>
                                <x-th>Примечание</x-th>
                                <x-th>Действия</x-th>
                            </x-slot:thead>
                            <x-slot:tbody>
                                @foreach($detail_types as $detail_type)
                                    <tr>
                                        <x-td>{{ $detail_type->name }}</x-td>
                                        <x-td>{{ $detail_type->note }}</x-td>
                                        <x-td>
                                            <form action="{{ route("detail-types.destroy", $detail_type->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-button.circle type="submit" negative icon="trash" />
                                            </form>
                                        </x-td>
                                    </tr>
                                @endforeach
                            </x-slot:tbody>
                            @if($detail_types->count() == 0)
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
