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
Auth::routes();

Route::get('/', 'WisataController@wisata')->name('wisataku');
/*Route::get('/isi_postingan', function(){
    return view('tampilan_web.isi_postingan');
});
*/
Route::get('/{slug}', 'WisataController@isi_post')->name('post.isi_postingan');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard/das', 'HomeController@index')->name('dashboard');
    Route::get('/post/tampilkan_post_terhapus', 'PostController@tampilkan_post_terhapus')->name('post.tampilkan_post_terhapus');
    Route::get('/post/restore_post/{id}', 'PostController@restore_post')->name('post.restore_post');
    Route::delete('/post/hapus_permanen/{id}', 'PostController@hapus_permanen')->name('post.hapus_permanen');
    Route::resource('dashboard/category', 'CategoryController');
    Route::resource('dashboard/tag', 'TagController');
    Route::resource('dashboard/post', 'PostController');
    Route::resource('dashboard/user', 'UserController');
});




