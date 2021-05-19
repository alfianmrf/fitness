<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
 
Route::group(['middleware' => 'auth'], function () {
 
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('informasi/{id}', [HomeController::class, 'informasi'])->name('informasi');
    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('member', [HomeController::class, 'member'])->name('member');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
 
});
