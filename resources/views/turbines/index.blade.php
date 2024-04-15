<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Турбокомпрессоры
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">

            <x-card title="Добавить турбокомпрессор">
                <form action="{{ route("turbines.store") }}" method="POST" class="grid grid-cols-6 gap-6">
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
                    <div class="col-span-4">
                        <x-textarea name="description" label="Описание" placeholder="Описание"/>
                    </div>
                    <div class="col-span-6">
                        <x-button type="submit" label="Добавить" primary/>
                    </div>
                </form>
            </x-card>

            <x-card title="Все турбокомпрессоры">

                <form action="{{ route("turbines.index") }}" method="GET" class="grid grid-cols-6 gap-6">
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

                    <div class="col-span-6">
                        <x-button type="submit" label="Найти" primary/>
                    </div>
                </form>

                <x-table class="mt-3">
                    <x-slot:thead>
                        <x-th>Серийный номер</x-th>
                        <x-th>Производитель</x-th>
                        <x-th>Описание</x-th>
                        <x-th>Действия</x-th>
                    </x-slot:thead>
                    <x-slot:tbody>
                        @foreach($turbines as $turbine)
                            <tr>
                                <x-td>{{ $turbine->number }}</x-td>
                                <x-td>{{ $turbine->manufacturer->name }}</x-td>
                                <x-td>{{ $turbine->note }}</x-td>
                                <x-td>
                                    <form action="{{ route("turbines.destroy", $turbine->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-button.circle type="submit" icon="pencil-alt" />
                                    </form>
                                </x-td>
                            </tr>
                        @endforeach
                    </x-slot:tbody>
                    @if($turbines->count() == 0)
                        <x-slot:caption>
                            Список пуст
                        </x-slot:caption>
                    @endif
                </x-table>
            </x-card>
        </div>
    </div>
</x-app-layout>
