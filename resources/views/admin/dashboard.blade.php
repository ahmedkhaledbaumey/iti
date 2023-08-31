@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>لوحة التحكم</h1>
        <p>مرحبًا بك في لوحة التحكم. هنا يمكنك إدارة المنتجات والفئات والطلبات والمستخدمين.</p>
        
        <!-- يمكنك إضافة مزيد من المحتوى والروابط إلى الصفحة حسب احتياجاتك -->
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">المنتجات</div>
                    <div class="card-body">
                        <p><a href="{{ route('admin.products.index') }}">عرض المنتجات</a></p>
                        <p><a href="{{ route('admin.products.create') }}">إضافة منتج جديد</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">الفئات</div>
                    <div class="card-body">
                        <p><a href="{{ route('admin.categories.index') }}">عرض الفئات</a></p>
                        <p><a href="{{ route('admin.categories.create') }}">إضافة فئة جديدة</a></p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- يمكنك إضافة المزيد من الأقسام والروابط حسب احتياجاتك -->
    </div>
@endsection
