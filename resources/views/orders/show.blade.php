@extends('layouts.app')

@section('content')
    <section class="order-details">
        <h2>تفاصيل الطلب #{{ $order->id }}</h2>
        <table>
            <thead>
                <tr>
                    <th>المنتج</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                    <th>الإجمالي</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $orderItem)
                    <tr>
                        <td>{{ $orderItem->product->name }}</td>
                        <td>{{ $orderItem->quantity }}</td>
                        <td>${{ $orderItem->price }}</td>
                        <td>${{ $orderItem->quantity * $orderItem->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>الإجمالي: ${{ $order->total }}</p>
    </section>
@endsection
