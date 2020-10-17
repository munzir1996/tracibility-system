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


Route::prefix('/')->middleware('auth')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('/users', 'UserController');

    Route::get('get/organizations/{permission}', 'OrganizationController@getOrganization')->name('organization.get');
    Route::resource('organizations', 'OrganizationController');

    Route::resource('cteharvests', 'CteHarvestController');
    Route::get('harvest/qrcode/{code}', 'HarvestQrcodeController@show')->name('harvest.qrcodes.show');
    Route::get('harvest/qrcode/reject/{harvestQrcode}', 'HarvestQrcodeController@reject')->name('harvest.qrcodes.reject');
    Route::put('harvest/qrcode/accept/{harvestQrcode}', 'HarvestQrcodeController@accept')->name('harvest.qrcodes.accept');

    Route::resource('cteagents', 'CteAgentController');
    Route::get('manafacture/qrcode/{code}', 'ManafactureQrcodeController@show')->name('manafacture.qrcodes.show');
    Route::post('manafacture/qrcode/shippings/{cteAgent}', 'ManafactureQrcodeController@store')->name('manafacture.qrcodes.store');

    Route::resource('imports', 'ImportController');

    // Route::post('cteshippings/{cteAgent}', 'CteShippingController@store')->name('cteshippings.store');
    Route::resource('cteshippings', 'CteShippingController');
    Route::get('shipping/qrcode/{code}', 'ShippingQrcodeController@show')->name('shipping.qrcodes.show');

    Route::resource('transports', 'TransportController');

});



// Route::get('/home', 'HomeController@index')->name('home');


