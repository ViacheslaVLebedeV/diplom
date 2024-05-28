@php use App\Models\Client;use App\Models\Detail;use App\Models\OrderStatus; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ремонт запасной части:
            <!-- Navigation Link -->
            <x-nav-link :href="route('part-repairs.report')" :active="request()->routeIs('part-repairs.report')" wire:navigate>
                {{ __('Сформировать отчёт') }}
            </x-nav-link>
        </h2>
    </x-slot>

    <x-notifications position="top-right"/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">

            <x-card title="Добавить заказ">
                <form action="{{ route("part-repairs.store") }}" method="POST" class="grid grid-cols-6 gap-6">
                    @csrf
                    <div class="col-span-2">
                        <x-input label="Общая стоимость (в рублях)"
                                 name="price"
                                 placeholder="Пример: 10000 руб."/>
                    </div>
                    @csrf
                    <div class="col-span-2">
                        <x-datetime-picker
                            label="Крайний срок"
                            name="deadline"
                            placeholder="Пример: 16.04.2024 10:00"
                            parse-format="DD-MM-YYYY HH:mm"
                            wire:model.defer="normalPicker"
                        />
                    </div>

                    <div class="col-span-2">
                        <x-select
                            name="detail_id"
                            :options="Detail::all()"
                            option-label="number"
                            option-value="id"
                            label="Запасная часть"
                            placeholder="Выбрать запчасть"/>
                    </div>

                    <div class="col-span-2">
                        <x-select
                            name="client_id"
                            :options="Client::all()"
                            option-label="lastname"
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

                    <div class="col-span-4">
                        <x-textarea name="note" label="Дополнительная информация по заказу"
                                    placeholder="Примечание"/>
                    </div>
                    <div class="col-span-6">
                        <x-button type="submit" label="Создать заказ" primary/>
                    </div>
                </form>
            </x-card>


            <x-card title="Все заказы на ремонт запчасти">

                <form action="{{ route("part-repairs.index") }}" method="GET" class="grid grid-cols-6 gap-6">

                    <div class="col-span-2">
                        <x-select
                            name="detail_id"
                            :options="Detail::all()"
                            option-label="number"
                            option-value="id"
                            label="Запасная часть"
                            placeholder="Выбрать запчасть"/>
                    </div>

                    <div class="col-span-2">
                        <x-select
                            name="client_id"
                            :options="Client::all()"
                            option-label="lastname"
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
                        <x-button type="submit" label="Найти заказы" primary/>
                    </div>
                </form>

                <x-table class="mt-3">
                    <x-slot:thead>
                        <x-th>Номер заказа</x-th>
                        <x-th>Стоимость (руб.)</x-th>
                        <x-th>Дедлайн</x-th>
                        <x-th>Запчасть</x-th>
                        <x-th>Клиент</x-th>
                        <x-th>Статус заказа</x-th>
                        <x-th>Действия</x-th>
                    </x-slot:thead>
                    <x-slot:tbody>
                        @foreach($part_repairs as $part_repair)
                            <tr>
                                <x-td>{{ $part_repair->number }}</x-td>
                                <x-td>{{ $part_repair->price }}</x-td>
                                <x-td>{{ $part_repair->deadline }}</x-td>
                                <x-td>{{ $part_repair->detail->number }}</x-td>
                                <x-td>{{ $part_repair->client->lastname }}</x-td>
                                <x-td>{{ $part_repair->orderStatus->name }}</x-td>
                                <x-td>
                                    <form action="{{ route("part-repairs.destroy", $part_repair->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-button.circle type="submit" icon="pencil-alt"/>
                                    </form>
                                </x-td>
                            </tr>
                        @endforeach
                    </x-slot:tbody>
                    @if($part_repairs->count() == 0)
                        <x-slot:caption>
                            Список пуст
                        </x-slot:caption>
                    @endif
                </x-table>
            </x-card>
        </div>
    </div>
</x-app-layout>
