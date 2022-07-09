<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddController;


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

Route::get('/new-deals', [AddController::class, 'show_new_deals'])->name('new-deals');
Route::get('/add/{id}', [AddController::class, 'add_new_deals'])->name('add');

