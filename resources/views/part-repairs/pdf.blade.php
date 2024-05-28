<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отчёт по ремонту запасных частей</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 15px;
        }
        .report-info {
            margin-bottom: 20px;
        }
        .report-info p {
            margin: 0;
        }
        .label {
            display: inline-block;
            width: 200px; /* Ширина метки */
            text-align: left;
            vertical-align: middle;
        }
        .underline {
            display: inline-block;
            width: 300px; /* Ширина подчеркивания */
            border-bottom: 1px solid #000;
            margin-left: 10px;
            position: relative;
            vertical-align: middle;
            line-height: 2em;
        }
        .underline span {
            position: relative;
            top: 0.2em;
        }
        .number {
            height: 40px;
            margin-bottom: 10px;
        }
        .date {
            height: 60px;
            margin-bottom: 10px;
        }
        .name {
            height: 30px;
            margin-bottom: 10px;
        }
        .employee {
            height: 30px;
            margin-bottom: 10px;
        }
        .signature {
            height: 30px;
            margin-bottom: 10px;
        }
        .tables-container {
            display: flex;
            justify-content: space-between;
        }
        .center-table {
            background-color: #f2f2f2;
            width: 48%; /* Ширина каждой таблицы, чтобы они были одинакового размера */
        }
        .center-table th, .center-table td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
        .center-table th {
            background-color: #f2f2f2;
        }
        .merged-header {
            text-align: center;
            font-weight: bold;
        }
        .empty-row {
            height: 20px;
        }
    </style>
</head>
<body>
<div class="grid grid-cols-6 gap-6">
    <div class="col-span-2">
        <div class="report-info">
            <p class="number"><span class="label">№ отчета по ремонту запасных частей:</span><span class="underline"><span>{{ $data['number'] }}</span></span></p>
            <p class="date"><span class="label">Дата формирования:</span><span class="underline"><span>{{ $data['reportDate'] }}</span></span></p>
            <p class="name"><span class="label">Наименование:</span><span class="underline"></span></p>
            <p class="employee"><span class="label">Сотрудник:</span><span class="underline"></span></p>
            <p class="signature"><span class="label">Подпись:</span><span class="underline"></span></p>
        </div>
    </div>
    <div class="col-span-2">
        <div class="tables-container">
            <table class="center-table">
                <tr>
                    <td>Итого стоимость (руб.)</td>
                    <td>{{$data['total_money']}}</td>
                </tr>
            </table>

            <div class="empty-row"></div>

            <table class="center-table">
                <tr>
                    <td>Выполненные заказы (%)</td>
                    <td>{{$data['done']}}</td>
                </tr>
            </table>

            <div class="empty-row"></div>

            <table class="center-table">
                <tr>
                    <th colspan="4" class="merged-header col-span-4">Статистика по заказам</th>
                </tr>
                <tr>
                    <td>Выполненные в срок (%)</td>
                    <td>Выполненные позже срока (%)</td>
                    <td>Неуспешные (%)</td>
                    <td>Отменённые клиентом (%)</td>
                </tr>
                <tr>
                    <td>{{ $data['done_before'] }}</td>
                    <td>{{ $data['done_after'] }}</td>
                    <td>{{ $data['bad'] }}</td>
                    <td>{{ $data['cancelled'] }}</td>
                </tr>
            </table>


        </div>
    </div>

    <div class="empty-row"></div>

    <table class="center-table">
        <thead>
        <tr>
            <th>Дата создания</th>
            <th>Запасная часть</th>
            <th>Статус заказа</th>
            <th>Клиент</th>
            <th>Стоимость (руб.)</th>
            <th>Срок исполнения</th>
            <th>Описание</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['repairs'] as $repair)
            <tr>
                <td>{{ $repair->created_at->format('d.m.Y') }}</td>
                <td>{{ $repair->detail->number }}</td>
                <td>{{ $repair->orderStatus->name }}</td>
                <td>{{ $repair->client->lastname }}</td>
                <td>{{ $repair->price }}</td>
                <td>{{ $repair->deadline }}</td>
                <td>{{ $repair->note }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
