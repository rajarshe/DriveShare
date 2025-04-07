<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
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
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user-login', [UserController::class, 'index'])->name('user.login');
Route::post('/user-login', [UserController::class, 'login'])->name('user.login.submit');
Route::post('/user-logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/user-register', [UserController::class, 'create'])->name('user.register');
Route::post('/user-register-create', [UserController::class, 'store'])->name('user.register.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('cars', controller: CarController::class);
});

require __DIR__.'/auth.php';
