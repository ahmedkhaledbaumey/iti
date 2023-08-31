@extends('layouts.app')

@section('content')
    <section class="hero">
        <h2>استمتع بتجربة التسوق عبر الإنترنت</h2>
        <p>استعرض مجموعتنا الرائعة من المنتجات واشتري بكل سهولة.</p>
        <a href="{{ route('products.index') }}" class="btn">شراء الآن</a>
    </section>

    <section class="featured-products">
        <h2>منتجات مميزة</h2>
        <div class="product">
            <img src="{{ asset('images/product1.jpg') }}" alt="منتج رائع">
            <h3>منتج رائع</h3>
            <p>وصف قصير للمنتج ومميزاته.</p>
            <span class="price">$50.00</span>
            <a href="{{ route('products.show', 1) }}" class="btn">تفاصيل المنتج</a>
        </div>
        <!-- يمكنك إضافة منتجات أخرى هنا -->
    </section>
@endsection
