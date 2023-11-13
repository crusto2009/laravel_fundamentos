<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Chirp;
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

Route::get('/',function (){
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chirps', [ChirpController::class,'index'])->name('chirps.index');

    Route::get('/chirps/show', [ChirpController::class,'show'])->name('chirps.show');

    Route::post('/chirps', [ChirpController::class,'store'])->name('chirps.store');

    Route::get('/chirps/{chirp?}', [ChirpController::class,'show']);

    Route::view('/bienvenida', 'welcome')->name('bienvenida');

 

   
});

require __DIR__ . '/auth.php';
