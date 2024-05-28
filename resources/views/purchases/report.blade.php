@php @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Отчёт по закупке позиций
            <x-nav-link :href="route('purchases.index')" :active="request()->routeIs('purchases.index')" wire:navigate>
                Возврат
            </x-nav-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <x-card title="Параметры отчёта">
                <form action="{{ route("purchase-pdf") }}" method="POST" class="grid grid-cols-6 gap-6" target="_blank">
                    @csrf
                    <div class="col-span-2">
                        <x-datetime-picker
                            without-time
                            name="start_date"
                            label="Период с"/>
                    </div>
                    <div class="col-span-2">
                        <x-datetime-picker
                            without-time
                            name="end_date"
                            label="Период по"/>
                    </div>
                    <div class="col-span-4 grid grid-cols-6 gap-6">
                        <div class="col-span-3">
                            <x-select
                                name="provider_id"
                                :options="\App\Models\Provider::all()"
                                option-label="name"
                                option-value="id"
                                label="Поставщик"
                                placeholder="Выбрать поставщика"/>
                        </div>
                        <div class="col-span-3">
                            <x-select
                                name="purchase_status_id"
                                :options="\App\Models\PurchaseStatus::all()"
                                option-label="name"
                                option-value="id"
                                label="Статус закупки"
                                placeholder="Выбрать статус закупки"/>
                        </div>
                    </div>

                    <div class="col-span-6">
                        <x-button type="submit" label="Сформировать отчет" primary/>
                    </div>
                </form>

                <x-table>
                    <x-slot:thead>
                        <x-th>Дата закупки</x-th>
                        <x-th>Тип детали</x-th>
                        <x-th>Номер детали</x-th>
                        <x-th>Количество (шт.)</x-th>
                        <x-th>Стоимость (руб.)</x-th>
                        <x-th>Производитель детали</x-th>
                        <x-th>Поставщик</x-th>
                        <x-th>Дополнительно</x-th>
                    </x-slot:thead>
                    <x-slot:tbody>
                        <tr>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                        </tr>
                        <tr>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                            <x-td></x-td>
                        </tr>
                    </x-slot:tbody>

                </x-table>
            </x-card>
        </div>
    </div>
</x-app-layout>
