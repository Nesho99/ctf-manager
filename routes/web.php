<?php

use App\Http\Controllers\ZadatakController;
use App\Models\Natjecanje;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NatjecanjeControler;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('natjecanje', NatjecanjeControler::class);
Route::resource('natjecanje.zadatak',ZadatakController::class);
