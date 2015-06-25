<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'AppController@home');

// App installation
Route::get('/install', 'AppController@install');
Route::get('/uninstall', 'AppController@uninstall');
Route::get('/cancel', 'AppController@cancel');

// Orders
Route::get('orders', 'OrderController@index');
Route::get('orders/{id}', 'OrderController@show');

// Webhooks
Route::controller('webhooks', 'WebhookController');

// Integration with SEOshop
Route::post('/shipment_methods', 'ShipmentsController@index');

// Authenticated routes
Route::group(['middleware' => ['auth']], function()
{
    Route::get('/setup', 'AppController@setup');
    Route::get('/dashboard', 'AppController@dashboard');
    Route::get('/logout', 'AppController@logout');
});
