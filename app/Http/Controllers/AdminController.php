<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    // عرض لوحة التحكم للمشرف
    public function dashboard()
    {
        // اعرض صفحة لوحة التحكم للمشرف هنا
        return view('admin.dashboard');
    }

    // إدارة المنتجات
    public function products()
    {
        $products = Product::all(); // استعرض جميع المنتجات هنا
        
        return view('admin.products.index', compact('products'));
    }

    public function createProduct()
    {
        // اعرض نموذج إنشاء منتج جديد وقد تحتاج إلى تخصيص النموذج
        return view('admin.products.create');
    }

    public function storeProduct(Request $request)
    {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'price' => 'required|numeric|min:0',
    //         'category_id' => 'required|exists:categories,id',
    //     ]);

        Product::create($request->all());

        return redirect()->route('admin.products.index')
            ->with('success', 'تمت إضافة المنتج بنجاح.');
    }

    public function editProduct($id)
    {
        // اعرض نموذج تحرير المنتج وقد تحتاج إلى تخصيص النموذج
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'price' => 'required|numeric|min:0',
        //     'category_id' => 'required|exists:categories,id',
        // ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('admin.products.index')
            ->with('success', 'تم تحديث المنتج بنجاح.');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'تم حذف المنتج بنجاح.');
    }

    // إدارة الفئات
    public function categories()
    {
        $categories = Category::all(); // استعرض جميع الفئات هنا
        
        return view('admin.categories.index', compact('categories'));
    }

    public function createCategory()
    {
        // اعرض نموذج إنشاء فئة جديدة وقد تحتاج إلى تخصيص النموذج
        return view('admin.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', 'تمت إضافة الفئة بنجاح.');
    }

    public function editCategory($id)
    {
        // اعرض نموذج تحرير الفئة وقد تحتاج إلى تخصيص النموذج
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', 'تم تحديث الفئة بنجاح.');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'تم حذف الفئة بنجاح.');
    }

    // إدارة المستخدمين
    public function users()
    {
        $users = User::all(); // استعرض جميع المستخدمين هنا
        
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        // اعرض نموذج إنشاء مستخدم جديد وقد تحتاج إلى تخصيص النموذج
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create($request->all());

        return redirect()->route('admin.users.index')
            ->with('success', 'تمت إضافة المستخدم بنجاح.');
    }

    public function editUser($id)
    {
        // اعرض نموذج تحرير المستخدم وقد تحتاج إلى تخصيص النموذج
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'password' => 'nullable|string|min:6',
        ]);

        $user = User::findOrFail($id);
        $data = $request->all();
        if (!$data['password']) {
            unset($data['password']);
        }
        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'تم تحديث المستخدم بنجاح.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'تم حذف المستخدم بنجاح.');
    }

    // إدارة الطلبات
    public function orders()
    {
        $orders = Order::all(); // استعرض جميع الطلبات هنا
        
        return view('admin.orders.index', compact('orders'));
    }

    public function viewOrder($id)
    {
        $order = Order::findOrFail($id); // اعرض تفاصيل الطلب هنا
        
        return view('admin.orders.show', compact('order'));
    }
}
