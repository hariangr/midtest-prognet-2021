<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KartuStudiController;
use App\Models\KartuStudi;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    // return view('welcome');
    if (Auth::user()) {
        return redirect((route('dashboard.mahasiswa.index')));
    } else {
        return redirect((route('register')));
    }
})->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard.layout');
// })->middleware(['auth'])->name('dashboard');

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
    // forum/
    Route::get('/', function () {
        return redirect(route('dashboard.mahasiswa.index'));
    })->name('index');

    // Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    //     Route::get('/', [MahasiswaController::class, 'index'])->name('index');
    // });

    Route::resource('mahasiswa', MahasiswaController::class)->only([
        'index', 'store', 'show', 'update', 'destroy'
    ])->middleware(['auth']);

    Route::resource('matkul', MatkulController::class)->only([
        'index', 'store', 'show', 'update', 'destroy'
    ])->middleware(['auth']);

    Route::resource('dosen', DosenController::class)->only([
        'index', 'store', 'show', 'update', 'destroy'
    ])->middleware(['auth']);

    Route::resource('kelas', KelasController::class)->only([
        'index', 'store', 'show', 'update', 'destroy'
    ])->middleware(['auth']);

    Route::resource('kartustudi', KartuStudiController::class)->only([
        'store', 'destroy'
    ])->middleware(['auth']);
});


require __DIR__ . '/auth.php';
