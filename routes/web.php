<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FibraController;
use App\Http\Controllers\InalambricaController;



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
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('fibras', FibraController::class);
    Route::resource('inalambricas', InalambricaController::class);

    //Route::get('locations/fibras/{id?}', [FibraController::class, 'getFibrabyLocation'])->name('getFiber');

    Route::get('locations/fibra/{id?}', [FibraController::class, 'getFiberByLocation'])->name('getFiber');

    Route::get('locations/fibra/create/{id?}', [FibraController::class, 'createFyberByLocation'])->name('getfiberloc');

    Route::get('locations/inalambricas/{id?}', [InalambricaController::class, 'getInalambricaByLocation'])->name('getInalambrica');

    Route::get('locations/inalambricas/create/{id?}', [InalambricaController::class, 'createInalambricaByLocation'])->name('getinalmloc');

    Route::get('locations/fibra/edit/{id?}', [FibraController::class, 'editFyberByLocation'])->name('geteditfiberloc');
});
