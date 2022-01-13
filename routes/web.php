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

Route::prefix('guru')->middleware(['auth','guru'])->group(function(){
    Route::get('beranda', 'GuruController@beranda');
    
    Route::resource('kelas', 'GuruKelasController',  ['as'=> 'guru']);
    Route::resource('materi', 'GuruMateriController',  ['as'=> 'guru']);
    
});

Route::prefix('siswa')->middleware(['auth','siswa'])->group(function(){
    Route::get('beranda', 'SiswaController@beranda');
}); 


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
