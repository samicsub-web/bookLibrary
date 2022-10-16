<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Book\RequestController;



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
    return view('auth.login');
});

Route::controller(CustomAuthController::class)->group(function(){
    Route::get('dashboard', 'dashboard')->name('admin.dasboard'); 
    Route::get('user-dashboard', 'userdashboard')->name('user.dasboard'); 
    Route::get('login', 'index')->name('login');
    Route::post('custom-login', 'customLogin')->name('login.custom'); 
    Route::get('registration', 'registration')->name('register-user');
    Route::post('custom-registration', 'customRegistration')->name('register.custom'); 
    Route::get('signout', 'signOut')->name('signout');
});

Route::controller(BookController::class)->group(function(){
    Route::get('book', 'index')->name('admin.book'); 
    Route::get('delete/{id}', 'destroy')->name('admin.book.delete'); 
    Route::get('edit/{id}', 'show')->name('admin.book.edit'); 
    Route::get('add-book', 'create')->name('admin.book.create'); 
    Route::post('store-book', 'store')->name('admin.book.store'); 
    Route::post('update-book/{id}', 'update')->name('admin.book.update'); 
    Route::get('user-book-list', 'user_book_list')->name('user.book.list'); 
});

Route::controller(RequestController::class)->group(function(){
    Route::get('request', 'index')->name('admin.request');
    Route::get('request-detail/{id}', 'show')->name('admin.request.detail');
    Route::get('request-approve/{id}', 'approve')->name('admin.request.approve');
    Route::get('request-decline/{id}', 'decline')->name('admin.request.decline');
    
    // user
    Route::get('request-list', 'user_request')->name('user.request'); 
    Route::get('create-request/{id}', 'store')->name('user.book.request'); 
    
});

