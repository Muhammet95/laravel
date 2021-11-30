<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Middleware\EnsureTokenIsValid;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| Here is where you can register web routes for your application. These
|
*/

Route::get('/dd', function(){
    return view('/');
});

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/basket', [BasketController::class, 'basket'])->name('basket');
Route::post('/basket/add/{id}', [BasketController::class, 'basketAdd'])->name('basketAdd');
Route::post('/basket/rmv/{id}', [BasketController::class, 'basketRmv'])->name('basketRmv');
Route::get('/product/{product_code?}', [MainController::class, 'product'])->name('product');
Route::get('/ordering', [BasketController::class, 'ordering'])->name('ordering');
Route::post('/order/confirm', [BasketController::class, 'confirm'])->name('orderConfirm');
Route::get('/products', [MainController::class, 'index'])->name('products');
Route::get('/sign_in', [MainController::class, 'sign_in'])->name('signIn');
Route::post('/sign_in/confirm', [LoginController::class, '__constructor'])->name('login');
Route::get('/sign_up', [MainController::class, 'sign_up'])->name('signUp');
Route::post('/sign_up/confirm', [RegisterController::class, '__construct'])->name('register');
Route::get('/{code?}', [MainController::class, 'category']);

Route::get('/dashboard/login', function(){
    return view('dashboard/login');
});
Route::get('/dashboard/categories', function(){
    return view('dashboard/categories');
});
Route::get('/dashboard/products', function(){
    return view('dashboard/products');
});
Route::get('/dashboard/orders', function(){
    return view('dashboard/orders');
});
Route::get('dashboard/order/1', function(){
    return view('dashboard/order');
});
Route::get('dashboard/open', function(){
    return view('dashboard/open');
});
Route::get('dashboard/edit', function(){
    return view('dashboard/edit');
});
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
