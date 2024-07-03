<?php

use App\Http\Controllers\CodigoController;
use App\Http\Controllers\CodigovotoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ListaController;
use Illuminate\Routing\RouteRegistrar;
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

Auth::routes(['register'=>true]);
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('listas',ListaController::class);
    //Route::get('/listas',[ListaController::class,'index'])->name('listas');
    
    Route::resource('cursos',CursoController::class);
    
    Route::resource('codigos',CodigoController::class);

    Route::get('codigosc',[CodigoController::class,'crear'])->name('codigos.crear');

    Route::post('codigosg',[CodigoController::class,'guardar'])->name('codigos.guardar');
    
    Route::resource('codigovotos',CodigovotoController::class);

    Route::get('cierrejunta',[CodigovotoController::class,'cierreJunta'])->name('junta.cierre');
 });



Route::get('validate',[CodigoController::class,'validar'])->name('codigos.validate');

Route::post('votar',[CodigovotoController::class,'store'])->name('voto.realizar');

Route::get('voto2',function () {
    return view('welcome2');
})->name('wel.2');
Route::get('wel',function(){
    return view('welcome');
})->name('wel.ini');