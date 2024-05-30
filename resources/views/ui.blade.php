<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Интерфейс
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-6 gap-6">
                <!-- Деталь -->
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

                <!-- Ремка -->
                <div class="col-span-2">
                    <x-card title="Ремкомплект">
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
                            <x-textarea label="Дополнительно" placeholder="Примечание для ремкомплекта" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>

                <!-- Картридж -->
                <div class="col-span-2">
                    <x-card title="Картридж">
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
                            <x-textarea label="Дополнительно" placeholder="Примечание для картриджа" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>

                <!-- Клиент -->
                <div class="col-span-2">
                    <x-card title="Клиент">
                        <div class="space-y-4">
                            <x-input label="Фамилия"
                                     placeholder="Иванов"/>
                            <x-input label="Имя"
                                     placeholder="Иван"/>
                            <x-input label="Отчество (если есть)"
                                     placeholder="Иванович"/>
                            <x-inputs.phone label="Номер телфона" mask="['+7 (###) ###-##-##', '+7 (###) ###-##-##']" />
                            <x-input label="Эл. почта"
                                     placeholder="example@mail.ru"/>
                            <x-textarea label="Дополнительно" placeholder="Примечание для клиента" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>

                <!-- Заказ ремонта турбина -->
                <div class="col-span-2">
                    <x-card title="Заказ ремонта турбокомпрессора">
                        <div class="space-y-4">
                            <x-select
                                :options="['Лебедев Вячеслав', 'Иванов Иван', 'Вася из сервиса']"
                                label="Клиент"
                                placeholder="Выбрать клиента"/>
                            <x-select
                                :options="['Новый', 'В работе', 'Готов', 'Выдан']"
                                label="Статус заказа"
                                placeholder="Выбрать статус"/>

                            <x-select
                                :options="['Garrett GT1752', 'KKK K03', 'Holset HE200VG', 'Toyota CT12']"
                                label="Турбокомпрессор"
                                placeholder="Выбрать турбокомпрессор"/>
                            <x-input label="Стоимость (руб.)"
                                     placeholder="15000 руб."/>
                            <x-datetime-picker
                                label="Срок исполнения"
                                placeholder="Выбрать дату"
                            />
                            <x-textarea label="Описание" placeholder="Примечание для заказа" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>

                <!-- Заказ ремонт запчасти -->
                <div class="col-span-2">
                    <x-card title="Заказ ремонта запчасти">
                        <div class="space-y-4">
                            <x-select
                                :options="['Лебедев Вячеслав', 'Иванов Иван', 'Вася из сервиса']"
                                label="Клиент"
                                placeholder="Выбрать клиента"/>
                            <x-select
                                :options="['Новый', 'В работе', 'Готов', 'Выдан']"
                                label="Статус заказа"
                                placeholder="Выбрать статус"/>

                            <x-select
                                :options="['Кардан', 'Прочее']"
                                label="Запчасть"
                                placeholder="Выбрать запчасть"/>
                            <x-input label="Стоимость (руб.)"
                                     placeholder="15000 (руб.)"/>
                            <x-datetime-picker
                                label="Срок исполнения"
                                placeholder="Выбрать дату"
                            />
                            <x-textarea label="Описание" placeholder="Примечание для заказа" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>

                <!-- Турбина -->
                <div class="col-span-2">
                    <x-card title="Турбокомпрессор">
                        <div class="space-y-4">
                            <x-input label="Серийный номер"
                                     placeholder="Пример: 1000-000-000"/>

                            <x-select
                                :options="['Garrett', 'KKK', 'Holset']"
                                label="Производитель"
                                placeholder="Выбрать производителя"/>

                            <x-textarea label="Дополнительно" placeholder="Примечание для турбокомпрессора" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>

                <!-- Авто -->
                <div class="col-span-2">
                    <x-card title="Автомобиль">
                        <div class="space-y-4">
                            <x-select
                                :options="['Audi', 'BMW', 'Mercedes']"
                                label="Марка"
                                placeholder="Выбрать марку"/>
                            <x-select
                                :options="['A4', 'X6', 'E350D']"
                                label="Модель"
                                placeholder="Выбрать модель"/>
                            <x-textarea label="Дополнительно" placeholder="Примечание для авто" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>


                <!-- Связи -->
                <div class="col-span-2">
                    <x-card title="Добавить связь">
                        <div class="space-y-4">
                            <p class="text-md font-bold">Турбокомпрессор</p>
                            <x-select
                                :options="['5303-970-0146', '1000-010-501', '5000-040-223', '1200-050-214', 'GT15-033']"
                                min-items-for-search=3
                                label="Номер"
                                placeholder="Выбрать турбокомпрессор"
                                empty-message="Не найдено"/>
                            <p class="text-md mt-6 font-bold">Деталь</p>
                            <x-select
                                :options="['Вал', 'Картридж', 'Ремкомплект']"
                                label="Тип"
                                placeholder="Выбрать тип"/>
                            <x-select
                                :options="['5303-970-0146', '1000-010-501', '5000-040-223', '1200-050-214', 'GT15-033']"
                                min-items-for-search=3
                                label="Номер"
                                placeholder="Выбрать деталь"
                                empty-message="Не найдено"/>
                            <x-textarea class="mt-4" label="Дополнительно" placeholder="Примечание для связи" />
                            <x-button type="submit" label="Связать" primary/>
                        </div>
                    </x-card>
                </div>


                <!-- Отчеты по закупкам -->
                <div class="col-span-6">
                    <x-card title="Отчёт по закупкам">
                        <div class="space-y-4">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-2">
                                    <x-datetime-picker
                                        label="Период с"
                                        placeholder="Выбрать дату"/>
                                </div>
                                <div class="col-span-2">
                                    <x-datetime-picker
                                        label="Период по"
                                        placeholder="Выбрать дату"/>
                                </div>
                                <div class="col-span-4 grid grid-cols-6 gap-6">
                                    <div class="col-span-3">
                                        <x-select
                                            :options="['Jrone', 'E&E Turbo', 'Krauf']"
                                            label="Поставщик"
                                            placeholder="Выбрать поставщика"/>
                                    </div>
                                    <div class="col-span-3">
                                        <x-select
                                            :options="['Заказан', 'Поступил', 'Отменен']"
                                            label="Статус закупки"
                                            placeholder="Выбрать статус"/>
                                    </div>
                                </div>
                                <div class="col-span-6">
                                    <x-button type="submit" label="Сформировать отчет" primary/>
                                </div>
                            </div>
                            <div>
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
                            </div>
                        </div>
                    </x-card>
                </div>


                <!-- Отчеты по клиентам турбины -->
                <div class="col-span-6">
                    <x-card title="Отчёт по ремонту турбокомпрессоров">
                        <div class="space-y-4">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-2">
                                    <x-datetime-picker
                                        label="Период с"
                                        placeholder="Выбрать дату"/>
                                </div>
                                <div class="col-span-2">
                                    <x-datetime-picker
                                        label="Период по"
                                        placeholder="Выбрать дату"/>
                                </div>
                                <div class="col-span-4 grid grid-cols-6 gap-6">
                                    <div class="col-span-3">
                                        <x-select
                                            :options="['Принят', 'Готов', 'Выдан']"
                                            label="Статус заказа"
                                            placeholder="Выбрать статус"/>
                                    </div>
                                    <div class="col-span-3">
                                        <x-select
                                            :options="['Лебедев Вячеслав', 'Иванов Иван', 'Вася из сервиса']"
                                            label="Клиент"
                                            placeholder="Выбрать клиента"/>
                                    </div>
                                </div>
                                <div class="col-span-6">
                                    <x-button type="submit" label="Сформировать отчет" primary/>
                                </div>
                            </div>
                            <div>
                                <x-table>
                                    <x-slot:thead>
                                        <x-th>Дата создания</x-th>
                                        <x-th>Турбокомпрессор</x-th>
                                        <x-th>Статус заказа</x-th>
                                        <x-th>Дата посл. обновления</x-th>
                                        <x-th>Клиент</x-th>
                                        <x-th>Стоимость (руб.)</x-th>
                                        <x-th>Срок исполнения</x-th>
                                        <x-th>Описание</x-th>
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
                            </div>
                        </div>
                    </x-card>
                </div>

                <!-- Отчеты по клиентам запчасти -->
                <div class="col-span-6">
                    <x-card title="Отчёт по ремонту запчасти">
                        <div class="space-y-4">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-2">
                                    <x-datetime-picker
                                        label="Период с"
                                        placeholder="Выбрать дату"/>
                                </div>
                                <div class="col-span-2">
                                    <x-datetime-picker
                                        label="Период по"
                                        placeholder="Выбрать дату"/>
                                </div>
                                <div class="col-span-4 grid grid-cols-6 gap-6">
                                    <div class="col-span-3">
                                        <x-select
                                            :options="['Принят', 'Готов', 'Выдан']"
                                            label="Статус заказа"
                                            placeholder="Выбрать статус"/>
                                    </div>
                                    <div class="col-span-3">
                                        <x-select
                                            :options="['Лебедев Вячеслав', 'Иванов Иван', 'Вася из сервиса']"
                                            label="Клиент"
                                            placeholder="Выбрать клиента"/>
                                    </div>
                                </div>
                                <div class="col-span-6">
                                    <x-button type="submit" label="Сформировать отчет" primary/>
                                </div>
                            </div>
                            <div>
                                <x-table>
                                    <x-slot:thead>
                                        <x-th>Дата создания</x-th>
                                        <x-th>Деталь</x-th>
                                        <x-th>Статус заказа</x-th>
                                        <x-th>Дата посл. обновления</x-th>
                                        <x-th>Клиент</x-th>
                                        <x-th>Стоимость (руб.)</x-th>
                                        <x-th>Срок исполнения</x-th>
                                        <x-th>Описание</x-th>
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
                            </div>
                        </div>
                    </x-card>
                </div>






                <!-- ========================================================= -->

                <!-- Деталь -->
                <div class="col-span-2">
                    <x-card title="Деталь">
                        <div class="space-y-4">
                            <x-input label="Серийный номер"/>
                            <x-select
                                :options="['Jrone', 'E&E Turbo', 'Krauf']"
                                label="Производитель"/>
                            <x-select
                                :options="['Вал', 'Колесо', 'Корпус']"
                                label="Тип детали"/>
                            <x-input label="Количество (шт.)"/>
                            <x-input label="Стоимость (руб.)"/>
                            <x-textarea label="Описание" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>

                <!-- Клиент -->
                <div class="col-span-2">
                    <x-card title="Клиент">
                        <div class="space-y-4">
                            <x-input label="Фамилия"/>
                            <x-input label="Имя"/>
                            <x-input label="Отчество"/>
                            <x-input label="Номер телфона" />
                            <x-input label="Эл. почта"/>
                            <x-textarea label="Дополнительно" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>

                <!-- Заказ ремонта турбина -->
                <div class="col-span-2">
                    <x-card title="Заказ ремонта турбокомпрессора">
                        <div class="space-y-4">
                            <x-select
                                :options="['Лебедев Вячеслав', 'Иванов Иван', 'Вася из сервиса']"
                                label="Клиент"/>
                            <x-select
                                :options="['Новый', 'В работе', 'Готов', 'Выдан']"
                                label="Статус заказа"/>

                            <x-select
                                :options="['Garrett GT1752', 'KKK K03', 'Holset HE200VG', 'Toyota CT12']"
                                label="Турбокомпрессор"/>
                            <x-input label="Стоимость (руб.)"/>
                            <x-datetime-picker
                                label="Срок исполнения"
                            />
                            <x-textarea label="Описание" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>

                <!-- Заказ ремонт запчасти -->
                <div class="col-span-2">
                    <x-card title="Заказ ремонта запчасти">
                        <div class="space-y-4">
                            <x-select
                                :options="['Лебедев Вячеслав', 'Иванов Иван', 'Вася из сервиса']"
                                label="Клиент"/>
                            <x-select
                                :options="['Новый', 'В работе', 'Готов', 'Выдан']"
                                label="Статус заказа"/>

                            <x-select
                                :options="['Кардан', 'Прочее']"
                                label="Запчасть"/>
                            <x-input label="Стоимость (руб.)"/>
                            <x-datetime-picker
                                label="Срок исполнения"
                            />
                            <x-textarea label="Описание" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>

                <!-- Турбина -->
                <div class="col-span-2">
                    <x-card title="Турбокомпрессор">
                        <div class="space-y-4">
                            <x-input label="Серийный номер"/>

                            <x-select
                                :options="['Garrett', 'KKK', 'Holset']"
                                label="Производитель"/>

                            <x-textarea label="Дополнительно" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>

                <!-- Авто -->
                <div class="col-span-2">
                    <x-card title="Автомобиль">
                        <div class="space-y-4">
                            <x-select
                                :options="['Audi', 'BMW', 'Mercedes']"
                                label="Марка"/>
                            <x-select
                                :options="['A4', 'X6', 'E350D']"
                                label="Модель"/>
                            <x-textarea label="Дополнительно" />
                            <x-button type="submit" label="Добавить" primary/>
                        </div>
                    </x-card>
                </div>

                <!-- Связи -->
                <div class="col-span-2">
                    <x-card title="Добавить связь">
                        <div class="space-y-4">
                            <p class="text-md font-bold">Турбокомпрессор</p>
                            <x-select
                                :options="['5303-970-0146', '1000-010-501', '5000-040-223', '1200-050-214', 'GT15-033']"
                                min-items-for-search=3
                                label="Номер"
                                empty-message="Не найдено"/>
                            <p class="text-md mt-6 font-bold">Деталь</p>
                            <x-select
                                :options="['Вал', 'Картридж', 'Ремкомплект']"
                                label="Тип"/>
                            <x-select
                                :options="['5303-970-0146', '1000-010-501', '5000-040-223', '1200-050-214', 'GT15-033']"
                                min-items-for-search=3
                                label="Номер"
                                empty-message="Не найдено"/>
                            <x-textarea class="mt-4" label="Дополнительно" />
                            <x-button type="submit" label="Связать" primary/>
                        </div>
                    </x-card>
                </div>

                <!-- Отчеты по закупкам -->
                <div class="col-span-6">
                    <x-card title="Отчёт по закупкам">
                        <div class="space-y-4">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-2">
                                    <x-datetime-picker
                                        label="Период с"/>
                                </div>
                                <div class="col-span-2">
                                    <x-datetime-picker
                                        label="Период по"/>
                                </div>
                                <div class="col-span-4 grid grid-cols-6 gap-6">
                                    <div class="col-span-3">
                                        <x-select
                                            :options="['Jrone', 'E&E Turbo', 'Krauf']"
                                            label="Поставщик"/>
                                    </div>
                                    <div class="col-span-3">
                                        <x-select
                                            :options="['Заказан', 'Поступил', 'Отменен']"
                                            label="Статус закупки"/>
                                    </div>
                                </div>
                                <div class="col-span-6">
                                    <x-button type="submit" label="Сформировать отчет" primary/>
                                </div>
                            </div>
                            <div>
                                <x-table>
                                    <x-slot:thead>
                                        <x-th>Дата закупки</x-th>
                                        <x-th>Тип детали</x-th>
                                        <x-th>Номер детали</x-th>
                                        <x-th>Количество (шт.)</x-th>
                                        <x-th>Стоимость (руб.)</x-th>
                                        <x-th>Статус закупки</x-th>
                                        <x-th>Производитель детали</x-th>
                                        <x-th>Поставщик</x-th>
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
                            </div>
                        </div>
                    </x-card>
                </div>

                <!-- Отчеты по клиентам турбины -->
                <div class="col-span-6">
                    <x-card title="Отчёт по ремонту турбокомпрессоров">
                        <div class="space-y-4">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-2">
                                    <x-datetime-picker
                                        label="Период с"/>
                                </div>
                                <div class="col-span-2">
                                    <x-datetime-picker
                                        label="Период по"/>
                                </div>
                                <div class="col-span-4 grid grid-cols-6 gap-6">
                                    <div class="col-span-3">
                                        <x-select
                                            :options="['Принят', 'Готов', 'Выдан']"
                                            label="Статус заказа"/>
                                    </div>
                                    <div class="col-span-3">
                                        <x-select
                                            :options="['Лебедев Вячеслав', 'Иванов Иван', 'Вася из сервиса']"
                                            label="Клиент"/>
                                    </div>
                                </div>
                                <div class="col-span-6">
                                    <x-button type="submit" label="Сформировать отчет" primary/>
                                </div>
                            </div>
                            <div>
                                <x-table>
                                    <x-slot:thead>
                                        <x-th>Дата создания</x-th>
                                        <x-th>Турбокомпрессор</x-th>
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
                                        </tr>
                                        <tr>
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
                            </div>
                        </div>
                    </x-card>
                </div>

                <!-- Отчеты по клиентам запчасти -->
                <div class="col-span-6">
                    <x-card title="Отчёт по ремонту запасных частей">
                        <div class="space-y-4">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-2">
                                    <x-datetime-picker
                                        label="Период с"/>
                                </div>
                                <div class="col-span-2">
                                    <x-datetime-picker
                                        label="Период по"/>
                                </div>
                                <div class="col-span-4 grid grid-cols-6 gap-6">
                                    <div class="col-span-3">
                                        <x-select
                                            :options="['Принят', 'Готов', 'Выдан']"
                                            label="Статус заказа"/>
                                    </div>
                                    <div class="col-span-3">
                                        <x-select
                                            :options="['Лебедев Вячеслав', 'Иванов Иван', 'Вася из сервиса']"
                                            label="Клиент"/>
                                    </div>
                                </div>
                                <div class="col-span-6">
                                    <x-button type="submit" label="Сформировать отчет" primary/>
                                </div>
                            </div>
                            <div>
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
                                        </tr>
                                        <tr>
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
                            </div>
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
