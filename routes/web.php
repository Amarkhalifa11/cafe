<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;


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
    $categorys = Category::all();
    return view('frontend.home' , compact('categorys'));
})->name('home');

Route::get('/about', function () {
    $categorys = Category::all();
    return view('frontend.about' , compact('categorys'));
})->name('about');




// ______________________________________________________________________________________

use App\Http\Controllers\ProductController;
 
Route::get('/all_product', [ProductController::class, 'index'])->name('all_product');
Route::get('/category/{id}', [ProductController::class, 'category'])->name('category');

Route::get('/single_product/{id}', [ProductController::class, 'single_product'])->name('single_product');
Route::get('/single_product', function () {
    return redirect('/');
});

// BACK
Route::get('/all_product/all', [ProductController::class, 'all_products'])->name('all_product.all');
Route::get('/all_product/create', [ProductController::class, 'create'])->name('all_product.create');
Route::post('/all_product/store', [ProductController::class, 'store'])->name('all_product.store');
Route::get('/all_product/edit/{id}', [ProductController::class, 'edit'])->name('all_product.edit');
Route::post('/all_product/update/{id}', [ProductController::class, 'update'])->name('all_product.update');
Route::get('/all_product/destroy/{id}', [ProductController::class, 'destroy'])->name('all_product.destroy');


// ______________________________________________________________________________________

use App\Http\Controllers\CartController;
 
Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::post('/add_to_cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/add_to_cart', function () {
    return redirect('/');
});

Route::post('/remove', [CartController::class, 'remove'])->name('remove');
Route::get('/remove', function () {
    return redirect('/');
});

Route::post('/edit_quantity', [CartController::class, 'edit_quantity'])->name('edit_quantity');
Route::get('/edit_quantity', function () {
    return redirect('/');
});

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/place_order', [CartController::class, 'place_order'])->name('place_order');


// ______________________________________________________________________________________

use App\Http\Controllers\PaymentController;

Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::get('/verify_payment/{transaction_id}', [PaymentController::class, 'verify_payment'])->name('verify_payment');
Route::get('/complete', [PaymentController::class, 'complete'])->name('complete');
Route::get('/thank_you', [PaymentController::class, 'thank_you'])->name('thank_you');

// back
Route::get('/all_payment', [PaymentController::class, 'all_payment'])->name('all_payment');
Route::get('/all_payment/destroy/{id}', [PaymentController::class, 'destroy'])->name('all_payment.destroy');

// ______________________________________________________________________________________


use App\Http\Controllers\backendController;
 
Route::get('/logout', [backendController::class, 'logout'])->name('logout');

// ______________________________________________________________________________________

use App\Http\Controllers\UserController;
 
Route::get('/user', [UserController::class, 'user'])->name('user');

// ______________________________________________________________________________________


use App\Http\Controllers\CategoryController;
 
Route::get('/all_category', [CategoryController::class, 'index'])->name('all_category');
Route::get('/add_category/create', [CategoryController::class, 'create'])->name('add_category.create');
Route::post('/add_category/store', [CategoryController::class, 'store'])->name('add_category.store');
Route::get('/add_category/edit/{id}', [CategoryController::class, 'edit'])->name('add_category.edit');
Route::post('/add_category/update/{id}', [CategoryController::class, 'update'])->name('add_category.update');
Route::get('/add_category/destroy/{id}', [CategoryController::class, 'destroy'])->name('add_category.destroy');

// ______________________________________________________________________________________

use App\Http\Controllers\OrdersTableController;
 
Route::get('/all_orders', [OrdersTableController::class, 'index'])->name('all_orders');
Route::get('/all_orders/destroy/{id}', [OrdersTableController::class, 'destroy'])->name('all_orders.destroy');

// ______________________________________________________________________________________

use App\Http\Controllers\OrderssItemsController;
 
Route::get('/all_orders_items', [OrderssItemsController::class, 'index'])->name('all_orders_items');
Route::get('/all_orders_items/destroy/{id}', [OrderssItemsController::class, 'destroy'])->name('all_orders_items.destroy');

// ______________________________________________________________________________________



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.home');
    })->name('dashboard');
});
