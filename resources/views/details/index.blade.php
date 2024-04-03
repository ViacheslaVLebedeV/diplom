<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Детали:
            <!-- Navigation Links -->
            <x-nav-link :href="route('details.create')" :active="request()->routeIs('details.create')" wire:navigate>
                {{ __('Добавить') }}
            </x-nav-link>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('На Главную') }}
            </x-nav-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">

            <x-card title="Добавить деталь">
                <form action="{{ route("details.store") }}" method="POST" class="grid grid-cols-6 gap-6">
                    @csrf
                    <div class="col-span-2">
                        <x-input label="Серийный номер"
                                 name="number"
                                 placeholder="Пример: 1000-000-000"/>
                    </div>
                    <div class="col-span-2">

                        <x-select
                            name="manufacturer_id"
                            :options="\App\Models\Manufacturer::all()"
                            option-label="name"
                            option-value="id"
                            label="Производитель"
                            placeholder="Выбрать производителя"/>
                    </div>
                    <div class="col-span-2">
                        <x-select
                            name="detail_type_id"
                            :options="\App\Models\DetailType::all()"
                            label="Тип детали"
                            option-label="name"
                            option-value="id"
                            placeholder="Выбрать тип"/>
                    </div>
                    <div class="col-span-4">
                        <x-textarea name="description" label="Описание" placeholder="Описание"/>
                    </div>
                    <div class="col-span-6">
                        <x-button type="submit" label="Добавить" primary/>
                    </div>
                </form>
            </x-card>

            <x-card>
                <x-table>
                    <x-slot:thead>
                        <x-th>Серийный номер</x-th>
                        <x-th>Производитель</x-th>
                        <x-th>Тип детали</x-th>
                        <x-th>Количество (шт.)</x-th>
                        <x-th>Стоимость (руб.)</x-th>
                        <x-th>Дополнительно</x-th>
                    </x-slot:thead>
                    <x-slot:tbody>
                        @foreach($details as $detail)
                            <tr>
                                <x-td>{{ $detail->number }}</x-td>
                                <x-td>{{ $detail->manufacturer->name }}</x-td>
                                <x-td>{{ $detail->detailType->name }}</x-td>
                                <x-td>{{ $detail->count }}</x-td>
                                <x-td>{{ $detail->price }}</x-td>
                                <x-td>{{ Crypt::decryptString($detail->description) }}</x-td>
                            </tr>
                        @endforeach
                    </x-slot:tbody>
                    @if($details->count() == 0)
                        <x-slot:caption>
                            Список пуст
                        </x-slot:caption>
                    @endif
                </x-table>
            </x-card>
        </div>
    </div>
</x-app-layout>
