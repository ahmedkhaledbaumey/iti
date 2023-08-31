@extends('layouts.app')

@section('content')
    <section class="featured-products">
        <h2>منتجات مميزة</h2>
        @foreach($products as $product)
            <div class="product">
                <img src="{{ asset('images/product1.jpg') }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <span class="price">${{ $product->price }}</span>
                <a href="{{ route('carts.add', $product->id) }}" class="btn">إضافة إلى عربة التسوق</a>
            </div>
        @endforeach
    </section>
@endsection
