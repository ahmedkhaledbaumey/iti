<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تاريخ الطلبات</title>
    <!-- هنا يمكنك إضافة روابط الأنماط الخاصة بك -->
</head>
<body>
    <div class="container">
        <h1>تاريخ الطلبات</h1>

        <table>
            <thead>
                <tr>
                    <th>رقم الطلب</th>
                    <th>المجموع الكلي</th>
                    <th>تاريخ الطلب</th>
                    <th>الحالة</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}">عرض التفاصيل</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
