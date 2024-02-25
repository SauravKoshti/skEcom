<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\User\UserProductController;

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

// Route::get('/', function () {
//     return view('user.welcome');
// });
Route::resource('products', ProductController::class);
Route::resource('category', CategoryController::class);
// Route::post('search', [MyController::class, 'import'])->name('import');
Route::post('import', [MyController::class, 'import'])->name('import');
Route::get('importExportView', [MyController::class, 'importExportView']);
Route::post('import/category', [CategoryController::class, 'importCategory'])->name('importCategory');
Route::post('import/products', [ProductController::class, 'importProducts'])->name('importProducts');


Route::get('/', [HomeController::class, 'index']);
Route::get('/search', [HomeController::class,'search'])->name('search');
// Route::get('/', 'WelcomePageController@index')->name('welcome');
Route::get('/login', [UserAuthController::class, 'login'])->name('login');
Route::post('/loginUser', [UserAuthController::class, 'loginUser'])->name('loginUser');
Route::get('/register', [UserAuthController::class, 'register'])->name('register');
Route::post('/registerUser', [UserAuthController::class, 'registerUser'])->name('registerUser');
Route::get('/logout', [UserAuthController::class, 'registerUser'])->name('logout');
Route::get('/product-detail/{id}', [UserProductController::class, 'index'])->name('index');
Route::post('add-to-cart', [UserProductController::class, 'addToCart'])->name('addToCart');
Route::get('/cart', [UserProductController::class, 'showCartTable']);
Route::delete('remove-from-cart', [UserProductController::class, 'removeCartItem']);
// Route::get('delete-cart', [UserProductController::class, 'clearCart']);
Route::get('remove-from-cart', [UserProductController::class, 'removeCartItem']);
