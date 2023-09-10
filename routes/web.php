<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterData\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('backend')->group(function () {
    Auth::routes();
    Route::get('/home', [HomeController::class, 'dashboard'])->name('home');
    Route::resource('users', UserController::class);
});
