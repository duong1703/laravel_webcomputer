<?php

use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\IntroController;
use App\Http\Controllers\Client\ProductDetailController;
use App\Http\Controllers\Client\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('/client/pages/home');
});
//Home_client
Route::get('views/client/pages/home', [\App\Http\Controllers\Client\HomeController::class, 'index']);
Route::get('show', [\App\Http\Controllers\Client\HomeController::class, 'show']);

Route::get('views/client/pages/product', [\App\Http\Controllers\Client\ProductController::class, 'index']);

Route::get('views/client/pages/product_detail', [ProductDetailController::class, 'index']);
Route::get('views/client/pages/product_detail/{id}', [ProductDetailController::class, 'index']);
Route::get('views/client/pages/product_detail/{id}', [ProductDetailController::class, 'show'])->name('products.show');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');

Route::get('views/client/pages/contact', [ContactController::class, 'index']);

Route::get('views/client/pages/blogs', [BlogController::class, 'index']);

Route::get('views/client/pages/blogs_single', [BlogController::class, 'index']);

Route::get('views/client/pages/login', [\App\Http\Controllers\Client\LoginController::class, 'index'])->name('customer.login');

Route::post('/login', [\App\Http\Controllers\Client\LoginController::class, 'login']);

Route::get('views/client/pages/register', [RegisterController::class, 'index'])->name('customer.register');

Route::post('register', [RegisterController::class, 'register']);

Route::get('views/client/pages/intro', [IntroController::class, 'index']);

Route::get('views/client/pages/cart', [CartController::class, 'index']);







//Login_Admin
Route::get('views/admin/pages/login', [LoginController::class, 'Adminlogin']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware(['Authenticate'])->group(function () {
    Route::get('views/admin/pages/home', [HomeController::class, 'AdminHome']);
    Route::get('logout', [LoginController::class, 'logout']);


    //User
    Route::get('views/admin/pages/user/list', [UserController::class, 'listUser']);
    Route::get('views/admin/pages/user/add', [UserController::class, 'addUser']);
    // Route::get('create', [UserController::class, 'create'])->name('user.create');
    Route::post('create', [UserController::class, 'create'])->name('user.create');  
    Route::get('views/admin/pages/user/edit', [UserController::class, 'editUser']);
    Route::get('views/admin/pages/user/edit/{slug}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'delete']);
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

    //Product
    Route::get('views/admin/pages/product/list', [ProductController::class, 'listProduct']);
    Route::get('views/admin/pages/product/add', [ProductController::class, 'addProduct']);
    Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('views/admin/pages/product/edit', [ProductController::class, 'update'])->name('update');
    Route::get('views/admin/pages/product/edit/{slug}', [ProductController::class, 'update'])->name('update');
    Route::put('admin/pages/product/update/{slug}', [ProductController::class, 'update'])->name('update');
    Route::delete('/delete-product/{id}', [ProductController::class, 'delete']);

    //Comment
    Route::get('views/admin/pages/comment/list', [CommentController::class, 'listComment']);

    //Order
    Route::get('views/admin/pages/order/list', [OrderController::class, 'listOrder']);

    //Blogs
    Route::get('views/admin/pages/blogs/list', [BlogsController::class, 'listBlogs']);
    Route::get('views/admin/pages/blogs/add', [BlogsController::class, 'addBlogs']);
    Route::post('Create', [BlogsController::class, 'Create'])->name('blog.create');
    Route::post('/blogs/delete/{slug}', [BlogsController::class, 'delete'])->name('blogs.delete');
    Route::get('views/admin/pages/blogs/edit', [BlogsController::class, 'editBlogs']);
    Route::get('views/admin/pages/blogs/edit/{slug}', [BlogsController::class, 'editBlogs']);
    Route::delete('/delete-blog/{id}', [BlogsController::class, 'delete']);
});