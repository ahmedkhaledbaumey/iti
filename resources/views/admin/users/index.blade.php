@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ __('إدارة المستخدمين') }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">البريد الإلكتروني</th>
                    <th scope="col">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info">{{ __('عرض التفاصيل') }}</a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">{{ __('تعديل') }}</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('هل أنت متأكد من حذف المستخدم؟') }}')">{{ __('حذف') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
