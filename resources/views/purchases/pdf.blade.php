<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отчёт по закупкам</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        .report-info {
            margin-bottom: 20px;
        }
        .report-info p {
            margin: 0;
            display: flex;
            align-items: center;
        }
        .label {
            display: inline-block;
            width: 200px; /* Ширина метки */
            text-align: left;
        }
        .underline {
            display: inline-block;
            width: 300px; /* Ширина подчеркивания */
            border-bottom: 1px solid #000;
            margin-left: 10px;
            position: relative;
        }
        .underline span {
            position: absolute;
            top: 50%;
            transform: translateY(-50%); /* Центрирование текста по вертикали */
        }
        .number {
            height: 30px;
            margin-bottom: 20px;
        }
        .date {
            height: 30px;
            margin-bottom: 20px;
        }
        .name {
            height: 30px;
            margin-bottom: 20px;
        }
        .employee {
            height: 30px;
            margin-bottom: 20px;
        }
        .signature {
            height: 30px;
            margin-bottom: 20px;
        }
        .center-table {
            width: 100%;
            margin: 20px 0;
            text-align: center;
            border-collapse: collapse;
        }
        .center-table th, .center-table td {
            border: 1px solid #000;
            padding: 10px;
            width: 50%; /* Устанавливаем одинаковую ширину для ячеек */
        }
        .center-table th {
            background-color: #f2f2f2;
        }
        .merged-header {
            text-align: center;
            font-weight: bold;
        }
        .empty-row {
            height: 40px;
        }
    </style>
</head>
<body>
<div class="report-info">
    <p class="number"><span class="label">№ отчета по закупкам:</span><span class="underline"><span>{{ $data['number'] }}</span></span></p>
    <p class="date"><span class="label">Дата формирования:</span><span class="underline"><span>{{ $data['reportDate'] }}</span></span></p>
    <p class="name"><span class="label">Наименование:</span><span class="underline"></span></p>
    <p class="employee"><span class="label">Сотрудник:</span><span class="underline"></span></p>
    <p class="signature"><span class="label">Подпись:</span><span class="underline"></span></p>
</div>

<table class="center-table">
    <tr>
        <th colspan="2" class="merged-header">Поставки</th>
    </tr>
    <tr>
        <td>принятые</td>
        <td>отмененные</td>
    </tr>
    <tr>
        <td>{{ $data['accepted'] }}</td>
        <td>{{ $data['cancelled'] }}</td>
    </tr>
</table>

<div class="empty-row"></div>

<table class="center-table">
    <tr>
        <th colspan="2" class="merged-header">Итого:</th>
    </tr>
    <tr>
        <td>Количество (шт.)</td>
        <td>Стоимость (руб.)</td>
    </tr>
    <tr>
        <td></td>
        <td>{{ $data['total_money'] }}</td>
    </tr>
</table>

<table class="center-table">
    <thead>
    <tr>
        <th>Номер</th>
        <th>Деталь</th>
        <th>Цена (руб.)</th>
        <th>Количество</th>
        <th>Поставщик</th>
        <th>Статус закупки</th>
        <th>Примечание</th>
    </tr>
    </thead>
    <tbody>
    @foreach(\App\Models\PurchaseItem::all() as $purchase)
        <tr>
            <td>{{$purchase->number}}</td>
            <td>{{$purchase->detail_id}}</td>
            <td>{{$purchase->price}}</td>
            <td>{{$purchase->count}}</td>
            <td>{{$purchase->provider_id}}</td>
            <td>{{$purchase->purchase_status_id}}</td>
            <td>{{$purchase->note}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
