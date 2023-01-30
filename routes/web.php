<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('chollometro', 'ChollometroController');

Route::get('/rated', 'ChollometroController@rated')->name("rated");

Route::get('/newest', 'ChollometroController@newest')->name("newest");

Route::get('/chollo/{id}/{rate}', 'ChollometroController@vote')->name("vote");

Route::get('/categorias', 'ChollometroController@categories')->name("categories");

Route::post('/categoriaAdd', 'ChollometroController@addCategory')->name("addCategory");

Route::delete('/categoriaDel/{id}', 'ChollometroController@delCategory')->name("delCategory");




