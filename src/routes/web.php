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
Route::get('/confirm', [FormController::class, 'confirm']);
Route::get('/thanks', [FormController::class, 'thanks']);
Route::get('/admin', [FormController::class, 'admin']);
Route::get('/register', [FormController::class, 'register']);
Route::get('/login', [FormController::class, 'login']);