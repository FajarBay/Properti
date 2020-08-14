<?php
use App\Kategori;
use App\Mail\NotifyMail;
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
Route::get('/email', function () {
    return new Notifymail();
});
Route::get('/', 'HomeController@index')->name('utama');

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
// Route::get('/lihatIklan/{id}', 'HomeController@lihatlah')->name('lihatlah');
Route::get('/properties1', function () {
    return view('hasil');
});
Route::get('/about', function () {
    $kat = Kategori::where('aktif', '1')->get();
    return view('about', compact('kat'));
});

Route::get('/contact', function () {
    $kat = Kategori::where('aktif', '1')->get();
    return view('contact', compact('kat'));
});

// Route::get('/input', function () {
//     return view('input');
// });

// LOGIN DAN REGISTER
Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify','VerifyController@getVerify')->name('getverify');
Route::post('/verify','VerifyController@postVerify')->name('verify');

Route::get('/properti/cari', 'HomeController@cariUtama')->name('cariProp');
Route::get('/properti/filter', 'HomeController@filter')->name('filter');

Route::get('/properti/terendah', 'HomeController@terendah')->name('terendah');
Route::get('/properti/tertinggi', 'HomeController@tertinggi')->name('tertinggi');

Route::group(['middleware' => ['auth']], function(){
    // Route::get('/home', function(){
    //     return view('home');
    // })->name('home');


// DASHBOARD USER
Route::get('/dashboard', 'PropertiController@dash')->name('dashboard');
Route::get('/iklan', 'PropertiController@index');
Route::get('/pesanan', 'PesananController@index');
Route::get('/pembelian', 'PesananController@pembelian');
Route::get('/penjualan', 'PesananController@penjualan');
Route::get('/pengembalian', 'TransaksiController@refund');

Route::post('/kirim_bukti/{id}', 'PesananController@bukti')->name('kirim_bukti');
Route::post('/kirim_refund/{id}', 'TransaksiController@kirim_refund')->name('kirim_refund');
Route::post('/kirim_lagi', 'PesananController@kirimLagi')->name('kirim_lagi');

Route::get('/chatAdmin', function(){
    return view('customer/chatAdmin');
})->name('chatAdmin');
Route::get('/chatCustomer', function(){
    return view('customer/chatCustomer');
})->name('chatCustomer');

Route::post('/pesanan/{id}', 'HomeController@pesanan')->name('book');
Route::get('/terdahului/{id}', 'PesananController@show1')->name('show1');
Route::post('/batalkan/{id}', 'HomeController@hapusPesanan')->name('batalkan');
Route::post('/bayarFirst/{id}', 'PesananController@pembayaran')->name('pembayaran');
Route::post('/pengembalian/{id}', 'TransaksiController@pengembalian')->name('refund');
Route::post('/bayarLagi/{id}', 'PesananController@pembayaranLagi')->name('pembayaranLagi');
Route::post('/kirimKlaim/{id}', 'TransaksiController@pengembalianLagi')->name('pengembalianLagi');

Route::get('/cek', 'UserController@profil');
Route::get('/editProfil/{user}', 'UserController@edit')->name('editProfil');
Route::post('ava', 'UserController@avatar');

Route::get('/detailPembelian/{id}', 'PesananController@detailPembelian')->name('detailPembelian');
Route::get('/detailPenjualan/{id}', 'PesananController@detailPenjualan')->name('detailPenjualan');
Route::get('/detailPengembalian/{id}', 'TransaksiController@detailPengembalian')->name('detailPengembalian');
Route::post('/verifikasiPenjualan/{id}', 'PesananController@verifikasiPenjualan')->name('verifikasiPenjualan');
// Route::post('/bayar/{id}', 'PesananController@bayar')->name('bayar');
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

Route::get('/lihat_invoice/{id}', 'AdminController@invoice_lihat')->name('Lihatinvoice');


    
Route::get('/iklan/cari', 'AdminController@cariIklan')->name('cariIklan');
Route::get('/user/cari', 'AdminController@cariUser')->name('cariUser');
Route::get('/transaksi/cari', 'AdminController@cariTransaksi')->name('cariTransaksi');
Route::get('/pengembalian/cari', 'AdminController@cariPengembalian')->name('cariPengembalian');

Route::get('/sembunyi/{id}', 'AdminController@sembunyikan')->name('sembunyi');
Route::get('/tampil/{id}', 'AdminController@tampilkan')->name('tampil');
Route::post('/update/{id}', 'AdminController@update')->name('update');
    
Route::post('/verifIklan/{id}', 'AdminController@verifIklan')->name('verifIklan');
Route::post('/batalVerif/{id}', 'AdminController@batalVerif')->name('batalVerif');
Route::post('/verifBayar/{id}', 'AdminController@verifBayar')->name('verifBayar');
Route::post('/verifBatal/{id}', 'AdminController@verifBatal')->name('verifBatal');

Route::get('/daftarPembayaran', 'AdminController@transaksi');
Route::get('/detailPembayaran/{id}', 'AdminController@detailPembayaran')->name('detailPembayaran');

Route::get('/daftarPengembalian', 'AdminController@daftarPengembalian');
Route::get('/detailRefund/{id}', 'AdminController@detailRefund')->name('detailRefund');
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


    
Route::resource('prop','UserController');
Route::resource('iklan','PropertiController');
Route::resource('pesanan','PesananController');
    
Route::get('/upload', 'iklanController@CreateIklan');
Route::post('/upload', 'IklanController@PostIklan');

// PESAN
Route::get('/userlist', 'MessageController@user_list')->name('user.list');
Route::get('/adminlist', 'MessageController@admin_list')->name('admin.list');
Route::get('usermessage/{id}', 'MessageController@user_message')->name('user.message');
Route::post('sendmessage', 'MessageController@send_message')->name('user.message.send');
Route::post('pesanAdmin', 'MessageController@pesan_admin')->name('pesanAdmin');
Route::post('pesanPertama', 'MessageController@pesan_pertama')->name('pesanPertama');
});