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
Route::get('/registrar', function () {
    return view('home');
})->middleware('auth');
Route::get('/reportes', function () {
    return view('home');
})->middleware('auth');
Route::get('/especial', function () {
    return view('home');
})->middleware('auth');
Route::get('/mamas', function () {
    return view('home');
})->middleware('auth');

Route::get('/educations', function () {
    return view('home');
})->middleware('auth');
Route::get('/informe', function () {
    return view('home');
})->middleware('auth');

Route::get('/listado', function () {
    return view('home');
})->middleware('auth');

Route::get('/verificar', function () {
    return view('verificar');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/madre', [App\Http\Controllers\MadreController::class, 'store'])->name('home');
Route::post('/education', [App\Http\Controllers\EducationController::class, 'store'])->name('home');
Route::get('/education', [App\Http\Controllers\EducationController::class, 'index'])->name('home');
Route::get('/madre/info', [App\Http\Controllers\MadreController::class, 'info'])->name('home');
Route::get('/madre/{ci}', [App\Http\Controllers\MadreController::class, 'show'])->name('home');
Route::put('/madre/{id}', [App\Http\Controllers\MadreController::class, 'update'])->name('home');
Route::put('/modifica/{id}', [App\Http\Controllers\MadreController::class, 'modificar'])->name('home');
Route::get('/reporte', [App\Http\Controllers\MadreController::class, 'datosinfo'])->name('home');
Route::get('/reporte2', [App\Http\Controllers\MadreController::class, 'numregistro'])->name('home');
Route::get('/reporte3', [App\Http\Controllers\MadreController::class, 'totalrevisado'])->name('home');
Route::get('/reporte4', [App\Http\Controllers\MadreController::class, 'informe'])->name('home');
Route::get('/verificado/{f1}', [App\Http\Controllers\MadreController::class, 'userverif'])->name('home');
Route::get('/habilitado/{f1}', [App\Http\Controllers\MadreController::class, 'userhabilita'])->name('home');
Route::get('/verifma/{c1}', [App\Http\Controllers\MadreController::class, 'verma'])->name('home');
Route::get('/madreregister/{f1}/{f2}', [App\Http\Controllers\MadreController::class, 'madreregister'])->name('home');
Route::get('/verificacion', [App\Http\Controllers\MadreController::class, 'verificacion'])->name('home');
//Route::get('/madre', [App\Http\Controllers\MadreController::class, 'index'])->name('home');
//echo (Illuminate\Auth::user()->id);
Route::apiResource('/user',App\Http\Controllers\UserController::class)->middleware('auth');
Route::post('/pass/{id}',[App\Http\Controllers\UserController::class,'pass'])->middleware('auth');
Route::put('/confirmar/{id}',[App\Http\Controllers\MadreController::class,'confirmar'])->middleware('auth');
Route::get('/recintos',[App\Http\Controllers\MadreController::class,'recintos']);
Route::get('/verificar/{id}/{fecha}',[App\Http\Controllers\HijoController::class,'verificar']);
Route::post('/storemama',[App\Http\Controllers\MadreController::class,'storemama']);
Route::get('/veri',[App\Http\Controllers\HomeController::class,'veri']);
Route::get('/madres',[App\Http\Controllers\HomeController::class,'madres']);
Route::put('/madresupdate/{id}',[App\Http\Controllers\HomeController::class,'madresupdate']);
Route::get('/corte/{ci}/{born}',[App\Http\Controllers\HomeController::class,'corte']);
