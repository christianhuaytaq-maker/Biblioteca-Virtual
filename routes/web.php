<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\TraductorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PrestamoController;

Route::get('/', function () {
    return view('bienvenida');
})->name('bienvenida');

// Panel de administración con búsqueda y filtros
Route::get('/panel', [LibroController::class, 'index'])->name('panel');

// Catálogo de libros
Route::get('/libros', [LibroController::class, 'catalogo'])->name('libros.index');

// Agregar nuevo libro
Route::get('/libros/crear', [LibroController::class, 'create'])->name('libros.create');
Route::post('/libros/guardar', [LibroController::class, 'store'])->name('libros.store');

// Autores
Route::get('/autores', [AutorController::class, 'index'])->name('autores.index');

// Editoriales
Route::get('/editoriales', [EditorController::class, 'index'])->name('editoriales.index');

// Traductores
Route::get('/traductores', [TraductorController::class, 'index'])->name('traductores.index');

// Usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

// Préstamos
Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');

// Configuración
Route::get('/configuracion', function () {
    return view('configuracion');
})->name('configuracion');
