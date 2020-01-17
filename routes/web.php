<?php

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
    return view('utama');
});

Route::get('/utama', function () {
    return view('utama');
});
Route::get('/properties', function () {
    return view('properties');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/coba', function () {
    return view('coba');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify','VerifyController@getVerify')->name('getverify');
Route::post('/verify','VerifyController@postVerify')->name('verify');
Route::post('/verify','VerifyController@SendOTP')->name('send');

// Route::post('/login/custom', [
//     'uses' => 'LoginControl@login',
//     'as'   => 'login.custom'
// ]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', function(){
        return view('home');
    })->name('home');
    Route::get('/dashboard', function(){
        return view('customer/dashboard');
    })->name('dashboard');
    Route::get('/iklan', function(){
        return view('customer/iklan');
    })->name('iklan');
    Route::get('/grafik', function(){
        return view('customer/grafik');
    })->name('grafik');
    Route::get('/chatAdmin', function(){
        return view('customer/chatAdmin');
    })->name('chatAdmin');
    Route::get('/chatCustomer', function(){
        return view('customer/chatCustomer');
    })->name('chatCustomer');
    Route::get('/penjualan', function(){
        return view('customer/penjualan');
    })->name('penjualan');
    Route::get('/pembelian', function(){
        return view('customer/pembelian');
    })->name('pembelian');
});
