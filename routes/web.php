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

// Route::get('/', function () {
//     return view('utama');
// });
Route::get('/', 'HomeController@index')->name('utama');
Route::get('/utama', 'HomeController@index')->name('utama');
Route::get('/reset', function () {
    return view('auth/reset');
});
Route::get('/ubah', function () {
    return view('auth/ubah');
});

// Route::get('/utama', function () {
//     return view('utama');
// });
// Route::get('/properties', function () {
//     return view('properties');
// });
Route::get('/properties', 'HomeController@iklan')->name('properties');
Route::get('/lihat/{id}', 'HomeController@lihat')->name('lihat');
Route::get('/properties1', function () {
    return view('hasil');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/iklans', function () {
    return view('iklans');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/input', function () {
    return view('input');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify','VerifyController@getVerify')->name('getverify');
Route::post('/verify','VerifyController@postVerify')->name('verify');

// Route::post('/login/custom', [
//     'uses' => 'LoginControl@login',
//     'as'   => 'login.custom'
// ]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', function(){
        return view('home');
    })->name('home');

// Dashboard Customer
    // Route::get('/dashboard', function(){
    //     return view('customer/dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', 'PropertiController@dash')->name('dashboard');
    // Route::get('/iklan', function(){
    //     return view('customer/iklan');
    // })->name('iklan');
    Route::get('/grafik', function(){
        return view('customer/grafik');
    });
    Route::get('/pesanan', function(){
        return view('customer/detailPesanan');
    });
    Route::get('/beli', function(){
        return view('customer/detailPembelian');
    });
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
    Route::get('/detailPenjualan', function(){
        return view('customer/detailPenjualan');
    });
    // Route::get('/tambah1', function(){
    //     return view('customer/tambah1');
    // })->name('tambah1');
    // Route::get('/tambah2', function(){
    //     return view('customer/tambah2');
    // })->name('tambah2');
    // Route::get('/tambah3', function(){
    //     return view('customer/tambah3');
    // })->name('tambah3');
    // Route::get('/tambah4', function(){
    //     return view('customer/tambah4');
    // })->name('tambah4');
    Route::get('/tambah5', function(){
        return view('customer/tambah5');
    })->name('tambah5');
    // Route::get('/profile', function(){
    //     return view('customer/profile');
    // })->name('profile');
    // Route::get('/editProfile', function(){
    //     return view('customer/editProfile');
    // })->name('editProfile');
    Route::get('/cek', 'UserController@profil');
    Route::get('/editProfil/{user}', 'UserController@edit')->name('editProfil');
    Route::post('ava', 'UserController@avatar');
    Route::post('foto', 'PropertiController@foto');

// Dashboard Admin
    // Route::get('/adminDash', function(){
    //     return view('admin/adminDash');
    // })->name('adminDash');
    Route::resource('admin','AdminController');
    Route::get('/adminDash', 'AdminController@dash')->name('adminDash');
    Route::get('/daftarUser', 'AdminController@user')->name('daftarUser');
    Route::get('/daftarIklan', 'AdminController@daftarIklan');
    Route::get('/detailUser/{id}', 'AdminController@detailUser')->name('detailUser');
    // Route::get('/daftarUser', function(){
    //     return view('admin/daftarUser');
    // })->name('daftarUser');
    // Route::get('/daftarIklan', function(){
    //     return view('admin/daftarIklan');
    // })->name('daftarIklan');
    Route::get('/adminChat', function(){
        return view('admin/adminChat');
    })->name('adminChat');
    Route::get('/cusChat', function(){
        return view('admin/cusChat');
    })->name('cusChat');
    // Route::get('/daftarKategori', function(){
    //     return view('admin/daftarKategori');
    // })->name('daftarKategori');
    Route::get('/daftarKategori', 'AdminController@kategori')->name('daftarKategori');
    Route::get('/daftarPembayaran', function(){
        return view('admin/daftarPembayaran');
    })->name('daftarPembayaran');
    Route::get('/detailPembayaran', function(){
        return view('admin/detailPembayaran');
    })->name('detailPembayaran');
    Route::get('/laporan', function(){
        return view('admin/laporan');
    })->name('laporan');
    });
//Properti
    // Route::post('/step1', 'PropertiController@step1')->name('step1');
    // Route::post('/step2', 'PropertiController@step2')->name('step2');
    // Route::resource('properti', 'PropertiController');

    Route::get('/properti1', 'PropertiController@createStep1');
    Route::post('/properti1', 'PropertiController@PostcreateStep1');
    Route::get('/properti2', 'PropertiController@createStep2');
    Route::post('/properti2', 'PropertiController@PostcreateStep2');
    Route::get('/properti3', 'PropertiController@createStep3');
    Route::post('/properti3', 'PropertiController@PostcreateStep3');
    Route::get('/properti4', 'PropertiController@createStep4');
    Route::post('/properti4', 'PropertiController@PostcreateStep4');
    Route::get('/properti5', 'PropertiController@CreateIklan');
    Route::post('/properti5', 'IklanController@PostIklan');
    // Route::get('/properti5', 'PropertiController@createStep5');
    // Route::post('/properti5', 'PropertiController@PostcreateStep5');
    Route::post('/remove-image', 'PropertiController@removeImage');
    Route::post('/store1', 'PropertiController@store');
    Route::get('/iklan', 'PropertiController@index');
    // Route::get('/edit/{id}', 'PropertiController@edit')->name('edit');
    // Route::get('/show/{id}', 'PropertiController@show')->name('show');
    Route::resource('prop','UserController');
    Route::resource('iklan','PropertiController');

    Route::get('/upload', 'iklanController@CreateIklan');
    Route::post('/upload', 'IklanController@PostIklan');
    Route::post('/pesanan/{id}', 'HomeController@pesanan')->name('pesanan');
