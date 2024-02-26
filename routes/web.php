<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NametagController;

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

Route::get('/form', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    return view('opening');
})->name('opening');

Route::post('/nametag', [NametagController::class, 'process'])->name('nametag');
// Route::post('/nametag/process', [NametagController::class, 'process'])->name('nametag.process');
