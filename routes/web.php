<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminRequestsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\App;
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

Route::group(['prefix' => '{lang}', 'middleware' => 'setLanguage'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get(trans('routes.catalog'), function () {
        return 'ciao';
    })->name('catalog');
    Route::group(['prefix' => trans('categories')], function() {
        Route::get('{slug}', [SearchController::class, 'showFilteredProducts'])->name('show.filtered.products');
        Route::get('{slug}/{productSlug}', [ProductController::class, 'index'])->name('show.product');    
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Auth::routes();
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::resource('products', AdminProductController::class);
        Route::resource('categories', AdminCategoryController::class)->except(['show']);
        Route::resource('requests', AdminRequestsController::class)->except(['show', 'update', 'edit']);
        Route::get('requests/{clientRequest}', [AdminRequestsController::class, 'show'])->name('requests.show');
        Route::get('new-requests', [AdminRequestsController::class, 'newRequests'])->name('requests.new.requests');
        Route::put('requests/{clientRequest}', [AdminRequestsController::class, 'update'])->name('requests.update');
    });
});
