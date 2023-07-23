<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\AddressController@index')->name('home');

Route::get('/adicionar', 'App\Http\Controllers\AddressController@adicionar')->name('adicionar');

Route::get('/searchZip', 'App\Http\Controllers\AddressController@searchZip')->name('searchZip');


Route::post('/salvar', 'App\Http\Controllers\AddressController@salvar')->name('salvar');
