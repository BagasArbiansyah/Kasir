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
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/entrimeja/create', 'Admin\AdminController@create');
    Route::post('/', 'Admin\AdminController@store');
    Route::get('/entrimeja/{order}/edit', 'Admin\AdminController@edit');
    Route::post('/entrimeja/{order}', 'Admin\AdminController@update');
    Route::delete('/entrimeja/{order}', 'Admin\AdminController@destroy');
    
    Route::get('/entribarang', 'Admin\Admin2Controller@index')->name('admin.ebarang');
    Route::get('/entribarang/create', 'Admin\Admin2Controller@create');
    Route::post('/entribarang', 'Admin\Admin2Controller@store');
    Route::get('/entribarang/{masakan}/edit', 'Admin\Admin2Controller@edit');
    Route::post('/entribarang/{masakan}', 'Admin\Admin2Controller@update');
    Route::delete('/entribarang/{masakan}', 'Admin\Admin2Controller@destroy');

};
Route::group(['middleware'=>'isAdmin', 'prefix'=>'admin'], $main_admin_route);

$main_waiter_route = function(){
    //waiter order
    Route::get('/', 'Waiter\WaiterController@index')->name('waiter');
    Route::get('/create', 'Waiter\WaiterController@create');
    Route::post('/', 'Waiter\WaiterController@store');
    Route::get('/{id}/edit', 'Waiter\WaiterController@edit');
    Route::put('/{id}', 'Waiter\WaiterController@update');
    Route::get('/{id}', 'Waiter\WaiterController@destroy');
};
Route::group(['middleware' => 'isWaiter', 'prefix'=>'waiter'], $main_waiter_route);

$main_kasir_route = function(){
    Route::get('/', 'Kasir\KasirController@index')->name('kasir');
    Route::get('/create', 'Kasir\KasirController@create');
    Route::post('/', 'Kasir\KasirController@store');
    Route::get('/{id_transaksi}/edit', 'Kasir\KasirController@edit');
    Route::any('/{id_transaksi}', 'Kasir\KasirController@update');
    Route::delete('/{id_transaksi}', 'Kasir\KasirController@destroy');
    Route::get('get/details/{id_detail_order}', 'Kasir\KasirController@getDetails')->name('getDetails');
    Route::get('/json/kasir', 'Kasir\KasirController@jsonKasir')->name('json/kasir');
};
Route::group(['middleware' => 'isKasir', 'prefix'=>'kasir'], $main_kasir_route);

$main_owner_route = function(){
    Route::get('/', 'Owner\OwnerController@index')->name('owner');
    Route::get('/json/owner', 'Owner\OwnerController@jsonOwner')->name('json/owner');
    Route::get('/export_excel', 'Owner\OwnerController@export_excel');
    Route::get('/export_excelview', 'Owner\OwnerController@export_excelview');
};
Route::group(['middleware' => 'isOwner', 'prefix'=>'owner'], $main_owner_route);

// Route::get('my-web', ['middleware' => ['checkIp'], function () {
//     return view('test');
// }]);

Auth::routes();
