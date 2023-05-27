<?php

use App\Http\Controllers\StockServiceController;
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
Route::get('/', [StockServiceController::class, 'index'])->name('form.index');
Route::post('quotes', [StockServiceController::class, 'quotes'])->name('form.quotes');
