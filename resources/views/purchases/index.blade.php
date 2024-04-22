@php use App\Models\Client;use App\Models\Detail;use App\Models\OrderStatus;use App\Models\Provider;use App\Models\PurchaseStatus; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Закупки позиций:
            <!-- Navigation Link -->
            <x-nav-link :href="route('purchase-reports.index')" :active="request()->routeIs('purchase-reports.index')"
                        wire:navigate>
                {{ __('Сформировать отчёт') }}
            </x-nav-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <x-card title="Добавить закупку">
                <form action="{{ route("purchases.store") }}" method="POST" class="grid grid-cols-6 gap-6">
                    @csrf
                    <div class="col-span-2">
                        <x-select
                            name="detail_id"
                            :options="Detail::all()"
                            option-label="number"
                            option-value="id"
                            label="Деталь"
                            placeholder="Выбрать деталь"/>
                    </div>
                    <div class="col-span-2">
                        <x-select
                            name="provider_id"
                            :options="Provider::all()"
                            option-label="name"
                            option-value="id"
                            label="Поставщик"
                            placeholder="Выбрать поставщика"/>
                    </div>
                    <div class="col-span-2">
                        <x-select
                            name="purchase_status_id"
                            :options="PurchaseStatus::all()"
                            option-label="name"
                            option-value="id"
                            label="Статус закупки"
                            placeholder="Выбрать статус закупки"/>
                    </div>

                    <div class="col-span-2">
                        <x-input label="Цена позиции (в рублях)"
                                 name="price"
                                 placeholder="Пример: 10000 руб."/>
                    </div>
                    <div class="col-span-1">
                        <x-inputs.number name="count" label="Количество позиций"/>
                    </div>
                    <div class="col-span-4">
                        <x-textarea name="note" label="Дополнительная информация" placeholder="Примечание"/>
                    </div>
                    <div class="col-span-6">
                        <x-button type="submit" label="Добавить закупку" primary/>
                    </div>
                </form>
            </x-card>


            <x-card title="Все закупки позиций">

                <form action="{{ route("purchases.index") }}" method="GET" class="grid grid-cols-6 gap-6">

                    <div class="col-span-2">
                        <x-select
                            name="detail_id"
                            :options="Detail::all()"
                            option-label="number"
                            option-value="id"
                            label="Деталь"
                            placeholder="Выбрать деталь"/>
                    </div>
                    <div class="col-span-2">
                        <x-select
                            name="provider_id"
                            :options="Provider::all()"
                            option-label="name"
                            option-value="id"
                            label="Поставщик"
                            placeholder="Выбрать поставщика"/>
                    </div>
                    <div class="col-span-2">
                        <x-select
                            name="purchase_status_id"
                            :options="PurchaseStatus::all()"
                            option-label="name"
                            option-value="id"
                            label="Статус закупки"
                            placeholder="Выбрать статус закупки"/>
                    </div>

                    <div class="col-span-6">
                        <x-button type="submit" label="Найти закупки" primary/>
                    </div>
                </form>

                <x-table class="mt-3">
                    <x-slot:thead>
                        <x-th>Номер закупки</x-th>
                        <x-th>Цена (руб.)</x-th>
                        <x-th>Количество (шт.)</x-th>
                        <x-th>Позиция</x-th>
                        <x-th>Поставщик</x-th>
                        <x-th>Статус закупки</x-th>
                        <x-th>Действия</x-th>
                    </x-slot:thead>
                    <x-slot:tbody>
                        @foreach($purchases as $purchase)
                            <tr>
                                <x-td>{{ $purchase->number }}</x-td>
                                <x-td>{{ $purchase->price }}</x-td>
                                <x-td>{{ $purchase->count }}</x-td>
                                <x-td>{{ $purchase->detail->number }}</x-td>
                                <x-td>{{ $purchase->provider->name }}</x-td>
                                <x-td>{{ $purchase->purchaseStatus->name }}</x-td>
                                <x-td>
                                    <form action="{{ route("purchases.update", $purchase->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('UPDATE')
                                        <x-button.circle type="submit" icon="pencil-alt"/>
                                    </form>
                                </x-td>
                            </tr>
                        @endforeach
                    </x-slot:tbody>
                    @if($purchases->count() == 0)
                        <x-slot:caption>
                            Список пуст
                        </x-slot:caption>
                    @endif
                </x-table>
            </x-card>
        </div>
    </div>

</x-app-layout>
