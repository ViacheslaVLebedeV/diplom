<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Турбокомпрессоры
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Код здесь -->
            <div class="grid grid-cols-6 gap-2">
                <div class="col-span-3">
                    <x-card title="Турбокомпрессор">
                        <div class="space-y-4">
                            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-7 sm:gap-5">
                                <div class="col-span-1 sm:col-span-4">
                                    <x-input label="Серийный номер" placeholder="Пример: 1000-000-000"/>
                                </div>

                                <div class="col-span-1 sm:col-span-3">
                                    <x-select
                                        :options="['Jrone', 'E&E Turbo', 'Krauf']"
                                        label="Производитель"
                                        placeholder="Выбрать производителя"/>
                                </div>
                            </div>

                            <x-textarea label="Описание" placeholder="Описание" />

                            <x-slot name="footer">
                                <div class="flex items-center gap-x-3 justify-end">
                                    <x-button wire:click="cancel" label="Отмена" flat negative/>
                                    <x-button wire:click="save" label="Добавить" spinner="save" primary />
                                </div>
                            </x-slot>
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </div>

    @foreach ($data as $turb)
        <x-button wire:click="cancel" label="{{$turb->number}}" flat negative/>
    @endforeach
</x-app-layout>
