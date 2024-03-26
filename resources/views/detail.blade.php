<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ТИТЛ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Код здесь -->


            <div class="grid grid-cols-6 gap-2">




                <div class="col-span-2">
                    <x-card title="Деталь">
                        <div class="space-y-4">
                            <x-input label="Серийный номер"
                                     placeholder="Пример: 1000-000-000"/>

                            <x-select
                                :options="['Garrett', 'KKK', 'Holset']"
                                label="Применимость"
                                placeholder="Выбрать применимость"/>
                            <x-select
                                :options="['Jrone', 'E&E Turbo', 'Krauf']"
                                label="Производитель"
                                placeholder="Выбрать производителя"/>
                            <x-select
                                :options="['Вал', 'Колесо', 'Корпус']"
                                label="Тип детали"
                                placeholder="Выбрать тип"/>
                            <x-input label="Количество (шт.)"
                                     placeholder="1 шт."/>
                            <x-input label="Стоимость (руб.)"
                                     placeholder="10000 руб."/>
                            <x-textarea label="Описание" placeholder="Описание" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>


            </div>



        </div>
    </div>
</x-app-layout>
