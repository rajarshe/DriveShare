<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cars/search', [HomeController::class, 'search'])->name('cars.search');

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
    Route::get('/booking-car/{card_id}', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking-list', [BookingController::class, 'list'])->name('booking.list');
    Route::post('/booking-car/store', [BookingController::class, 'store'])->name('bookings.store');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

    Route::get('/reviews/{booking}', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews/create/{booking}', [ReviewController::class, 'store'])->name('reviews.store');
});

require __DIR__ . '/auth.php';
