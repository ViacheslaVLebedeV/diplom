@php use App\Models\Client;use App\Models\OrderStatus; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Отчёт по ремонту запасных частей
            <x-nav-link :href="route('part-repairs.index')" :active="request()->routeIs('part-repairs.index')" wire:navigate>
                Возврат
            </x-nav-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <x-card title="Параметры отчёта">
                <form action="{{ route("part-repair-pdf") }}" method="POST" class="grid grid-cols-6 gap-6" target="_blank">
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
                    <div class="col-span-3">
                        <x-select
                            name="client_id"
                            :options="\App\Models\Client::all()->map(function ($client) {
                                return ['id' => $client->id, 'name' => $client->fullname()];
                            })->toArray()"
                            option-label="name"
                            option-value="id"
                            label="Клиент"
                            placeholder="Выбрать клиента"/>
                    </div>
                    <div class="col-span-2">
                        <x-select
                            name="order_status_id"
                            :options="OrderStatus::all()"
                            option-label="name"
                            option-value="id"
                            label="Статус заказа"
                            placeholder="Выбрать статус заказа"/>
                    </div>
                    <div class="col-span-6">
                        <x-button type="submit" label="Сформировать отчет" primary/>
                    </div>
                </form>

                <x-table>
                    <x-slot:thead>
                        <x-th>Дата создания</x-th>
                        <x-th>Запасная часть</x-th>
                        <x-th>Статус заказа</x-th>
                        <x-th>Клиент</x-th>
                        <x-th>Стоимость (руб.)</x-th>
                        <x-th>Срок исполнения</x-th>
                        <x-th>Примечание</x-th>
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
                        </tr>
                    </x-slot:tbody>

                </x-table>
            </x-card>
        </div>
    </div>
</x-app-layout>
