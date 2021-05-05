<?php

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

Route::group(['prefix'=>'{lang}', 'middleware'=>'setLanguage'], function() {

    Route::get('/', function () {
        return view('index');
    })->name('home');

});

Route::group(['prefix'=>'admin'], function() {
    Auth::routes();
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
