{{-- @extends('layouts.admin')

@section('content') --}}
    <div class="container">
        <h1>{{ __('إدارة المنتجات') }}</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-2">{{ __('إضافة منتج جديد') }}</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">الوصف</th>
                    <th scope="col">السعر</th>
                    <th scope="col">الصورة</th>
                    <th scope="col">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }} ريال</td>
                        <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="100"></td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">{{ __('تعديل') }}</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('هل أنت متأكد من حذف المنتج؟') }}')">{{ __('حذف') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
{{-- @endsection --}}
