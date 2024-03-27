<?php

use App\Http\Controllers\ClientController;
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

//Route::get('clients/{client}/edit', 'ClientController@editForm')->name('clients.editForm');
Route::resource('clients', ClientController::class);
Route::get('clients/{client}/data', 'ClientController@getClientData')->name('clients.getData');


