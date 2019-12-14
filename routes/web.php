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
    return view('auth/login');
});

Auth::routes();

$main_admin_route = function(){
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/entrimeja/create', 'AdminController@create');
    Route::post('/', 'AdminController@store');
    Route::get('/entrimeja/{order}/edit', 'AdminController@edit');
    Route::post('/entrimeja/{order}', 'AdminController@update');
    Route::delete('/entrimeja/{order}', 'AdminController@destroy');
    
    Route::get('/entribarang', 'Admin2Controller@index')->name('admin.ebarang');
    Route::get('/entribarang/create', 'Admin2Controller@create');
    Route::post('/entribarang', 'Admin2Controller@store');
    Route::get('/entribarang/{masakan}/edit', 'Admin2Controller@edit');
    Route::post('/entribarang/{masakan}', 'Admin2Controller@update');
    Route::delete('/entribarang/{masakan}', 'Admin2Controller@destroy');

};
Route::group(['middleware'=>'isAdmin', 'prefix'=>'admin'], $main_admin_route);

$main_waiter_route = function(){
    Route::get('/', 'WaiterController@index')->name('waiter');
    Route::get('/create', 'WaiterController@create');
    Route::post('/', 'WaiterController@store');
    Route::get('/{masakan}/edit', 'WaiterController@edit');
    Route::post('/{masakan}', 'WaiterController@update');
    Route::delete('/{masakan}', 'WaiterController@destroy');

    Route::get('/order', 'OrderController@index')->name('waiter.order');
    Route::get('/order/create', 'OrderController@create');
    Route::post('/order', 'OrderController@store');
    Route::get('/order/{order}/edit', 'OrderController@edit');
    Route::post('/order/{order}', 'OrderController@update');
    Route::delete('/order/{order}', 'OrderController@destroy');
};
Route::group(['middleware' => 'isWaiter', 'prefix'=>'waiter'], $main_waiter_route);

$main_kasir_route = function(){
    Route::get('/', 'KasirController@index')->name('kasir');
    Route::get('/create', 'KasirController@create');
    Route::post('/', 'KasirController@store');
    Route::get('/{transaksi}/edit', 'KasirController@edit');
    Route::post('/{transaksi}', 'KasirController@update');
    Route::delete('/{transaksi}', 'KasirController@destroy');
    Route::get('/cari', 'KasirController@cari');
};
Route::group(['middleware' => 'isKasir', 'prefix'=>'kasir'], $main_kasir_route);


Route::get('/owner', 'OwnerController@index')->name('owner')->middleware('isOwner');
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
// Route::get('/admin/eorder', 'AdminController@eorder')->name('admin.eorder');
// Route::get('/admin/etransaksi', 'AdminController@etransaksi')->name('admin.etransaksi');


// Route::get('/home', 'HomeController@index')->name('home');
