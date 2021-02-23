<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsuranceController;

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

Route::get('/doc', [InsuranceController::class, 'index']);
Route::post('/generate-pdf', [PDFController::class, 'generatePdfDoc']);
