<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminRequestsController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
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

Route::redirect('/', '/en', 301);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Auth::routes([
        'register' => false
    ]);
    Route::group(['middleware' => 'auth'], function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        Route::resource('products', AdminProductController::class);
        Route::resource('categories', AdminCategoryController::class)->except(['show']);
        Route::resource('requests', AdminRequestsController::class)->except(['show', 'update', 'edit']);
        Route::group(['prefix' => 'products/{productId}/descriptions/'], function () {
            Route::get('', [DescriptionController::class, 'index'])->name('descriptions.index');
            Route::get('create', [DescriptionController::class, 'create'])->name('descriptions.create');
            Route::post('store', [DescriptionController::class, 'store'])->name('descriptions.store');
            Route::get('{description}', [DescriptionController::class, 'show'])->name('descriptions.show');
            Route::get('edit/{description}', [DescriptionController::class, 'edit'])->name('descriptions.edit');
            Route::put('edit/{description}', [DescriptionController::class, 'update'])->name('descriptions.update');
            Route::delete('{description}', [DescriptionController::class, 'destroy'])->name('descriptions.destroy');
        });
        Route::get('requests/{clientRequest}', [AdminRequestsController::class, 'show'])->name('requests.show');
        Route::get('new-requests', [AdminRequestsController::class, 'newRequests'])->name('requests.new.requests');
        Route::put('requests/{clientRequest}', [AdminRequestsController::class, 'update'])->name('requests.update');
    });
});

Route::group(['prefix' => '{lang}', 'middleware' => 'setLanguage'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get(trans('about'), [PageController::class, 'about'])->name('about');
    Route::get(trans('contact'), [PageController::class, 'contact'])->name('contact');
    Route::get(trans('privacy-policy'), [PageController::class, 'privacy'])->name('privacy');
    Route::view(trans('catalog'),'catalog')->name('catalog');
    Route::group(['prefix' => trans('categories')], function () {
        Route::get('{slug}', [SearchController::class, 'showFilteredProducts'])->name('show.filtered.products');
        Route::get('{slug}/{productSlug}', [ProductController::class, 'index'])->name('show.product');
    });
});
