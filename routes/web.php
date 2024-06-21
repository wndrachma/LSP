<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\DiscountCategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DeliverieController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Landing\CartController;
use App\Http\Controllers\Landing\BeliController;
use App\Http\Controllers\Landing\CheckoutVwController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');

//shop
Route::get('/shop', [\App\Http\Controllers\Landing\ShopController::class, 'index'])->name('shop');
Route::get('/produk-detail/{id}', [\App\Http\Controllers\Landing\ShopController::class, 'produk_detail'])->name('produk.detail');
Route::get('/shop/category/{category_id}', [\App\Http\Controllers\Landing\ShopController::class, 'filterByCategory'])->name('shop.category');

//cart
Route::get('/cart', [\App\Http\Controllers\Landing\CartController::class, 'index'])->name('landingpage.cart');
Route::post('/cart/store/{id}', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('remove');

//review
Route::resource('review', ReviewController::class);
Route::get('review', [ReviewController::class, 'index'])->name('review');
Route::get('store', [ReviewController::class, 'store'])->name('landingpage.review');

// Checkoutvw 
Route::resource('/checkoutvw', \App\Http\Controllers\Landing\CheckoutVwController::class);
Route::get('/checkout', [CheckoutVwController::class, 'index'])->name('landingpage.checkoutvw');
Route::post('/checkout', [CheckoutVwController::class, 'checkoutProcess'])->name('checkout.process');
Route::post('/checkout/store', [CheckoutVwController::class, 'store'])->name('checkout.store');

Route::resource('wish', \App\Http\Controllers\WishController::class);
Route::resource('about', \App\Http\Controllers\AboutController::class);
Route::resource('contact', \App\Http\Controllers\ContactController::class);


//dashboard
Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);

// Rute untuk menampilkan formulir registrasi
Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Rute untuk memproses data registrasi
Route::post('/register', [RegisterController::class, 'processRegistration']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::post('/register-proses', [RegisterController::class, 'register_proses'])->name('register-proses');

//user
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::post('/insertdatauser', [UserController::class, 'insertdatauser'])->name('insertdatauser');
Route::get('/hapusUsr/{id}', [UserController::class, 'hapusUsr'])->name('hapusUsr');
Route::get('/users/hapusUsr/{id}', [UserController::class, 'hapusUsr']);

//product category
Route::resource('productCategories', \App\Http\Controllers\ProductCategoriesController::class);
Route::post('/productC', [ProductCategoriesController::class, 'productC'])->name('productC');
Route::get('/hapusPC/{id}', [ProductCategoriesController::class, 'hapusPC'])->name('hapusPC');
Route::get('/productCategories/hapusPC/{id}', [ProductCategoriesController::class, 'hapusPC']);

//discount category
Route::resource('discountCategories', \App\Http\Controllers\DiscountCategoriesController::class);
Route::post('/discountC', [DiscountCategoriesController::class, 'discountC'])->name('discountC');
Route::get('/hapusDC/{id}', [DiscountCategoriesController::class, 'hapusDC'])->name('hapusDC');
Route::get('/productCategories/hapusDC/{id}', [DiscountCategoriesController::class, 'hapusDC']);

//order
Route::resource('orders', \App\Http\Controllers\OrderController::class);
Route::post('/beli', [OrderController::class, 'beli'])->name('beli');
Route::get('/hapusOdr/{id}', [OrderController::class, 'hapusOdr'])->name('hapusOdr');
Route::get('/orders/hapusOdr/{id}', [OrderController::class, 'hapusOdr']);
Route::get('/order/{period}', [App\Http\Controllers\OrderController::class, 'show'])->name('order.detail');


//customer
Route::resource('customer', \App\Http\Controllers\CustomerController::class);
Route::post('/pelanggan', [CustomerController::class, 'pelanggan'])->name('pelanggan');
Route::get('/hapusCstmr/{id}', [CustomerController::class, 'hapusCstmr'])->name('hapusCstmr');
Route::get('/orders/hapusCstmr/{id}', [CustomerController::class, 'hapusCstmr']);

//payment
Route::resource('payment', \App\Http\Controllers\PaymentController::class);
Route::post('/bayar', [PaymentController::class, 'bayar'])->name('bayar');
Route::get('/hapusPymt/{id}', [PaymentController::class, 'hapusPymt'])->name('hapusPymt');
Route::get('/payment/hapusPymt/{id}', [PaymentController::class, 'hapusPymt']);

//order detail
Route::resource('orderDetail', \App\Http\Controllers\OrderDetailController::class);
Route::post('/OD', [OrderDetailController::class, 'OD'])->name('OD');
Route::get('/hapusOD/{id}', [OrderDetailController::class, 'hapusOD'])->name('hapusOD');
Route::get('/orderDetail/hapusOD/{id}', [OrderDetailController::class, 'hapusOD']);

//product
Route::resource('product', \App\Http\Controllers\ProductController::class)->except('show');
// Route::post('/barang', [ProductController::class, 'barang'])->name('barang');
Route::get('/hapusPrdct/{id}', [ProductController::class, 'hapusPrdct'])->name('hapusPrdct');
Route::get('/product/hapusPrdct/{id}', [ProductController::class, 'hapusPrdct']);

//deliveries
Route::resource('deliveries', \App\Http\Controllers\DeliverieController::class);
Route::post('/pengiriman', [DeliverieController::class, 'pengiriman'])->name('pengiriman');
Route::get('/hapusDlvry/{id}', [DeliverieController::class, 'hapusDlvry'])->name('hapusDlvry');
Route::get('/deliveries/hapusDlvry/{id}', [DeliverieController::class, 'hapusDlvry']);

//discount
Route::resource('discount', \App\Http\Controllers\DiscountController::class);
Route::post('/discount', [DiscountController::class, 'discount'])->name('discount');
Route::get('/hapusDscn/{id}', [DiscountController::class, 'hapusDscn'])->name('hapusDscn');
Route::get('/discount/hapusDscn/{id}', [DiscountController::class, 'hapusDscn']);

//product review
Route::resource('productReview', \App\Http\Controllers\ProductReviewController::class);
Route::post('/rating', [ProductReviewController::class, 'rating'])->name('rating');
Route::get('/hapusRvw/{id}', [ProductReviewController::class, 'hapusRvw'])->name('hapusRvw');
Route::get('/productReview/hapusRvw/{id}', [ProductReviewController::class, 'hapusRvw']);

//wishlist
Route::resource('wishlist', \App\Http\Controllers\WishlistController::class);
Route::post('/WishList', [WishlistController::class, 'WishList'])->name('WishList');
Route::get('/hapusWsh/{id}', [WishlistController::class, 'hapusWsh'])->name('hapusWsh');
Route::get('/wishlist/hapusWsh/{id}', [WishlistController::class, 'hapusWsh']);