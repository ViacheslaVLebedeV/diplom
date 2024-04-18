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
                <div class="col-span-2">
                    <x-card title="Статусы закупок">

                        <form action="{{ route("purchase-statuses.store")  }}" method="POST">
                            @csrf
                            <x-input label="Название" name="name" placeholder="Пример: Получена"/>
                            <x-button class="mt-3" color="primary" type="submit">Добавить</x-button>
                        </form>

                        <x-table class="mt-3">
                            <x-slot:thead>
                                <x-th>Название</x-th>
                                <x-th>Действие</x-th>
                            </x-slot:thead>
                            <x-slot:tbody>
                                @foreach($purchase_statuses as $purchase_status)
                                    <tr>
                                        <x-td>{{ $purchase_status->name }}</x-td>
                                        <x-td>
                                            <form action="{{ route("purchase-statuses.destroy", $purchase_status->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-button.circle type="submit" none icon="pencil-alt" />
                                            </form>
                                        </x-td>
                                    </tr>
                                @endforeach
                            </x-slot:tbody>
                            @if($purchase_statuses->count() == 0)
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
