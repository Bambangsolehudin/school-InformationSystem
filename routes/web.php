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

Route::get('/', 'SiteController@home');
Route::get('/register','SiteController@register');
Route::post('/postregister','SiteController@postregister');



//auth
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');




route::group(['middleware'=>['auth','CheckRole:admin']],function(){

// Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
Route::get('/siswa', 'SiswaController@index');
Route::post('/siswa/create', 'SiswaController@create');
Route::get('/siswa/{siswa}/edit', 'SiswaController@edit');
Route::post('/siswa/{id}/update', 'SiswaController@update');
Route::get('/siswa/{id}/delete', 'SiswaController@delete');	
Route::get('/siswa/{siswa}/profile', 'SiswaController@profile');
Route::post('/siswa/{id}/addnilai', 'SiswaController@addnilai');		
Route::get('/siswa/{id}/{idmapel}/deletenilai', 'SiswaController@deletenilai');
Route::get('/siswa/exportexcel', 'SiswaController@exportExcel');
Route::get('/siswa/exportpdf', 'SiswaController@exportPdf');
Route::get('/guru/{id}/profile','GuruController@profile');
Route::get('/posts','PostController@index')->name('posts.index');
Route::get('post/add', [
'uses' => 'PostController@add',
'as' => 'posts.add'
]);

Route::post('post/create', [
'uses' => 'PostController@create',
'as' => 'posts.create'
]);

});



route::group(['middleware'=>['auth','CheckRole:admin,siswa']],function(){
Route::get('/dashboard', 'DashboardController@index');
Route::get('profilesaya','SiswaController@profilesaya');
});

route::group(['middleware'=>['auth','CheckRole:siswa']],function(){

Route::get('profilesaya','SiswaController@profilesaya');
});

Route::get('/{slug}', [
'uses' => 'SiteController@singlepost',
'as' => 'site.single.post'
]);