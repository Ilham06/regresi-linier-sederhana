<?php

use App\Http\Controllers\DataController;
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

Route::get('/', [DataController::class, 'index'])->name('home');
Route::post('/store', [DataController::class, 'store'])->name('data.store');
Route::delete('/{id}', [DataController::class, 'destroy'])->name('data.destroy');
Route::post('/calculate', [DataController::class, 'calculate'])->name('data.calculate');
