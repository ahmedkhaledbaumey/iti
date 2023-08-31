@extends('layouts.app')

@section('content')
    <div class="product-details">
        <img src="{{ asset('images/product1.jpg') }}" alt="{{ $product->name }}">
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <span class="price">${{ $product->price }}</span>
        <a href="{{ route('carts.add', $product->id) }}" class="btn">إضافة إلى عربة التسوق</a>
    </div>
@endsection
