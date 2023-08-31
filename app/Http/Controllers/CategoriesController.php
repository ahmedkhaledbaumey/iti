<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    // عرض قائمة الفئات
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // عرض نموذج إضافة فئة جديدة
    public function create()
    {
        return view('categories.create');
    }

    // حفظ الفئة الجديدة في قاعدة البيانات
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
            // يمكنك إضافة المزيد من قواعد التحقق حسب الحاجة
        ]);

        Category::create($validatedData);

        return redirect()->route('categories.index')
            ->with('success', 'تمت إضافة الفئة بنجاح.');
    }
 
    public function show($id)
    {
        $category = Category::find($id);
        return view('category.show', compact('category'));
    }

    // عرض نموذج تعديل فئة معينة
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    // تحديث الفئة المعدلة في قاعدة البيانات
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
            // يمكنك إضافة المزيد من قواعد التحقق حسب الحاجة
        ]);

        $category = Category::find($id);
        $category->update($validatedData);

        return redirect()->route('categories.index')
            ->with('success', 'تم تحديث الفئة بنجاح.');
    }

    // حذف فئة معينة من قاعدة البيانات
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'تم حذف الفئة بنجاح.');
    }
}
