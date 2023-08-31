@extends('layouts.app')

@section('content')
    <section class="checkout">
        <h2>اتمام الشراء</h2>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">الاسم:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">العنوان:</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <button type="submit" class="btn">تأكيد الشراء</button>
        </form>
    </section>
@endsection
