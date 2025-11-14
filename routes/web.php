<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ComunicadoController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\ConsultaCodigoClienteController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\FormularioPaginaContactoController;
use App\Http\Controllers\FormularioLibroReclamacionController;
use App\Http\Controllers\FormularioLandingController;
use App\Livewire\Web\OpenAi\ProcesarImagenLivewire;

use Illuminate\Support\Facades\Route;

Route::get('/', [InicioController::class, 'index'])->name('home'); //pagina personalizada //ok

Route::get('/peru-tierra-de-incautos', [FormularioLandingController::class, 'index'])->name('landing.index'); //pagina personalizada
Route::post('/landing/enviar', [FormularioLandingController::class, 'store'])->name('landing.store');

Route::get('/ingresar', [LoginController::class, 'indexIngresarCliente'])->name('ingresar.cliente');
Route::post('/ingresar', [LoginController::class, 'ingresarCliente'])->name('ingresar.cliente');
Route::post('/logout', [LoginController::class, 'logoutCliente'])->name('logout.cliente');

Route::get('/ingresar/admin', [LoginController::class, 'indexIngresarAdmin'])->name('ingresar.admin');
Route::post('/ingresar/admin', [LoginController::class, 'ingresarAdmin'])->name('ingresar.admin');
Route::post('/logout/admin', [LoginController::class, 'logoutAdmin'])->name('logout.admin');

Route::get('/martin-caycho', [NosotrosController::class, 'index'])->name('nosotros.index'); //pagina personalizada //ok

Route::get('/consulta-codigo-cliente', [ConsultaCodigoClienteController::class, 'index'])->name('consulta-codigo-cliente.index'); //pagina personalizada //ok

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index'); //pagina personalizada
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show'); //pagina personalizada

Route::get('/comunicado', [ComunicadoController::class, 'index'])->name('comunicado.index'); //pagina personalizada
Route::get('/comunicado/{slug}', [ComunicadoController::class, 'show'])->name('comunicado.show'); //pagina personalizada

Route::get('/contacto', [FormularioPaginaContactoController::class, 'index'])->name('contacto.index'); //pagina personalizada
Route::post('/contacto/enviar', [FormularioPaginaContactoController::class, 'enviar'])->name('contacto.enviar');

Route::get('/libro-de-reclamaciones', [FormularioLibroReclamacionController::class, 'index'])->name('reclamaciones.index'); //pagina personalizada
Route::post('/libro-de-reclamaciones/enviar', [FormularioLibroReclamacionController::class, 'enviar'])->name('reclamaciones.enviar');

Route::get('/procesar-imagen', ProcesarImagenLivewire::class)->name('procesar-imagen.vista.todo');

Route::get('/{slug?}', [PaginaController::class, 'show'])->name('pagina.mostrar');
