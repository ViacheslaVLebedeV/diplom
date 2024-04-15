<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Заказы: Ремонт турбокомпрессора
        </h2>
    </x-slot>

    <x-notifications position="top-right" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">

            <x-card title="Добавить заказ на ремонт турбокомпрессора">
                <form action="{{ route("turbine-part-repairs.store") }}" method="POST" class="grid grid-cols-6 gap-6">
                    @csrf
                    <div class="col-span-2">
                        <x-input label="Стоимость общая (в рублях)"
                                 name="price"
                                 placeholder="Пример: 10000 руб."/>
                    </div>
                    @csrf
                    <div class="col-span-2">
                        <x-datetime-picker
                            label="Дедлайн"
                            placeholder="Пример: 16.04.2024 10:00"
                            parse-format="DD-MM-YYYY HH:mm"
                            wire:model.defer="customFormat"
                        />
                    </div>

                    <div class="col-span-2">
                        <x-select
                            name="turbine_id"
                            :options="\App\Models\Turbine::all()"
                            option-label="name"
                            option-value="id"
                            label="Турбокомпрессор"
                            placeholder="Выбрать турбокомпрессор"/>
                    </div>

                    @csrf
                    <div class="col-span-2">
                        <x-input label="Отчество (при наличии)"
                                 name="middlename"
                                 placeholder="Пример: Иванович"/>
                    </div>

                    @csrf
                    <div class="col-span-2">
                        <x-inputs.maskable
                            label="Номер телефона"
                            mask="['+7-(###)-###-##-##']"
                            placeholder="Пример: +7-(999)-999-99-99"
                        />
                    </div>

                    @csrf
                    <div class="col-span-2">
                        <x-input label="Электронная почта"
                                 name="email"
                                 placeholder="Пример: ivanovii@mail.ru"/>
                    </div>

                    <div class="col-span-4">
                        <x-textarea name="description" label="Дополнительная информация" placeholder="Примечание"/>
                    </div>
                    <div class="col-span-6">
                        <x-button type="submit" label="Добавить клиента" primary/>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>
