<?php

use App\Events\PedidoStatusChanged;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/fire', function () {
    event(new PedidoStatusChanged);

    return 'Fired';
});

Auth::routes();

// User Routes
Route::middleware('auth')->group(function () {
    Route::get('/pedidos', 'UserPedidosController@index')->name('user.pedidos');
    Route::get('/pedidos/create', 'UserPedidosController@create')->name('user.pedidos.create');
    Route::post('/pedidos', 'UserPedidosController@store')->name('user.pedidos.store');
    Route::get('/pedidos/{pedido}', 'UserPedidosController@show')->name('user.pedidos.show');
});

// Admin Routes - Make sure you implement an auth layer here
Route::prefix('admin')->group(function () {
    Route::get('/pedidos', 'AdminPedidosController@index')->name('admin.pedidos');
    Route::get('/pedidos/edit/{pedido}', 'AdminPedidosController@edit')->name('admin.pedidos.edit');
    Route::patch('/pedidos/{pedidos}', 'AdminPedidosController@update')->name('admin.pedidos.update');
});

Route::redirect('/admin', '/admin/pedidos');