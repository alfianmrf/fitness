<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\InformasiController;

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

Route::middleware(['admin'])->group(function () {
    Route::get('/', [HomeController::class, 'admin'])->name('admin');
    Route::get('login', [AuthController::class, 'showFormLoginAdmin'])->name('admin.login');
    Route::post('login', [AuthController::class, 'loginAdmin']);

    Route::group(['middleware' => 'auth'], function () {
        Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
        Route::post('register', [AuthController::class, 'register']);
        Route::post('logout', [AuthController::class, 'logoutAdmin'])->name('admin.logout');
        Route::group(["prefix" => "/member"], function () {
            Route::get('/{id}/delete', [MemberController::class, 'delete'])->name('admin.member.delete');
            Route::get('/{id}/detail', [MemberController::class, 'detail'])->name('admin.member.detail');
            Route::get('/{id}/edit', [MemberController::class, 'edit'])->name('admin.member.edit');
            Route::post('/update/{id}', [MemberController::class, 'update'])->name('admin.member.update');
        });
        Route::group(["prefix" => "/contact"], function () {
            Route::get('/', [ContactController::class, 'index'])->name('admin.contact');
            Route::get('/detail', [ContactController::class, 'detail'])->name('admin.contact.detail');
            Route::get('/edit', [ContactController::class, 'edit'])->name('admin.contact.edit');
            Route::post('/update', [ContactController::class, 'update'])->name('admin.contact.update');
        });
        Route::group(["prefix" => "/jadwal"], function () {
            Route::get('/', [JadwalController::class, 'index'])->name('admin.jadwal');
            Route::get('/add', [JadwalController::class, 'add'])->name('admin.jadwal.add');
            Route::post('/update/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.update');
            Route::post('/new', [JadwalController::class, 'new'])->name('admin.jadwal.new');
            Route::get('/{id}/delete', [JadwalController::class, 'delete'])->name('admin.jadwal.delete');
            Route::get('/{id}/edit', [JadwalController::class, 'edit'])->name('admin.jadwal.edit');
        });
        Route::group(["prefix" => "/informasi"], function () {
            Route::get('/', [InformasiController::class, 'index'])->name('admin.informasi');
            Route::get('/add', [InformasiController::class, 'add'])->name('admin.informasi.add');
            Route::post('/update/{id}', [InformasiController::class, 'update'])->name('admin.informasi.update');
            Route::post('/new', [InformasiController::class, 'new'])->name('admin.informasi.new');
            Route::get('/{id}/delete', [InformasiController::class, 'delete'])->name('admin.informasi.delete');
            Route::get('/{id}/edit', [InformasiController::class, 'edit'])->name('admin.informasi.edit');
        });
    });
});
