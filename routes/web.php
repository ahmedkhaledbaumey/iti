<?php 

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;

// مسار تسجيل الدخول وتسجيل الخروج
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// مسار الصفحة الرئيسية
// Route::get('/', [HomeController::class, 'index'])->name('products'); 
Route::get('/', function () {
    return view('home');
});


// مسارات المستخدمين
Route::resource('users', UsersController::class);

// مسارات المشرفين
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products.index');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('/products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.destroy');
    // تكملة باقي مسارات المشرف حسب احتياجاتك

    // مسارات الفئات
    Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories.index');
    Route::get('/categories/create', [AdminController::class, 'createCategory'])->name('admin.categories.create');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
    Route::get('/categories/{id}/edit', [AdminController::class, 'editCategory'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
    Route::delete('/categories/{id}', [AdminController::class, 'deleteCategory'])->name('admin.categories.destroy');
    // تكملة باقي مسارات الفئات حسب احتياجاتك

    // مسارات الطلبات
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders.index');
    Route::get('/orders/{id}', [AdminController::class, 'viewOrder'])->name('admin.orders.show');
    // تكملة باقي مسارات الطلبات حسب احتياجاتك

    // مسارات المستخدمين
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users.index');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.destroy');
    // تكملة باقي مسارات المستخدمين حسب احتياجاتك
});

// مسارات المنتجات
Route::resource('products', ProductsController::class);


// مسارات الفئات
// Route::resource('categories', CategoriesController::class);

// مسارات العربة
Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
Route::get('/carts/add/{productId}', [CartController::class, 'addToCart'])->name('carts.add');
// Route::post('/carts/add/{productId}', [CartController::class, 'addToCart'])->name('carts.add');
// Route::post('/carts/remove/{cartItemId}', [CartController::class, 'removeFromCart'])->name('carts.remove');
Route::get('/carts/checkout', [CartController::class, 'checkout'])->name('carts.checkout');

// مسارات الطلبات
Route::resource('orders', OrdersController::class);


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 
require __DIR__.'/auth.php';




