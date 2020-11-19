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
});
Route::get('/usuarios', function () {
    return view('home');
})->middleware('auth');
Route::get('/registrados', function () {
    return view('home');
})->middleware('auth');
Route::get('/revisar', function () {
    return view('home');
})->middleware('auth');
Route::get('/actualizar', function () {
    return view('home');
})->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/madre', [App\Http\Controllers\MadreController::class, 'store'])->name('home');
Route::get('/madre/{ci}', [App\Http\Controllers\MadreController::class, 'show'])->name('home');
Route::put('/madre/{id}', [App\Http\Controllers\MadreController::class, 'update'])->name('home');
Route::get('/madreregister/{f1}/{f2}', [App\Http\Controllers\MadreController::class, 'madreregister'])->name('home');
Route::get('/verificacion', [App\Http\Controllers\MadreController::class, 'verificacion'])->name('home');
//Route::get('/madre', [App\Http\Controllers\MadreController::class, 'index'])->name('home');
//echo (Illuminate\Auth::user()->id);
Route::apiResource('/user',App\Http\Controllers\UserController::class);
Route::post('/pass/{id}',[App\Http\Controllers\UserController::class,'pass']);
