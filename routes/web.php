<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Auth::routes(["register"=>false]);

Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/statistices',[App\Http\Controllers\StatisticesController::class,'statistices'])->name('statistices');
    Route::resource('drug',App\Http\Controllers\DrugController::class);
    // Route::resource('alternative_drug',App\Http\Controllers\AlternativeDrugController::class);
    Route::get('/search',[App\Http\Controllers\SearchController::class , 'search'])->name('search');
    Route::post('/filter',[App\Http\Controllers\SearchController::class , 'search'])->name('filter');
    Route::get('/cart',[\App\Http\Controllers\CartController::class,'index']);
    Route::get('/receipt',[\App\Http\Controllers\CartController::class,'receipt']);
});

Route::group(['middleware'=>['auth','can:show admins section','can:show super admins section']],function(){
    Route::resource('admin',App\Http\Controllers\AdminController::class);
    Route::resource('super_admin',App\Http\Controllers\SuperAdminController::class);
});



