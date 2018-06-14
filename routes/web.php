<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return redirect()->route('login');
});
Route::prefix('customers')->group(function () {
    Route::get('new', 'CustomersController@create')->name('customer.add');
    Route::get('all', 'CustomersController@index')->name('customers.show');
    Route::get('edit/{customer}', 'CustomersController@edit')->name('customers.edit');
    Route::post('save', 'CustomersController@store')->name('customers.save');
    Route::post('update/{customer}', 'CustomersController@update')->name('customers.update');
    Route::get('delete/{customer}', 'CustomersController@destroy')->name('customers.delete');
    Route::get('{customer}', 'CustomersController@show')->name('customers.one');
});
Route::prefix('api')->group(function () {
    Route::get('agents', 'AgentsController@getAgents');
    Route::get('products', 'ProductsController@getProducts');
});

Route::prefix('agents')->group(function () {
    Route::get('new', 'AgentsController@create')->name('agents.new');
    Route::get('all', 'AgentsController@index')->name('agents.show');
    Route::get('edit/{agent}', 'AgentsController@edit')->name('agents.edit');
    Route::post('save', 'AgentsController@store')->name('agents.save');
    Route::post('update/{agent}', 'AgentsController@update')->name('agents.update');
    Route::get('delete/{agent}', 'AgentsController@destroy')->name('agents.delete');
    Route::get('{agent}', 'AgentsController@show')->name('agents.one');
});

Route::prefix('products')->group(function () {
    Route::get('new', 'ProductsController@create')->name('product.add');
    Route::get('all', 'ProductsController@index')->name('products.show');
    Route::get('edit/{product}', 'ProductsController@edit')->name('products.edit');
    Route::post('save', 'ProductsController@store')->name('products.save');
    Route::post('update/{product}', 'ProductsController@update')->name('products.update');
    Route::get('delete/{product}', 'ProductsController@destroy')->name('products.delete');
    Route::get('{product}', 'ProductsController@show')->name('products.one');
});

Route::prefix('services')->group(function () {
    Route::get('new', 'ServicesController@create')->name('service.add');
    Route::get('all', 'ServicesController@index')->name('services.show');
    Route::get('edit/{service}', 'ServicesController@edit')->name('services.edit');
    Route::post('save', 'ServicesController@store')->name('services.save');
    Route::post('update/{service}', 'ServicesController@update')->name('services.update');
    Route::get('delete/{service}', 'ServicesController@destroy')->name('services.delete');
    Route::get('{service}', 'ServicesController@show')->name('services.one');
});

Route::prefix('transactions')->group(function () {
    Route::get('/', 'TransactionsController@index')->name('transactions.view');
    Route::get('export', 'TransactionsController@export')->name('transactions.export');
});
