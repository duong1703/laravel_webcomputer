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
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\IntroController;
use App\Http\Controllers\Client\LogoutController;
use App\Http\Controllers\Client\PaymentController;
use App\Http\Controllers\Client\ProductDetailController;
use App\Http\Controllers\Client\ProductReviewController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\ResponsePage;
use App\Models\Client\ProductReview;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('/client/pages/home');
// });
//Home_client
Route::get('/views/client/pages/home', [\App\Http\Controllers\Client\HomeController::class, 'index'])->name('homepage');
// Route::get('home', [\App\Http\Controllers\Client\HomeController::class, 'home'])->name('home');
// Route::get('show', [\App\Http\Controllers\Client\HomeController::class, 'show']);

Route::get('views/client/pages/product', [\App\Http\Controllers\Client\ProductController::class, 'index'])->name('listproduct');

Route::get('views/client/pages/product_detail', [ProductDetailController::class, 'index']);
Route::get('views/client/pages/product_detail/{id}', [ProductDetailController::class, 'index']);
Route::get('views/client/pages/product_detail/{id}', [ProductDetailController::class, 'show'])->name('products.show');
// Route::get('/products/{category?}', [\App\Http\Controllers\Client\ProductController::class, 'showProducts'])->name('products.category');
// Route::post('/login', [\App\Http\Controllers\Client\LoginController::class, 'login'])->name('login');

Route::get('views/client/pages/profile', [ProfileController::class, 'index'])->name('profile');


Route::get('views/client/pages/contact', [ContactController::class, 'index']);

Route::get('views/client/pages/blogs', [BlogController::class, 'index']);

Route::get('views/client/pages/blogs_single', [BlogController::class, 'index']);

Route::get('views/client/pages/login', [\App\Http\Controllers\Client\LoginController::class, 'index'])->name('login-user');
// Route::get('home', [\App\Http\Controllers\Client\LoginController::class, 'home'])->name('home');
Route::post('views/client/pages/login', [\App\Http\Controllers\Client\LoginController::class, 'login'])->name('postlogin');

Route::post('/views/client/pages/logout', [\App\Http\Controllers\Client\LoginController::class, 'logout'])->name('logout');

Route::get('views/client/pages/register', [RegisterController::class, 'index'])->name('register-user');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('views/client/pages/intro', [IntroController::class, 'index']);

Route::get('views/client/pages/cart', [\App\Http\Controllers\Client\ProductController::class, 'cart'])->name('viewcart');
//cart
Route::get('add-to-cart/{id}', [\App\Http\Controllers\Client\ProductController::class, 'addToCart'])->name('add_to_cart');
Route::delete('/remove-from-cart', [\App\Http\Controllers\Client\ProductController::class, 'remove'])->name('remove_from_cart');
Route::delete('cart/{itemId}', [\App\Http\Controllers\Client\ProductController::class, 'removeItemFromCart'])->name('cart.remove');

Route::get('views/client/pages/checkoutpage', [CheckoutController::class,'index'])->name('checkout');
Route::get('views/client/pages/thankspage', [ResponsePage::class,'thankspage']);

Route::get('/products/{category}', [\App\Http\Controllers\Client\ProductController::class, 'index'])->name('products.index');

// //Cong thanh toán

Route::post('/vnpay_payment', [PaymentController::class, 'vnpay_payment']);


//Mail
Route::get('contact-us', [ContactController::class, 'index']);
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us.store');








//Login_Admin
Route::get('views/admin/pages/login', [LoginController::class, 'Adminlogin']);
Route::post('login', [LoginController::class, 'login'])->name('Adminlogin');

Route::middleware(['Authenticate'])->group(function () {
    Route::get('views/admin/pages/home', [HomeController::class, 'AdminHome']);
    Route::get('logout', [LoginController::class, 'logout']);


    //User
    Route::get('views/admin/pages/user/list', [UserController::class, 'listUser'])->name('listUser');
    Route::get('views/admin/pages/user/add', [UserController::class, 'addUser']);
    // Route::get('create', [UserController::class, 'create'])->name('user.create');
    Route::post('create', [UserController::class, 'create'])->name('user.create');  
    Route::post('views/admin/pages/user/edit', [UserController::class, 'editUser'])->name('admin.users.update');
    Route::get('views/admin/pages/user/edit/{id}', [UserController::class, 'editUser'])->name('editUser');
    Route::delete('/delete-user/{id}', [UserController::class, 'delete']);
    Route::put('views/admin/pages/user/edit/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::post('views/admin/pages/user/edit/{id}', [UserController::class, 'update'])->name('admin.users.update');

    //Product
    Route::get('views/admin/pages/product/list', [ProductController::class, 'listProduct'])->name('admin.product.list');
    Route::get('views/admin/pages/product/add', [ProductController::class, 'addProduct']);
    Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('views/admin/pages/product/edit/{id}', [ProductController::class, 'editProduct'])->name('editProduct');
    Route::put('views/admin/pages/product/edit/{id}', [ProductController::class, 'updateProduct'])->name('admin.pages.product.edit');
    // Route::put('/views/admin/pages/product/edit/{slug}', [ProductController::class, 'updateProduct'])->name('admin.product.list');
    Route::delete('/delete-product/{id}', [ProductController::class, 'delete']);

    //Comment
    Route::get('views/admin/pages/comment/list', [CommentController::class, 'listComment']);

    //Order
    Route::get('views/admin/pages/order/list', [OrderController::class, 'listOrder']);

    //Blogs
    Route::get('views/admin/pages/blogs/list', [BlogsController::class, 'listBlogs'])->name('listBlogs');
    Route::get('views/admin/pages/blogs/add', [BlogsController::class, 'addBlogs']);
    Route::post('Create', [BlogsController::class, 'Create'])->name('blog.create');
    Route::post('/blogs/delete/{slug}', [BlogsController::class, 'delete'])->name('blogs.delete');
    Route::get('views/admin/pages/blogs/edit', [BlogsController::class, 'editBlogs'])->name('editBlogs');
    Route::get('views/admin/pages/blogs/edit/{slug}', [BlogsController::class, 'editBlogs']);
    Route::put('/views/admin/pages/blogs/edit/{slug}', [BlogsController::class, 'updateBlogs'])->name('updateBlogs');
    Route::delete('/delete-blog/{id}', [BlogsController::class, 'delete'])->name('deleteBlog');
});