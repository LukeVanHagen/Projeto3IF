<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\RFIDController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/alunos/create', [AlunoController::class, 'create'])->name('alunos.create');
});

// routes/web.php
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('alunos', AlunoController::class)->only(['create', 'store']);
// web.php ou routes/web.php

Route::resource('alunos', AlunoController::class);

Route::post('/api/processar-rfid', [RFIDController::class, 'processarRFID'])->withoutMiddleware(['web', 'csrf']);

Route::get('/alunos/create', [AlunoController::class, 'create'])->name('alunos.create');
Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');

Route::get('/registros', [RegistroController::class, 'index'])->name('registros.index');
Route::post('/registros/store', [RegistroController::class, 'store'])->name('registros.store');

Route::get('/local/create', [LocalController::class, 'create'])->name('local.create');
Route::post('/local', [LocalController::class, 'store'])->name('local.store');

require __DIR__.'/auth.php';
