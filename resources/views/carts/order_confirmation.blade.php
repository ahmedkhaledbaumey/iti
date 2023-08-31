<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد الطلب</title>
    <!-- هنا يمكنك إضافة روابط الأنماط الخاصة بك -->
</head>
<body>
    <div class="container">
        <h1>تأكيد الطلب</h1>

        <!-- عرض تفاصيل الطلب -->
        <div>
            <h2>تفاصيل الطلب:</h2>
            <ul>
                @foreach ($order->orderItems as $item)
                    <li>
                        {{ $item->product->name }} (الكمية: {{ $item->quantity }})
                        السعر الإجمالي: {{ $item->quantity * $item->price }}
                    </li>
                @endforeach
            </ul>
            <p>المجموع الكلي: {{ $order->total }}</p>
        </div>

        <!-- بيانات الشحن -->
        <div>
            <h2>بيانات الشحن:</h2>
            <p>عنوان الشحن: {{ $order->shipping_address }}</p>
            <p>طريقة الدفع: {{ $order->payment_method }}</p>
        </div>

        <p>شكرًا لك على طلبك. سيتم معالجة طلبك وشحنه في أقرب وقت ممكن.</p>
    </div>
</body>
</html>
