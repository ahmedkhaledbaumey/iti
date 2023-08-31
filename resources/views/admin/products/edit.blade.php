{{-- @extends('layouts.admin')

@section('content') --}}
    <div class="container">
        <h1>{{ __('تعديل المنتج') }}</h1>
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">{{ __('الاسم') }}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">{{ __('الوصف') }}</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">{{ __('السعر') }}</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>
            <div class="form-group">
                <label for="image">{{ __('الصورة الحالية') }}</label>
                <img src="{{ asset( $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="100">
            </div>
            <div class="form-group">
                <label for="new_image">{{ __('تغيير الصورة') }}</label>
                <input type="file" class="form-control-file" id="new_image" name="new_image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('حفظ التعديلات') }}</button>
        </form>
    </div>
{{-- @endsection --}}
