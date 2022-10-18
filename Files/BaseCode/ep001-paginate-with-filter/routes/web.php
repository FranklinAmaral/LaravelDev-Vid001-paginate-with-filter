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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('client',  App\Http\Controllers\ClientController::class);
Route::post('client',  [App\Http\Controllers\ClientController::class, 'index'])->name('client.index');
Route::get('clients/clear-filter',  [App\Http\Controllers\ClientController::class, 'clearFilter'])->name('client.clear.filter');