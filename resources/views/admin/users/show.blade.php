@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ __('تفاصيل المستخدم') }}</h1>
        <p><strong>{{ __('الاسم') }}:</strong> {{ $user->name }}</p>
        <p><strong>{{ __('البريد الإلكتروني') }}:</strong> {{ $user->email }}</p>
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">{{ __('رجوع') }}</a>
    </div>
@endsection
