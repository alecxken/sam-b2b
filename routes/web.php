<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


   Route::get('/pay-product/{id}', [ProductController::class, 'pay_product'])->name('pay_product.index');

Route::get('users-index',[UserController::class,'index']);

Route::get('get-user-info/{id}',[UserController::class,'get_user']);

Route::get('users_delete',[UserController::class,'delete_user']);

Route::post('users_store',[UserController::class,'user_store']);

Route::post('users_update',[UserController::class,'update_user']);

Route::get('roles-index',[UserController::class,'roles']);

 Route::post('/roles_store', [UserController::class, 'roles_store'])->name('roles.store');

    Route::get('/user_destroy/{id}', [UserController::class, 'user_destroy'])->name('user.destroy');

    Route::get('/roles_destroy/{id}', [UserController::class, 'destroy'])->name('roles.destroy');

    Route::post('/permissions_store', [UserController::class, 'permissions_store'])->name('permissions.store');

Route::get('/myorders', [ProductController::class, 'view_myorders']);

Route::get('/index-order', [ProductController::class, 'my_order'])->name('index-product.my_order');

   Route::get('/get-payment/{id}', [ProductController::class, 'getpayment_product'])->name('get-payment.index');

   Route::post('/capture-payment', [ProductController::class, 'Storepayment_product'])->name('store.cart');

Route::get('/index-address', [ProductController::class, 'view_addresses'])->name('index-product.address');

  Route::get('/index-product', [ProductController::class, 'index'])->name('index-product.index');

   Route::get('/getproduct/{id}', [ProductController::class, 'getproduct'])->name('get-s.index');

  Route::get('/get-product/{id}', [ProductController::class, 'get_product'])->name('get-product.index');

  Route::get('/delete-product', [ProductController::class, 'delete_product'])->name('delete-product.index');

  Route::post('/product_store', [ProductController::class, 'product_store'])->name('product.store');

    Route::get('/product/{id}', [ProductController::class, 'productdetails'])->name('product.details');

    Route::get('/retail-dash', [ProductController::class, 'retaildash'])->name('product.retaildash');

      Route::get('/orders', [ProductController::class, 'view_orders'])->name('product.orders');

       Route::post('/add-to-cart', [ProductController::class, 'add_cart'])->name('product.cart');

     Route::get('/productcheckout/{id}', [ProductController::class, 'checkoutproduct'])->name('product.checkout');

      Route::post('/checkout-post', [ProductController::class, 'checkout_post'])->name('checkout.cart');

     Route::get('/reports/{id}', [ProductController::class, 'mobile_settings']);


require __DIR__.'/auth.php';