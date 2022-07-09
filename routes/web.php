<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ParserController;

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ParserController as AdminParserController;

use App\Http\Controllers\SocialController;
use App\Http\Controllers\Account\IndexController as AccountController;

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

Route::get('/userParser', [ParserController::class, 'index'])
    ->name('userParser');

Route::get('/userParser/create', [ParserController::class, 'create'])
    ->name('userParser.create');

Route::match(['post', 'get'], '/parseData', [ParserController::class, 'store'])
    ->name('parseData');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)
        ->name('account');
    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('/', AdminController::class)
            ->name('index');
//        Route::get('/parser', AdminParserController::class)
//            ->name('parser');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/profile', AdminProfileController::class);
        Route::resource('/parser', AdminParserController::class);
        Route::get('/parseNews', [AdminParserController::class, 'parse'])
            ->name('parseNews');
        Route::get('/sendNewsFromStorageToDB/{id}', [AdminParserController::class, 'sendNewsFromStorageToDB'])
            ->name('sendNewsFromStorageToDB');
        Route::match(['post', 'get'], '/addResource', [AdminParserController::class, 'store'])
            ->name('addResource');
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/{driver}/redirect', [SocialController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social.redirect');
    Route::any('/auth/{driver}/callback', [SocialController::class, 'callback'])
        ->where('driver', '\w+')
        ->name('social.callback');
});

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

Route::get('/categories/{id}', [NewsController::class, 'index'])
    ->where('id', '\d+')
    ->name('news');

Route::get('/categories/news/{slug}', [NewsController::class, 'show'])
//    ->where('id', '\d+')
    ->where('slug', '[a-zA-Z0-9\-\-_]+')
    ->name('news.show');

Route::get('/news/add', [NewsController::class, 'add'])
    ->name('news.add');

Route::match(['post', 'get'], '/news/store', [NewsController::class, 'store'])
    ->name('news.store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
