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
/*
*/



Route::get('/', function () {
    return view('auth.login');
});
Route::get('/logout', function () {
    Auth::logout();
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', 'AdminPageController@index')->name('admin.dashboard');
});

Route::prefix('/dosen')->middleware(['auth', 'dosen'])->group(function () {
    Route::get('dashboard', 'DosenPageController@index')->name('dosen.dashboard');
});

Route::prefix('/mahasiswa')->middleware(['auth', 'mahasiswa'])->group(function () {
    Route::get('dashboard', 'MahasiswaPageController@index')->name('mahasiswa.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('surat-masuk', 'PageController@suratMasuk')->name('surat.masuk');
});










// Route::get('/', 'HomeController@index');
/*
Route::get('/user', 'UserController@index');
Route::get('/user-register', 'UserController@create');
Route::post('/user-register', 'UserController@store');
Route::get('/user-edit/{id}', 'UserController@edit');
*/
// Route::resource('user', 'UserController');

// Route::resource('buku', 'BukuController');
// Route::post('filter/custom', 'BukuController@custom')->name('filter.custom');
// Route::post('filter/', 'BukuController@filter')->name('filter');
// Route::get('buku/filter/{name}', 'BukuController@filterName')->name('filter.name');
// Route::get('/export/{type}', 'LaporanController@export')->name('export.excel');
// Route::get('/exportDoc/{type}', 'LaporanController@exportDoc')->name('export.doc');
// Route::get('/exportDoc/{from}/{to}', 'LaporanController@exportDocCustom')->name('export.doc.custom');

// Route::get('/laporan/mingguan', 'LaporanController@minggu')->name('laporan.minggu');
// Route::get('/laporan/bulanan', 'LaporanController@bulan')->name('laporan.bulan');
// Route::get('/laporan/tahunan', 'LaporanController@tahun')->name('laporan.tahun');


