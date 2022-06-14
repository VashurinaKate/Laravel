<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AgregatorController;

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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
})
    ->name('welcome');

Route::get('/about', function () {
    return view('about');
})
    ->name('about');

Route::get('/reviews', [ReviewController::class, 'index'])
    ->name('reviews');

Route::get('/reviews/create', [ReviewController::class, 'create'])
    ->name('reviews.create');

Route::match(['post', 'get'], '/reviews/store', [ReviewController::class, 'store'])
    ->name('reviews.store');

Route::get('/agregator', [AgregatorController::class, 'index'])
    ->name('agregator');

Route::match(['post', 'get'], '/getData', [AgregatorController::class, 'store'])
    ->name('getData');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', AdminController::class)->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

Route::get('/categories/{id}', [NewsController::class, 'index'])
    ->where('id', '\d+')
    ->name('news');

Route::get('/categories/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

Route::get('/categories/news/add', [NewsController::class, 'add'])
    ->name('news.add');
