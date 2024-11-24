<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\percobaanController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SendEmailController;
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

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku2', [BukuController::class, 'index2']);

Route::get('/buku/search', [BukuController::class, 'search']) -> name('buku.search');

Route::post('/buku', [BukuController::class, 'store']) -> name ('buku.store');
Route::get('/buku/create', [BukuController::class, 'create']) -> name ('buku.create');

Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::post('/buku/edit/{id}', [BukuController::class, 'update'])->name('buku.update');

Route::controller(LoginRegisterController::class) -> group(function () {
    Route::get('/register', 'register') -> name('register');
    Route::post('/store', 'store') -> name('store');
    Route::get('/login', 'login') -> name('login');
    Route::post('/authenticate', 'authenticate') -> name('authenticate');
    Route::get('/dashboard', 'dashboard') -> name('dashboard');
    Route::post('/logout', 'logout') -> name('logout');
});


Route::get('project', [ProjectController::class, 'index']) -> name('project.index');

Route::middleware('check.login') -> group(function () {
    Route::get('project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('project', [ProjectController::class, 'store'])->name('project.store');
    Route::get('project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('project/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
});

Route::get('/send-email', [SendEmailController::class, 'index']) -> name('kirim.email');
Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');
Route::get('/products', function () {
    return view('product_list');
});