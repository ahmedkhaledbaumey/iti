<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل مستخدم جديد</title>
    <!-- هنا يمكنك إضافة روابط الأنماط الخاصة بك -->
</head>
<body>
    <div class="container">
        <h1>تسجيل مستخدم جديد</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">الاسم</label>
                <input type="text" name="name" id="name" required autofocus>
            </div>

            <div>
                <label for="email">البريد الإلكتروني</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="password">كلمة المرور</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <label for="password_confirmation">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <div>
                <button type="submit">تسجيل مستخدم جديد</button>
            </div>
        </form>
    </div>
</body>
</html>
