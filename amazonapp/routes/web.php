<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

//CRUDにまつわるルートを一括で用意(第一引数：ベースURL、第二引数：コントローラー名)
//laravel8から以下の記法
//Route::resource('products', ProductController::class);

Route::get('products', [ProductController::class, 'index'])->name('products.index');

//index.blade.phpでroute(products.show)としているから、name()を使う必要あり
Route::get('products/show/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');

Route::get('products/create', [ProductController::class, 'create'])->name('products.create');

Route::post('products/store', [ProductController::class, 'store']);

Route::post('products/update/{id}', [ProductController::class, 'update']);

Route::post('products/destroy/{id}', [ProductController::class, 'destroy']);
