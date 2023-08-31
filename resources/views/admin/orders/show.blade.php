{{-- @extends('layouts.admin')

@section('content') --}}
    <div class="container">
        <h1>{{ __('تفاصيل الطلب') }}</h1>
        <p><strong>{{ __('الزبون') }}:</strong> {{ $order->user->name }}</p>
        <p><strong>{{ __('المنتجات') }}:</strong></p>
        <ul>
            @foreach ($order->orderItems as $item)
                <li>{{ $item->product->name }} (الكمية: {{ $item->quantity }})</li>
            @endforeach
        </ul>
        <p><strong>{{ __('إجمالي السعر') }}:</strong> {{ $order->total_price }} ريال</p>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">{{ __('رجوع') }}</a>
    </div>
{{-- @endsection --}}
