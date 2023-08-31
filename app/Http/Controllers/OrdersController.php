<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    // عرض قائمة الطلبات
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    // عرض تفاصيل طلب معين
    public function show($id)
    {
        $order = Order::find($id);
        return view('orders.show', compact('order'));
    }

    // تغيير حالة الطلب (مثلاً: معالجة أو تم التسليم)
    public function updateStatus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|string|in:معالجة,تم التسليم',
            // يمكنك إضافة المزيد من قواعد التحقق حسب الحاجة
        ]);

        $order = Order::find($id);
        $order->status = $validatedData['status'];
        $order->save();

        return redirect()->route('orders.index')
            ->with('success', 'تم تحديث حالة الطلب بنجاح.');
    }
}
