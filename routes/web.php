<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\VacunaController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\CirugiaController;


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

/*
----------------------------------------
* RUTAS: PÚBLICAS
----------------------------------------
*/
Route::get('/', function () {
    return view('publico.login', ['titulo'=>'Acceso al sistema']);
})->name('login');

/*
----------------------------------------
* RUTAS: AUTENTICACIÓN
----------------------------------------
*/
Route::get('/logout', [AuthController::class ,'logout']);
Route::post('/auth', [AuthController::class ,'autenticar']);
// Route::resource('/auth', AuthController::class);

/*
----------------------------------------
* RUTAS: DASHBOARD
----------------------------------------
*/
Route::resource('/dashboard', DashboardController::class)->middleware('auth');

/*
----------------------------------------
* RUTAS: PERSONAL
----------------------------------------
*/
Route::delete('/destinos/{id}', [PersonalController::class ,'destroy_destino'])->middleware('auth');
Route::post('/destinos', [PersonalController::class ,'store_destino'])->middleware('auth');
Route::get('/personal/{id}/nuevo_destino', [PersonalController::class ,'nuevo_destino'])->middleware('auth');
Route::resource('/personal', PersonalController::class)->middleware('auth');
/*
----------------------------------------
* RUTAS: ADMINISTRATIVO
----------------------------------------
*/
Route::resource('/unidades', UnidadController::class)->middleware('auth');
                            // ->middleware('auth');
Route::resource('/cargos', CargoController::class)->middleware('auth');
/*
----------------------------------------
* RUTAS: INSPECCIONES Y TARJETAS
----------------------------------------
*/
Route::resource('/inspecciones', InspeccionController::class)->middleware('auth');

Route::put('/tarjetas/{id}/editar_actividad', [TarjetaController::class ,'update_actividad'])->middleware('auth');
Route::get('/tarjetas/{id}/editar_actividad', [TarjetaController::class ,'editar_actividad'])->middleware('auth');
Route::delete('/tarjetas/{id1}/eliminar_actividad/{id2}', [TarjetaController::class ,'destroy_actividad'])->middleware('auth');
Route::post('/tarjetas/{id}/nueva_actividad', [TarjetaController::class ,'store_actividad'])->middleware('auth');
Route::get('/tarjetas/{id}/nueva_actividad', [TarjetaController::class ,'nueva_actividad'])->middleware('auth');
Route::get('/tarjetas/{id}/actividades', [TarjetaController::class ,'lista_actividades'])->middleware('auth');
Route::resource('/tarjetas', TarjetaController::class)->middleware('auth');

/*
----------------------------------------
* RUTAS: ORDENES TRABAJO
----------------------------------------
*/
Route::get('/ordenes/print1/{id}', [OrdenController::class ,'imprimir_hoja1'])->middleware('auth');
Route::get('/ordenes/print3/{id}', [OrdenController::class ,'imprimir_hoja3'])->middleware('auth');
Route::post('/ordenes/subir_digital/{id}', [OrdenController::class ,'subir_digital'])->middleware('auth');
Route::resource('/ordenes', OrdenController::class)->middleware('auth');
Route::post('/seguimientos/back_realizar', [SeguimientoController::class ,'back_realizar'])->middleware('auth');
Route::post('/seguimientos/back_desarrollo', [SeguimientoController::class ,'back_desarrollo'])->middleware('auth');
Route::post('/seguimientos/a_concluido', [SeguimientoController::class ,'a_concluido'])->middleware('auth');
Route::post('/seguimientos/a_desarrollo', [SeguimientoController::class ,'a_desarrollo'])->middleware('auth');
Route::resource('/seguimientos', SeguimientoController::class)->middleware('auth');


/*
----------------------------------------
* RUTAS: REPORTES
----------------------------------------
*/
Route::resource('/reportes', ReporteController::class)->middleware('auth');
Route::get('/monitoreo/orden/{id}', [MonitoreoController::class ,'tablero_orden'])->middleware('auth');
Route::resource('/monitoreo', MonitoreoController::class)->middleware('auth');


/*
#########################################################################################################################
#########################################################################################################################
#########################################################################################################################
#########################################################################################################################
 */
/*
-------------------------------------------------------------------------------------------------------------------------
* RUTAS: ADMIN
-------------------------------------------------------------------------------------------------------------------------
*/
Route::resource('/especies', EspecieController::class)->middleware('auth');
Route::resource('/veterinarios', VeterinarioController::class)->middleware('auth');
//vacunas de mascotas
Route::get('/mascotas/{id}/vacunas', [VacunaController::class, 'vacunas_mascota'])->middleware('auth');
Route::get('/vacunas/{id}/aplicar', [VacunaController::class, 'aplicar'])->middleware('auth');
Route::post('/vacunas/store_aplicar', [VacunaController::class, 'store_aplicar'])->middleware('auth');
Route::delete('/vacunas/delete_aplicada/{id}', [VacunaController::class, 'delete_aplicada'])->middleware('auth');
Route::resource('/vacunas', VacunaController::class)->middleware('auth');

Route::resource('/razas', RazaController::class)->middleware('auth');

//autorizaciones
Route::get('/mascotas/{id}/cirugias', [PropietarioController::class, 'autorizaciones_mascota'])->middleware('auth');
Route::get('/cirugias/{id}/autorizar', [PropietarioController::class, 'autorizar'])->middleware('auth');
Route::post('/cirugias/store_autorizacion', [PropietarioController::class, 'store_autorizacion'])->middleware('auth');
Route::delete('/cirugias/delete_autorizacion/{id}', [PropietarioController::class, 'delete_autorizacion'])->middleware('auth');
//resource propietarios
Route::get('/propietarios/{id}/mascotas', [PropietarioController::class ,'listar_mascotas'])->middleware('auth');
Route::resource('/propietarios', PropietarioController::class)->middleware('auth');

Route::get('/mascotas/{id}/consultas', [ConsultaController::class, 'nuevo_mascota'])->middleware('auth');
Route::resource('/consultas', ConsultaController::class)->middleware('auth');

// Route::get('/mascotas/{id}/cirugias', [CirugiaController::class, 'nuevo_mascota'])->middleware('auth');
// Route::resource('/cirugias', CirugiaController::class)->middleware('auth');
Route::get('/mascotas/{id}/citas', [CitaController::class, 'nuevo_mascota'])->middleware('auth');
Route::resource('/citas', CitaController::class)->middleware('auth');

Route::get('/mascotas/nuevo/{id}', [MascotaController::class, 'nuevo_mascota'])->middleware('auth');
Route::resource('/mascotas', MascotaController::class)->middleware('auth');

/*
----------------------------------------
* RUTAS: USUARIOS
----------------------------------------
*/
Route::put('/usuarios/update_password/{id}', [UsuarioController::class ,'update_password'])->middleware('auth');
Route::resource('/usuarios', UsuarioController::class)->middleware('auth');