<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportPdfController;
use App\Http\Controllers\FileUploadController;

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

Route::get('doc', [ExportPdfController::class, 'index']);


Route::get('file-upload', [ FileUploadController::class, 'fileUpload' ]);
Route::post('file-upload', [ FileUploadController::class, 'fileUploadPost' ]);
