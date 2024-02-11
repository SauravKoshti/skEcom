<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MyController;

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
Route::resource('products', ProductController::class);
Route::resource('category', CategoryController::class);
// Route::post('search', [MyController::class, 'import'])->name('import');
Route::post('import', [MyController::class, 'import'])->name('import');
Route::get('importExportView', [MyController::class, 'importExportView']);
Route::post('import/category', [CategoryController::class, 'importCategory'])->name('importCategory');
Route::post('import/products', [ProductController::class, 'importProducts'])->name('importProducts');
