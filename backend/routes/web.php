<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
});
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/show', [App\Http\Controllers\Posts::class, 'show'])->name('show');
Route::get('/create', [App\Http\Controllers\Posts::class, 'create'])->name('create')->middleware('auth');
Route::post('/store', [App\Http\Controllers\Posts::class, 'store'])->name('store')->middleware('auth');

Route::delete('/delete/{id}', [App\Http\Controllers\Posts::class, 'delete'])->name('delete')->middleware('auth');
Route::get('/edit/{id}', [App\Http\Controllers\Posts::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/update/{id}', [App\Http\Controllers\Posts::class, 'update'])->name('update')->middleware('auth');

