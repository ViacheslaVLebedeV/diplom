@php use App\Models\Detail; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Поставка детали:
            <x-nav-link :href="route('details.index')" :active="request()->routeIs('details.index')" wire:navigate>
                {{ __('Возврат') }}
            </x-nav-link>
        </h2>
    </x-slot>

    <x-notifications position="top-right"/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">

            <x-card title="Запрашиваемая деталь">
                <form action="{{ route("turbine-repairs.store") }}" method="POST" class="grid grid-cols-6 gap-6">

                    <div class="col-span-2">
                        <x-select
                            name="detail_id"
                            :options="Detail::all()"
                            option-label="number"
                            option-value="id"
                            label="Номер детали"
                            placeholder="Пример: 1000-000-000"/>
                    </div>

                    <div class="col-span-6">
                        <x-button type="submit" label="Узнать цены" primary/>
                    </div>
                </form>
            </x-card>

            <x-card title="Цены на деталь у поставщиков">
                <x-table class="mt-3">
                    <x-slot:thead>
                        <x-th>Поставщик</x-th>
                        <x-th>Цена</x-th>
                        <x-th>Сроки доставки</x-th>
                        <x-th>Ссылка</x-th>
                    </x-slot:thead>
                    <x-slot:tbody>
                        <tr>
                            <t-td></t-td>
                            <t-td></t-td>
                            <t-td></t-td>
                            <t-td></t-td>
                        </tr>
                        <tr>
                            <x-td>СТ-ПАРТС</x-td>
                            <x-td>15000</x-td>
                            <x-td>19.04.2024</x-td>
                            <x-td>
                                <form method="POST">
                                    <x-button.circle type="submit" none icon="eye" />
                                </form>
                            </x-td>
                        </tr>
                        <tr>
                            <x-td>ТУРБОНАЙЗЕР</x-td>
                            <x-td>20000</x-td>
                            <x-td>17.04.2024</x-td>
                            <x-td>
                                <form method="POST">
                                    <x-button.circle type="submit" none icon="eye"/>
                                </form>
                            </x-td>
                        </tr>
                    </x-slot:tbody>
                </x-table>
            </x-card>
        </div>
    </div>
</x-app-layout>
