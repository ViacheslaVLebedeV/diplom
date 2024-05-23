@php use App\Models\Detail; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Связь с турбокомпрессором:
            <x-nav-link :href="route('details.index')" :active="request()->routeIs('details.index')" wire:navigate>
                Возврат
            </x-nav-link>
        </h2>
    </x-slot>

    <x-notifications position="top-right"/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">

            <x-card title="Добавить связь с турбокомпрессором">
                <form action="{{ route("detail-turbines.store") }}" method="POST" class="grid grid-cols-6 gap-6">
                    @csrf
                    <div class="col-span-2">
                        <x-select
                            name="turbine_id"
                            :options="$turbines"
                            option-label="number"
                            option-value="id"
                            option-description="note"
                            label="Турбокомпрессор"
                            placeholder="Выбрать турбокомпрессор"/>
                    </div>

                    <div class="col-span-2">
                        <x-select
                            name="detail_id"
                            :options="Detail::all()"
                            option-label="number"
                            option-description="note"
                            option-value="id"
                            label="Запасная часть"
                            placeholder="Выбрать запчасть"/>
                    </div>
                    <div class="col-span-6">
                        <x-button type="submit" label="Добавить связь" primary/>
                    </div>
                </form>
            </x-card>

            <x-card title="Просмотр занесённых связей">

                <form action="{{ route("detail-turbines.index") }}" method="GET" class="grid grid-cols-6 gap-6">
                    <div class="col-span-2">
                        <x-select
                            name="turbine_id"
                            :options="$turbines"
                            option-label="number"
                            option-value="id"
                            label="Турбокомпрессор"
                            placeholder="Выбрать турбокомпрессор"/>
                    </div>

                    <div class="col-span-6">
                        <x-button type="submit" label="Подобрать" primary/>
                    </div>
                </form>

                <x-table class="mt-3">
                    <x-slot:thead>
                        <x-th>Турбокомпрессор</x-th>
                        <x-th>Деталь</x-th>
                    </x-slot:thead>
                    <x-slot:tbody>
                       @foreach($turbines as $turbine)
                            <tr>
                                <x-td>{{ $turbine->number }}</x-td>
                                <x-td class="text-center">
                                    <ul class="space-y-2">
                                        @foreach($turbine->details as $detail)
                                            <li class="flex items-center justify-around" >
                                                {{ $detail->number }}
                                                <form  method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <x-button.circle color="negative" type="submit" icon="trash" />
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                </x-td>
                            </tr>
                       @endforeach
                    </x-slot:tbody>
                </x-table>
            </x-card>
        </div>
    </div>
</x-app-layout>
