<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <!-- هنا يمكنك إضافة روابط الأنماط الخاصة بك -->
</head>
<body>
    <div class="container">
        <h1>تسجيل الدخول</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">البريد الإلكتروني</label>
                <input type="email" name="email" id="email" required autofocus>
            </div>

            <div>
                <label for="password">كلمة المرور</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <button type="submit">تسجيل الدخول</button>
            </div>
        </form>
    </div>
</body>
</html>
