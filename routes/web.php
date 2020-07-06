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
// Route::get('/iklans', function () {
//     return view('iklans');
// });
// Route::get('/', 'HomeController@index')->name('utama');

// HALAMAN UTAMA
Route::get('/utama', 'HomeController@index')->name('utama');
Route::get('/reset', function () {
    return view('auth/reset');
});
Route::get('/ubah', function () {
    return view('auth/ubah');
});

Route::get('/properties', 'HomeController@iklan')->name('properties');
Route::get('/propJKT', 'HomeController@jakarta')->name('propJKT');
Route::get('/propBDG', 'HomeController@bandung')->name('propBDG');
Route::get('/propDIY', 'HomeController@jogja')->name('propDIY');
Route::get('/propSMG', 'HomeController@semarang')->name('propSMG');
Route::post('/lihat/{id}', 'HomeController@lihat')->name('lihat');
Route::get('/lihatIklan/{id}', 'HomeController@lihatlah')->name('lihatlah');
Route::get('/properties1', function () {
    return view('hasil');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/input', function () {
    return view('input');
});

// LOGIN DAN REGISTER
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify','VerifyController@getVerify')->name('getverify');
Route::post('/verify','VerifyController@postVerify')->name('verify');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', function(){
        return view('home');
    })->name('home');

// DASHBOARD USER
Route::get('/dashboard', 'PropertiController@dash')->name('dashboard');
Route::get('/iklan', 'PropertiController@index');
Route::get('/grafik', 'PesananController@index');
Route::get('/pembelian', 'PesananController@pembelian');
Route::get('/penjualan', 'PesananController@penjualan');

Route::post('/kirim_bukti/{id}', 'PesananController@bukti')->name('kirim_bukti');
Route::post('/kirim_lagi', 'PesananController@kirimLagi')->name('kirim_lagi');

Route::post('/pesanan/{id}', 'HomeController@pesanan')->name('book');
Route::post('/batalkan/{id}', 'HomeController@hapusPesanan')->name('batalkan');
Route::post('/bayarFirst/{id}', 'PesananController@pembayaran')->name('pembayaran');
Route::post('/bayarLagi/{id}', 'PesananController@pembayaranLagi')->name('pembayaranLagi');

Route::get('/chatAdmin', function(){
    return view('customer/chatAdmin');
})->name('chatAdmin');
Route::get('/chatCustomer', function(){
    return view('customer/chatCustomer');
})->name('chatCustomer');
Route::get('/detailPenjualan', function(){
    return view('customer/detailPenjualan');
});
Route::get('/cek', 'UserController@profil');
Route::get('/editProfil/{user}', 'UserController@edit')->name('editProfil');
Route::post('ava', 'UserController@avatar');

Route::get('/detailPembelian/{id}', 'PesananController@detailPembelian')->name('detailPembelian');
Route::get('/detailPenjualan/{id}', 'PesananController@detailPenjualan')->name('detailPenjualan');
Route::post('/verifikasiPenjualan/{id}', 'PesananController@verifikasiPenjualan')->name('verifikasiPenjualan');
Route::post('/bayar/{id}', 'PesananController@bayar')->name('bayar');
Route::get('/invoice/{id}', 'PesananController@invoice')->name('invoice');

// TAMBAH IKLAN
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
Route::post('/remove-image', 'PropertiController@removeImage');


// DASHBOARD ADMIN;
Route::resource('admin','AdminController');
Route::get('/adminDash', 'AdminController@dash')->name('adminDash');
Route::get('/daftarUser', 'AdminController@user')->name('daftarUser');
Route::get('/detailUser/{id}', 'AdminController@detailUser')->name('detailUser');
Route::get('/daftarIklan', 'AdminController@daftarIklan');
Route::get('/daftarKategori', 'AdminController@kategori')->name('daftarKategori');

Route::get('/hargaTerendah', 'AdminController@iklanMurah');
Route::get('/hargaTertinggi', 'AdminController@iklanMahal');
Route::get('/iklanTerjual', 'AdminController@terjual');
Route::get('/belumTerjual', 'AdminController@belumTerjual');
Route::get('/iklanTerverifikasi', 'AdminController@terverifikasi');
Route::get('/belumTerverifikasi', 'AdminController@belumTerverifikasi');


    
Route::get('/iklan/cari', 'AdminController@cariIklan')->name('cariIklan');
Route::get('/user/cari', 'AdminController@cariUser')->name('cariUser');
Route::get('/transaksi/cari', 'AdminController@cariTransaksi')->name('cariTransaksi');

Route::get('/sembunyi/{id}', 'AdminController@sembunyikan')->name('sembunyi');
Route::get('/tampil/{id}', 'AdminController@tampilkan')->name('tampil');
Route::post('/update/{id}', 'AdminController@update')->name('update');
    
Route::post('/verifIklan/{id}', 'AdminController@verifIklan')->name('verifIklan');
Route::post('/batalVerif/{id}', 'AdminController@batalVerif')->name('batalVerif');
Route::post('/verifBayar/{id}', 'AdminController@verifBayar')->name('verifBayar');

Route::get('/daftarPembayaran', 'AdminController@transaksi');
Route::get('/detailPembayaran/{id}', 'AdminController@detailPembayaran')->name('detailPembayaran');

Route::get('/terendah', 'AdminController@terendah');
Route::get('/tertinggi', 'AdminController@tertinggi');
Route::get('/sudah_konf', 'AdminController@sudah_konf');
Route::get('/belum_konf', 'AdminController@belum_konf');

    
Route::get('/adminChat', function(){
    return view('admin/adminChat');
})->name('adminChat');
Route::get('/cusChat', function(){
    return view('admin/cusChat');
})->name('cusChat');
Route::get('/laporan', function(){
    return view('admin/laporan');
})->name('laporan');
});

    
Route::resource('prop','UserController');
Route::resource('iklan','PropertiController');
Route::resource('pesanan','PesananController');
    
Route::get('/upload', 'iklanController@CreateIklan');
Route::post('/upload', 'IklanController@PostIklan');

Route::get('/properti/cari', 'HomeController@cariUtama')->name('cariProp');
Route::get('/properti/filter', 'HomeController@filter')->name('filter');

Route::get('/properti/terendah', 'HomeController@terendah')->name('terendah');
Route::get('/properti/tertinggi', 'HomeController@tertinggi')->name('tertinggi');
