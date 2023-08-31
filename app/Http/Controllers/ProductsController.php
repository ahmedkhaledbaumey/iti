<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    // عرض قائمة المنتجات
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // عرض نموذج إضافة منتج جديد
    public function create()
    {
        return view('products.create');
    }

    // حفظ المنتج الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            // قد تحتاج إلى إضافة قواعد تحقق إضافية حسب احتياجاتك
        ]);

        Product::create($validatedData);

        return redirect()->route('products.index')
            ->with('success', 'تمت إضافة المنتج بنجاح.');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    // عرض نموذج تعديل منتج معين
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    // تحديث المنتج المعدل في قاعدة البيانات
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            // قد تحتاج إلى إضافة قواعد تحقق إضافية حسب احتياجاتك
        ]);

        $product = Product::find($id);
        $product->update($validatedData);

        return redirect()->route('products.index')
            ->with('success', 'تم تحديث المنتج بنجاح.');
    }

    // حذف منتج معين من قاعدة البيانات
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'تم حذف المنتج بنجاح.');
    }
}
