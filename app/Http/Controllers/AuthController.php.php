<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // عرض نموذج تسجيل الدخول
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // معالجة طلب تسجيل الدخول
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // تم تسجيل الدخول بنجاح
            return redirect()->intended('/');
        }

        // في حالة فشل عملية تسجيل الدخول
        return redirect()->back()->withErrors(['email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة']);
    }

    // تسجيل الخروج
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
