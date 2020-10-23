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
    Route::get('operation/shipping', 'OperationController@shipping')->name('operation.shipping');
    Route::delete('operation/shipping/{cteshipping}', 'OperationController@deleteShipping')->name('operation.shipping.delete');

    Route::get('operation/receiving', 'OperationController@receiving')->name('operation.receiving');
    Route::get('operation/receiving/selling/{ctereceiving}', 'OperationController@selling')->name('operation.receiving.selling');
    Route::delete('operation/receiving/{ctereceiving}', 'OperationController@deleteReceiving')->name('operation.receiving.delete');


    Route::resource('/users', 'UserController');

    Route::get('get/organizations/{permission}', 'OrganizationController@getOrganization')->name('organization.get');
    Route::resource('organizations', 'OrganizationController');
    Route::get('organization/qrcode/{organization}', 'OrganizationQrcodeController@show')->name('organization.qrcode');
    Route::get('organization/qrcode/selling/{cteReceiving}', 'OrganizationQrcodeController@selling')->name('organization.qrcode.selling');

    Route::resource('cteharvests', 'CteHarvestController');
    Route::get('harvest/qrcode/{code}', 'HarvestQrcodeController@show')->name('harvest.qrcodes.show');
    Route::get('harvest/qrcode/reject/{harvestQrcode}', 'HarvestQrcodeController@reject')->name('harvest.qrcodes.reject');
    Route::put('harvest/qrcode/accept/{harvestQrcode}', 'HarvestQrcodeController@accept')->name('harvest.qrcodes.accept');

    Route::resource('cteagents', 'CteAgentController');
    Route::get('manafacture/qrcode/{code}', 'ManafactureQrcodeController@show')->name('manafacture.qrcodes.show');
    Route::post('manafacture/qrcode/shippings/{cteAgent}', 'ManafactureQrcodeController@store')->name('manafacture.qrcodes.store');

    Route::resource('cteshippings', 'CteShippingController');
    Route::get('shipping/qrcode/{code}', 'ShippingQrcodeController@show')->name('shipping.qrcodes.show');
    Route::get('shipping/qrcode/accept/transport/{code}', 'ShippingQrcodeController@acceptTransport')->name('shipping.qrcodes.accept.transport');
    Route::get('shipping/qrcode/reject/transport/{code}', 'ShippingQrcodeController@rejectTransport')->name('shipping.qrcodes.reject.transport');
    Route::get('shipping/qrcode/accept/receive/{code}', 'ShippingQrcodeController@acceptReceive')->name('shipping.qrcodes.accept.receive');
    Route::get('shipping/qrcode/reject/receive/{code}', 'ShippingQrcodeController@rejectReceive')->name('shipping.qrcodes.reject.receive');

    Route::resource('transports', 'TransportController');

    Route::resource('consumers', 'ConsumerController');
    Route::get('selling/qrcode/{code}', 'SellingQrcodeController@show')->name('selling.qrcodes.show');
    Route::put('selling/qrcode/{cteReceiving}/{code}', 'SellingQrcodeController@sell')->name('selling.qrcodes.sell');

    Route::resource('ctereceivings', 'CteReceivingController');

});



// Route::get('/home', 'HomeController@index')->name('home');




