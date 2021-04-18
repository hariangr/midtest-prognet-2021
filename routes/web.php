<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard.layout');
// })->middleware(['auth'])->name('dashboard');

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
    // forum/
    Route::get('/', function () {
        return redirect(route('dashboard.mahasiswa.index'));
    })->name('index');

    Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
        Route::get('/', function () {
            return view('dashboard.mahasiswa.index');
        })->name('index');
    });
});


require __DIR__.'/auth.php';
