{{-- @extends('layouts.admin')

@section('content') --}}
    <div class="container">
        <h1>{{ __('إدارة الطلبات') }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">الزبون</th>
                    <th scope="col">المنتجات</th>
                    <th scope="col">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->user->name }}</td>
                        <td>
                            <ul>
                                @foreach ($order->orderItems as $item)
                                    <li>{{ $item->product->name }} (الكمية: {{ $item->quantity }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">{{ __('عرض التفاصيل') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
{{-- @endsection --}}
