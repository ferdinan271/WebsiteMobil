<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
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

Route::get('/form-pendaftaran', function () {
    return view('form');
})->middleware(['auth', 'verified'])->name('form');

Route::get('/terima-kasih', function () {
    return view('completeform');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/index', function () {
    return redirect('/');
})->name('index');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/reservations/{selectedProduct?}', [ReservationController::class, 'index'])->name('reservations');
Route::post('/reservations/store', [ReservationController::class, 'store'])->name('reservations.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/reservation/delete/{id}', [ReservationController::class, 'delete'])->name('reservations.delete');
    Route::get('/reservation/edit/{id}', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservation/update/{id}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservations.store');

require __DIR__ . '/auth.php';