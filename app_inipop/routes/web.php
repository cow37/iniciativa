<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\DocumentoController;

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


/*Route::get('registro', function () {
    return view('registro.alta');
});*/
//->middleware('canAccess')
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('canAccess');
//Auth::routes(['verify' => true]);
/*Route::get('/', function () {
    return view('/');
});*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth','verified']);
//participante
Route::get('/registro/alta', [ParticipanteController::class, 'create']);
Route::post('/registro/alta/store', [ParticipanteController::class, 'store']);
Route::post('/registro/alta/consulta_facultad', [ParticipanteController::class, 'consulta_facultad'])->name('consulta_facultad');
Route::post('/registro/alta/consulta_sede', [ParticipanteController::class, 'consulta_sede'])->name('consulta_sede');
// E-mail verification
Route::get('/register/verify/{code}', [ParticipanteController::class, 'verify']);

Route::post('/register/reenviar_validacion', [ParticipanteController::class, 'reenviar_validacion'])->middleware('auth');
//documentos
Route::post('/registro/doc/store', [DocumentoController::class, 'store']);
Route::get('/registro/emailenviado', function () {
    return view('/registro/emailenviado');
});
Route::get('/registro/finalizar',[ParticipanteController::class, 'finalizar_participacion'])->name('finaliza_participacion')->middleware('auth');
    
//PDFS
     Route::get('registro/PDFS/Certificado', [DocumentoController::class, 'GenerarCerficado_pdf'])->name('generar_certificado')->middleware('auth');
//verificar pdf
Route::post('/register/verifypdf/{code}', [DocumentoController::class, 'verifypdf'])->middleware('auth');