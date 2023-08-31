{{-- @extends('layouts.admin') --}}

{{-- @section('content') --}}
    <div class="container">
        <h1>{{ __('إضافة منتج جديد') }}</h1>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('الاسم') }}</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">{{ __('الوصف') }}</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">{{ __('السعر') }}</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="image">{{ __('الصورة') }}</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('إضافة') }}</button>
        </form>
    </div>
{{-- @endsection --}}
