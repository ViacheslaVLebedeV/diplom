<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ремонт турбокомпрессора
        </h2>
    </x-slot>

    <x-notifications position="top-right" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">

            <x-card title="Добавить заказ">
                <form action="{{ route("turbine-repairs.store") }}" method="POST" class="grid grid-cols-6 gap-6">
                    @csrf
                    <div class="col-span-2">
                        <x-input label="Стоимость общая (в рублях)"
                                 name="price"
                                 placeholder="Пример: 10000 руб."/>
                    </div>
                    @csrf
                    <div class="col-span-2">
                        <x-datetime-picker
                            label="Крайний срок"
                            placeholder="Пример: 16.04.2024 10:00"
                            parse-format="DD-MM-YYYY HH:mm"
                            wire:model.defer="normalPicker"
                        />
                    </div>

                    <div class="col-span-2">
                        <x-select
                            name="turbine_id"
                            :options="\App\Models\Turbine::all()"
                            option-label="number"
                            option-value="id"
                            label="Турбокомпрессор"
                            placeholder="Выбрать турбокомпрессор"/>
                    </div>

                    <div class="col-span-2">
                        <x-select
                            name="client_id"
                            :options="\App\Models\Client::all()"
                            option-label="lastname"
                            option-value="id"
                            label="Клиент"
                            placeholder="Выбрать клиента"/>
                    </div>

                    <div class="col-span-2">
                        <x-select
                            name="order_status_id"
                            :options="\App\Models\OrderStatus::all()"
                            option-label="name"
                            option-value="id"
                            label="Статус заказа"
                            placeholder="Выбрать статус заказа"/>
                    </div>

                    <div class="col-span-4">
                        <x-textarea name="description" label="Дополнительная информация по заказу" placeholder="Примечание"/>
                    </div>
                    <div class="col-span-6">
                        <x-button type="submit" label="Создать заказ" primary/>
                    </div>
                </form>
            </x-card>


            <x-card title="Все заказы на ремонт турбокомпрессора">

                <form action="{{ route("turbine-repairs.index") }}" method="GET" class="grid grid-cols-6 gap-6">

                    <div class="col-span-2">
                        <x-select
                            name="turbine_id"
                            :options="\App\Models\Turbine::all()"
                            option-label="number"
                            option-value="id"
                            label="Турбокомпрессор"
                            placeholder="Выбрать турбокомпрессор"/>
                    </div>

                    <div class="col-span-2">
                        <x-select
                            name="client_id"
                            :options="\App\Models\Client::all()"
                            option-label="lastname"
                            option-value="id"
                            label="Клиент"
                            placeholder="Выбрать клиента"/>
                    </div>

                    <div class="col-span-2">
                        <x-select
                            name="order_status_id"
                            :options="\App\Models\OrderStatus::all()"
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
                        <x-th>Турбокомпрессор</x-th>
                        <x-th>Клиент</x-th>
                        <x-th>Статус заказа</x-th>
                        <x-th>Действия</x-th>
                    </x-slot:thead>
                    <x-slot:tbody>
                        @foreach($turbine_repairs as $turbine_repair)
                            <tr>
                                <x-td>{{ $turbine_repair->number }}</x-td>
                                <x-td>{{ $turbine_repair->price }}</x-td>
                                <x-td>{{ $turbine_repair->deadline }}</x-td>
                                <x-td>{{ $turbine_repair->turbine->number }}</x-td>
                                <x-td>{{ $turbine_repair->client->lastname }}</x-td>
                                <x-td>{{ $turbine_repair->orderStatus->name }}</x-td>
                                <x-td>
                                    <form action="{{ route("turbine-repairs.destroy", $turbine_repair->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-button.circle type="submit" icon="pencil-alt" />
                                    </form>
                                </x-td>
                            </tr>
                        @endforeach
                    </x-slot:tbody>
                    @if($turbine_repairs->count() == 0)
                        <x-slot:caption>
                            Список пуст
                        </x-slot:caption>
                    @endif
                </x-table>
            </x-card>
        </div>
    </div>
</x-app-layout>
