<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HerramientasController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MetodoDePagoController;
use Illuminate\Support\Facades\Auth;

Route::resource('herramientas', HerramientasController::class);


// Rutas de Login y Registro
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Ruta para el Logout
Route::post('logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function() {

    Route::get('/', function () {
        return view('home');
    })->name('home');


 // Rutas para el CRUD de herramientas
    Route::get('/herramientas', [HerramientasController::class, 'index'])->name('herramientas.index');
    Route::get('/herramientas/create', [HerramientasController::class, 'create'])->name('herramientas.create');
    Route::post('herramientas', [HerramientasController::class, 'store'])->name('herramientas.store');


    Route::get('/herramientas/{herramienta}', [HerramientasController::class, 'show'])->name('herramientas.show');
    Route::get('herramientas/{id}/edit', [HerramientasController::class, 'edit'])->name('herramientas.edit');

    Route::put('/herramientas/{herramienta}', [HerramientasController::class, 'update'])->name('herramientas.update');
    Route::delete('/herramientas/{herramienta}', [HerramientasController::class, 'destroy'])->name('herramientas.destroy');
    Route::post('/herramientas/delete', [HerramientasController::class, 'delete'])->name('herramientas.delete');
    Route::get('/herramientas/{herramienta}/delete', [HerramientasController::class, 'delete'])->name('herramientas.delete');


    // Rutas para el CRUD de productos
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('productos', [ProductoController::class, 'store'])->name('productos.store');

    Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
    Route::get('productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');

    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
    Route::post('/productos/delete', [ProductoController::class, 'delete'])->name('productos.delete');
    Route::get('/productos/{producto}/delete', [ProductoController::class, 'delete'])->name('productos.delete');


    //Rutas para el CRUD de Metodos de Pago
    Route::get('/metodos_de_pago', [MetodoDePagoController::class, 'index'])->name('metodos_de_pago.index');
    Route::get('/metodos_de_pago/create', [MetodoDePagoController::class, 'create'])->name('metodos_de_pago.create');
    Route::post('/metodos_de_pago', [MetodoDePagoController::class, 'store'])->name('metodos_de_pago.store');

    Route::get('/metodos_de_pago/{metodo_de_pago}', [MetodoDePagoController::class, 'show'])->name('metodos_de_pago.show');
    Route::get('metodos_de_pago/{id}/edit', [MetodoDePagoController::class, 'edit'])->name('metodos_de_pago.edit');

    Route::put('/metodos_de_pago/{metodo_de_pago}', [MetodoDePagoController::class, 'update'])->name('metodos_de_pago.update');
    Route::delete('/metodos_de_pago/{metodo_de_pago}', [MetodoDePagoController::class, 'destroy'])->name('metodos_de_pago.destroy');
    Route::post('/metodos_de_pago/delete', [MetodoDePagoController::class, 'delete'])->name('metodos_de_pago.delete');
    Route::get('/metodos_de_pago/{metodo_de_pago}/delete', [MetodoDePagoController::class, 'delete'])->name('metodos_de_pago.delete');
});


