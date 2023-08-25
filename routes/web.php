<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\NotaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/Contactos',[ContactoController::class,'index'] )
->name('Contacto.index');

Route::get('/Contactos/{id}',[ContactoController::class, 'show'])
->where ('id','[0-9]+')->name('Contacto.show');

Route::get('/Contactos/crear',[ContactoController::class,'create'])
->name('Contacto.create');

Route::post('/Contactos/crear',[ContactoController::class,'store'])
->name('Contacto.store');

Route::get('/Contactos/editar/{id}',[ContactoController::class,'edit'])
->name('Contacto.edit')->where ('id','[0-9]+'); //editar

Route::put('/Contactos/editar/{id}',[ContactoController::class,'update'] )
->name('Contacto.update')->where ('id','[0-9]+'); //actualizar

Route::delete('/Contactos/borrar/{id}',[ContactoController::class,'destroy'] )
->name('Contacto.destroy')->where ('id','[0-9]+'); //eliminar

//Rutas Evento
Route::get('/Eventos',[EventoController::class,'index'] )
->name('Evento.index');

Route::get('/Eventos/{id}',[EventoController::class, 'show'])
->where ('id','[0-9]+')->name('Evento.Show');

Route::get('/Eventos/crear',[EventoController::class,'create'])
->name('Evento.create');

Route::post('/Eventos/crear',[EventoController::class,'store'])
->name('Evento.guardar');

Route::get('/Eventos/editar/{id}',[EventoController::class,'edit'])
->name('Evento.edit')->where ('id','[0-9]+'); //editar

Route::put('/Eventos/editar/{id}',[EventoController::class,'update'] )
->name('Evento.update')->where ('id','[0-9]+'); //actualizar

Route::delete('/Eventos/borrar/{id}',[EventoController::class,'destroy'] )
->name('Evento.borrar')->where ('id','[0-9]+'); //eliminar




//Rutas Notas
Route::get('/Notas',[NotaController::class,'index'] )
->name('nota.index');

Route::get('/Notas/{id}',[NotaController::class, 'show'])
->where ('id','[0-9]+')->name('nota.show');

Route::get('/Notas/crear',[NotaController::class,'create'])
->name('nota.create');

Route::post('/Notas/crear',[NotaController::class,'store'])
->name('nota.guardar');

Route::get('/Notas/editar/{id}',[NotaController::class,'edit'])
->name('nota.edit')->where ('id','[0-9]+'); //editar

Route::put('/Notas/editar/{id}',[NotaController::class,'update'] )
->name('nota.update')->where ('id','[0-9]+'); //actualizar

Route::delete('/Notas/borrar/{id}',[NotaController::class,'destroy'] )
->name('nota.borrar')->where ('id','[0-9]+'); //eliminar