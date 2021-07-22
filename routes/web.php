<?php

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

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/semua-berita', 'BeritaController@index')
    ->name('semua-berita');
Route::get('/berita/detail/{slug}', 'BeritaController@detail')
    ->name('detail-berita');
Route::get('/berita/kategori-berita/filter/{kategori}', 'BeritaController@filterByKategori')
    ->name('kategori-berita');

Route::get('/semua-lowongan', 'LowonganPekerjaanController@index')
    ->name('semua-lowongan');
Route::get('/lowongan-pekerjaan/detail/{slug}', 'LowonganPekerjaanController@detail')
    ->name('detail-lowongan');
Route::get('/lowongan-pekerjaan/cari/', 'LowonganPekerjaanController@cariLoker')
    ->name('cari-lowongan');
Route::get('/lowongan-pekerjaan/filter/lokasi/{lokasi_detail_lowongan}', 'LowonganPekerjaanController@filterLoker')
    ->name('kategori-lowongan');
Route::get('/lowongan-pekerjaan/filter/perusahaan/{perusahaan_id}', 'LowonganPekerjaanController@filterLokerPerusahaan')
    ->name('kategori-nama-lowongan');

Route::get('/galeri-kegiatan-layanan-karir', 'GaleriKegiatanController@index')
    ->name('galeri-kegiatan');
Route::get('/galeri-kegiatan-layanan-karir/detail/{slug}', 'GaleriKegiatanController@detail')
    ->name('detail-galeri');

Route::get('/tentang-layanan-karir', 'TentangLayananKarirController@index')
    ->name('tentang-layanan-karir');
    
Route::post('/isi-kuisioner-kirim', 'TracerStudyController@storeQuiz')
    ->name('isi-kuisioner-kirim.storeQuiz');
Route::get('/isi-kuisioner', 'TracerStudyController@index')
    ->name('isi-kuisioner');

Route::get('/page-ini-tidak-ditemukan', 'HomeController@halamaKosong')
    ->name('tidak-ada-halaman');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function(){

        Route::get('/', 'DashboardController@index')
        ->name('dashboard');

        Route::resource('berita', 'BeritaController');
        Route::resource('kategori-berita', 'KategoriBeritaController');

        Route::resource('perusahaan', 'PerusahaanController');
        Route::resource('sosmed', 'SosmedController');
        Route::resource('loker', 'LokerController');

        Route::resource('kuisioner', 'KuisionerController');
        Route::resource('jawaban-kuisioner', 'JawabanKuisionerController');

        Route::resource('tentang-layanan-karir', 'TentangLayananKarirController');
       
        Route::resource('galeri-kegiatan', 'GaleriKegiatanController');

        Route::resource('respon-mahasiswa', 'ResponMahasiswaTracerStudyController');
        Route::get('/print-all-mahasiswa', 'ResponMahasiswaTracerStudyController@print')
                    ->name('print-all-mhs.print');

        Route::resource('respon-kuisioner', 'ResponKuisionerTracerStudyController');
    
    });
Auth::routes(['verify' => true]);