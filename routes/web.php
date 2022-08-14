<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;

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
    return view('home');
});

Route::get('login', [User\Login::class, 'index'])->name('login');
Route::post('login/verify', [User\Login::class, 'verify'])->name('verifyLogin');
Route::get('register', [User\Registration::class, 'index'])->name('register');
Route::post('register/verify', [User\Registration::class, 'verify'])->name('verifyRegistration');
Route::get('/logout',[User\Login::class, 'logout'])->name('logout'); 