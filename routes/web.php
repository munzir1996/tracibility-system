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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/get/organizations/{permission}', 'OrganizationController@getOrganization')->name('organization.get');

Route::resource('/users', 'UserController');
Route::resource('/organizations', 'OrganizationController');


// Route::get('/home', 'HomeController@index')->name('home');
