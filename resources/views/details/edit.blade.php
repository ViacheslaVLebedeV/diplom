<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <x-card title="Информация о детали">
                <form action="{{ route('details.update', $detail->id) }}" method="POST" class="grid grid-cols-6 gap-6">
                    @csrf
                    @method('PUT')
                    <!-- Поля для редактирования данных детали -->
                    <div class="col-span-2">
                        <x-input label="Серийный номер"
                                 name="number"
                                 placeholder="Пример: 1000-000-000"
                                 value="{{ $detail->number }}"/>
                    </div>
                    <div class="col-span-2">
                        <x-select
                            name="manufacturer_id"
                            :options="\App\Models\Manufacturer::all()"
                            option-label="name"
                            option-value="id"
                            label="Производитель"
                            placeholder="Выбрать производителя"
                            :value="$detail->manufacturer_id"/>
                    </div>
                    <div class="col-span-2">
                        <x-select
                            name="detail_type_id"
                            :options="\App\Models\DetailType::all()"
                            label="Тип детали"
                            option-label="name"
                            option-value="id"
                            placeholder="Выбрать тип"
                            :value="$detail->detail_type_id"/>
                    </div>
                    <div class="col-span-4">
                        <x-textarea name="note" label="Описание" placeholder="Описание" value="{{ $detail->note }}"/>
                    </div>
                    <div class="col-span-6">
                        <x-button wire:click="save" type="submit" label="Обновить" primary spinner="save" loading-delay="short"/>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>
