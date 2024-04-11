<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Справочники
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-2">
                    <x-card title="Статусы заказов">

                        <!-- ++++++++++++++++++++++++++++++++++++++ -->
                        <form action="{{ route("order-statuses.store")  }}" method="POST">
                            @csrf
                            <x-input label="Название" name="name" placeholder="Пример: Что-то"/>
                            <x-button class="mt-3" color="primary" type="submit">Добавить</x-button>
                        </form>
                        <!-- ====================================== -->

                        <x-table class="mt-3">
                            <x-slot:thead>
                                <x-th>Название</x-th>
                                <x-th>Действия</x-th>
                            </x-slot:thead>
                            <x-slot:tbody>
                                @foreach($order_statuses as $order_status)
                                    <tr>
                                        <x-td>{{ $order_status->name }}</x-td>
                                        <x-td>
                                            <form action="{{ route("order-statuses.destroy", $order_status->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-button.circle type="submit" negative icon="trash" />
                                            </form>
                                        </x-td>
                                    </tr>
                                @endforeach
                            </x-slot:tbody>
                            @if($order_statuses->count() == 0)
                                <x-slot:caption>
                                    Список пуст
                                </x-slot:caption>
                            @endif
                        </x-table>
                        <div class="mt-3">
                            {{ $order_statuses->links() }}
                        </div>
                    </x-card>
                </div>
                <div class="col-span-2">
                    <x-card title="Статусы закупок">

                        <!-- ++++++++++++++++++++++++++++++++++++++ -->
                        <form action="" method="POST">
                            @csrf
                            <x-button color="primary" type="submit">Добавить</x-button>
                        </form>
                        <!-- ====================================== -->

                    </x-card>
                </div>
                <div class="col-span-2">
                    <x-card title="Поставщики">

                        <!-- ++++++++++++++++++++++++++++++++++++++ -->
                        <form action="" method="POST">
                            @csrf
                            <x-button color="primary" type="submit">Добавить</x-button>
                        </form>
                        <!-- ====================================== -->

                    </x-card>
                </div>
                <div class="col-span-2">
                    <x-card title="Производители">

                        <!-- ++++++++++++++++++++++++++++++++++++++ -->
                        <form action="" method="POST">
                            @csrf
                            <x-button color="primary" type="submit">Добавить</x-button>
                        </form>
                        <!-- ====================================== -->

                        <x-table class="mt-3">
                            <x-slot:thead>
                                <x-th>Название</x-th>
                                <x-th>Действия</x-th>
                            </x-slot:thead>
                            <x-slot:tbody>
                                @foreach($manufacturers as $manufacturer)
                                    <tr>
                                        <x-td>{{ $manufacturer->name }}</x-td>
                                        <x-td>
                                            <form action="{{ route("manufacturers.destroy", $manufacturer->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-button.circle type="submit" negative icon="trash" />
                                            </form>
                                        </x-td>
                                    </tr>
                                @endforeach
                            </x-slot:tbody>
                            @if($order_statuses->count() == 0)
                                <x-slot:caption>
                                    Список пуст
                                </x-slot:caption>
                            @endif
                        </x-table>

                    </x-card>
                </div>
                <div class="col-span-2">
                    <x-card title="Типы деталей">

                        <!-- ++++++++++++++++++++++++++++++++++++++ -->
                        <form action="" method="POST">
                            @csrf
                            <x-button color="primary" type="submit">Добавить</x-button>
                        </form>
                        <!-- ====================================== -->

                    </x-card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
