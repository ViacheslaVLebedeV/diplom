<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Клиенты
        </h2>
    </x-slot>

    <x-notifications position="top-right" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">

            <x-card title="Добавить клиента">
                <form action="{{ route("clients.store") }}" method="POST" class="grid grid-cols-6 gap-6">
                    @csrf
                    <div class="col-span-2">
                        <x-input label="Фамилия"
                                 name="lastname"
                                 placeholder="Пример: Иванов"/>
                    </div>
                    @csrf
                    <div class="col-span-2">
                        <x-input label="Имя"
                                 name="firstname"
                                 placeholder="Пример: Иван"/>
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
                            name="phone"
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
                        <x-textarea name="note" label="Дополнительная информация" placeholder="Примечание"/>
                    </div>
                    <div class="col-span-6">
                        <x-button type="submit" label="Добавить клиента" primary/>
                    </div>
                </form>
            </x-card>


            <x-card title="Все клиенты">

                <form action="{{ route("clients.index") }}" method="GET" class="grid grid-cols-6 gap-6">
                    @csrf
                    <div class="col-span-2">
                        <x-input label="Фамилия"
                                 name="lastname"
                                 placeholder="Пример: Иванов"/>
                    </div>
                    @csrf
                    <div class="col-span-2">
                        <x-input label="Имя"
                                 name="firstname"
                                 placeholder="Пример: Иван"/>
                    </div>
                    @csrf
                    <div class="col-span-2">
                        <x-input label="Отчество"
                                 name="middlename"
                                 placeholder="Пример: Иванович"/>
                    </div>

                    <div class="col-span-6">
                        <x-button type="submit" label="Найти клиента" primary/>
                    </div>
                </form>

                <x-table class="mt-3">
                    <x-slot:thead>
                        <x-th>Фамилия</x-th>
                        <x-th>Имя</x-th>
                        <x-th>Отчество</x-th>
                        <x-th>Телефон</x-th>
                        <x-th>Почта</x-th>
                        <x-th>Описание</x-th>
                        <x-th>Действия</x-th>
                    </x-slot:thead>
                    <x-slot:tbody>
                        @foreach($clients as $client)
                            <tr>
                                <x-td>{{ $client->lastname }}</x-td>
                                <x-td>{{ $client->firstname }}</x-td>
                                <x-td>{{ $client->middlename }}</x-td>
                                <x-td>{{ $client->phone }}</x-td>
                                <x-td>{{ $client->email }}</x-td>
                                <x-td>{{ $client->note }}</x-td>
                                <x-td>
                                    <form action="{{ route("clients.destroy", $client->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-button.circle type="submit" icon="pencil-alt" />
                                    </form>
                                </x-td>
                            </tr>
                        @endforeach
                    </x-slot:tbody>
                    @if($clients->count() == 0)
                        <x-slot:caption>
                            Список пуст
                        </x-slot:caption>
                    @endif
                </x-table>
            </x-card>
        </div>
    </div>
</x-app-layout>
