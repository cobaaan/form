<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [FormController::class, 'contact']);
Route::post('/', [FormController::class, 'contact']);
Route::post('/confirm', [FormController::class, 'confirm']);
Route::post('/thanks', [FormController::class, 'thanks']);

Route::get('/admin', [FormController::class, 'admin']);
Route::post('/admin', [FormController::class, 'admin']);
Route::post('/admin/close', [FormController::class, 'admin']);
Route::post('/admin/delete', [FormController::class, 'adminDelete']);
Route::post('/admin/search', [FormController::class, 'adminSearch']);
Route::get('/admin/search', [FormController::class, 'adminSearch']);

Route::post('/postCSV', [FormController::class, 'postCSV']);

Route::post('/modal', [FormController::class, 'modal']);