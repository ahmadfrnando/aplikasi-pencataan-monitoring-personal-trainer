<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\PengukuranKlienController;
use App\Http\Controllers\ProgramLatihanController;
use App\Http\Controllers\ProgramLatihanIntiController;
use App\Http\Controllers\ProgramLatihanPemanasanController;
use App\Http\Controllers\ProgramLatihanPendinginanController;
use App\Models\ProgramPemanasan;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::middleware(['web'])->group(function () {
    // route yang ada
    Route::get('/', [LoginController::class, 'index'])->name('home');
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('/verify-email', [EmailVerificationController::class, 'index'])
//     ->middleware('auth')
//     ->name('verification.notice'); // <-- don't change the route name

// Route::get('/email/verify', function () {
//     return view('pages.auth.verify-email');
// })->middleware('auth')->name('verification.notice');

Route::get('verify-email', EmailVerificationPromptController::class)
    ->name('verification.notice');

Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('verification.send');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::resource('/klien', KlienController::class);
    Route::get('/pengukuran-klien/{klien}/create', [PengukuranKlienController::class, 'create'])->name('klien.pengukuran.create');
    Route::post('/pengukuran-klien/store', [PengukuranKlienController::class, 'store'])->name('klien.pengukuran.store');
    Route::post('/pengukuran-klien/update-data', [PengukuranKlienController::class, 'update'])->name('klien.pengukuran.update-data');
    
    Route::resource('/program-latihan-klien', ProgramLatihanController::class);

    Route::get('/program-latihan-klien/pemanasan/{program}', [ProgramLatihanPemanasanController::class, 'index'])->name('program.pemanasan.index');
    Route::post('/program-latihan-klien/pemanasan/store', [ProgramLatihanPemanasanController::class, 'store'])->name('program.pemanasan.store');
    Route::put('/program-latihan-klien/pemanasan/update/{id}', [ProgramLatihanPemanasanController::class, 'update'])->name('program.pemanasan.update');
    Route::post('/program-latihan-klien/pemanasan/update-isdone', [ProgramLatihanPemanasanController::class, 'updateIsDone'])->name('program.pemanasan.update-isdone');
    Route::delete('/program-latihan-klien/pemanasan/{id}/destroy', [ProgramLatihanPemanasanController::class, 'destroy'])->name('program.pemanasan.destroy');
    
    Route::get('/program-latihan-klien/pendinginan/{program}', [ProgramLatihanPendinginanController::class, 'index'])->name('program.pendinginan.index');
    Route::post('/program-latihan-klien/pendinginan/store', [ProgramLatihanPendinginanController::class, 'store'])->name('program.pendinginan.store');
    Route::put('/program-latihan-klien/pendinginan/update/{id}', [ProgramLatihanPendinginanController::class, 'update'])->name('program.pendinginan.update');
    Route::post('/program-latihan-klien/pendinginan/update-isdone', [ProgramLatihanPendinginanController::class, 'updateIsDone'])->name('program.pendinginan.update-isdone');
    Route::delete('/program-latihan-klien/pendinginan/{id}/destroy', [ProgramLatihanPendinginanController::class, 'destroy'])->name('program.pendinginan.destroy');
    
    Route::get('/program-latihan-klien/latihan-inti/{program}', [ProgramLatihanIntiController::class, 'index'])->name('program.latihan-inti.index');
    Route::get('/program-latihan-klien/latihan-inti/{program}/create', [ProgramLatihanIntiController::class, 'create'])->name('program.latihan-inti.create');
    Route::post('/program-latihan-klien/latihan-inti/store', [ProgramLatihanIntiController::class, 'store'])->name('program.latihan-inti.store');
    Route::put('/program-latihan-klien/latihan-inti/update/{id}', [ProgramLatihanIntiController::class, 'update'])->name('program.latihan-inti.update');
    Route::post('/program-latihan-klien/latihan-inti/update-isdone', [ProgramLatihanIntiController::class, 'updateIsDone'])->name('program.latihan-inti.update-isdone');
    Route::delete('/program-latihan-klien/latihan-inti/{id}/destroy', [ProgramLatihanIntiController::class, 'destroy'])->name('program.latihan-inti.destroy');

    // Route::get('/program-latihan-klien/latihan-inti/{program}', [ProgramLatihanIntiController::class, 'index'])->name('program.latihan-inti.index');

    Route::get('/program-latihan-klien/pendinginan/{program}', [ProgramLatihanPendinginanController::class, 'index'])->name('program.pendinginan.index');

});
