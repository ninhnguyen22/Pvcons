<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('', [HomeController::class, 'index']);

Route::prefix('du-an')->group(function () {
    Route::get('', [ProductController::class, 'all'])
        ->name('product.all');

    Route::get('{productCategory}', [ProductController::class, 'category'])
        ->where('productCategory', '[A-Za-z0-9\-_]+')
        ->name('product.category');

    Route::get('{productSlug}-{product}.html', [ProductController::class, 'detail'])
        ->where('productSlug', '[\S]+')
        ->where('product', '[0-9]+')
        ->name('product.detail');
});

Route::prefix('tin-tuc')->group(function () {
    Route::get('', [NewsController::class, 'all'])
        ->name('news.all');

    Route::get('{newsSlug}-{news}.html', [NewsController::class, 'detail'])
        ->where('newsSlug', '[\S]+')
        ->where('news', '[0-9]+')
        ->name('news.detail');

    Route::get('{categorySlug}-{category}', [NewsController::class, 'category'])
        ->where('categorySlug', '[\S]+')
        ->where('category', '[0-9]+')
        ->name('news.category');
});

Route::prefix('lien-he')->group(function () {
    Route::get('', [ContactController::class, 'show'])
        ->name('contact.show');
    Route::post('', [ContactController::class, 'store'])
        ->name('contact.store');
});

Route::get('/test', [\App\Http\Controllers\PostController::class, 'index']);

/* API */
Route::get('api/getProductByCategory/{id}', [\App\Http\Controllers\ApiController::class, 'getProductByCategory']);

Route::group([
    'prefix' => config('admin.route.prefix') . '/laravel-filemanager',
    'middleware' => config('admin.route.middleware')
], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
