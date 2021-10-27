<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadosImportarController;
use App\Http\Controllers\GraficosController;

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// I M P O R T A R 
Route::middleware(['auth:sanctum', 'verified'])->get('/estados/importar/balance',[EstadosImportarController::class,'importarBalance' ])->name('importar.balance');
Route::middleware(['auth:sanctum', 'verified'])->post('/estados/importar/balance',[EstadosImportarController::class,'guardarBalance' ])->name('guardar.balance');
Route::middleware(['auth:sanctum', 'verified'])->post('/estados/importar/estado',[EstadosImportarController::class,'guardarEstado' ])->name('guardar.estado');


// V E R
Route::middleware(['auth:sanctum', 'verified'])->get('/estados/ver',[EstadosImportarController::class,'verEstados' ])->name('estados.ver');
Route::middleware(['auth:sanctum', 'verified'])->get('/ratios/ver',[EstadosImportarController::class,'verRatios' ])->name('ratios.ver');


// C A L C U L A R 
Route::middleware(['auth:sanctum', 'verified'])->get('/ratios/calcular',[EstadosImportarController::class,'calcularRatios' ])->name('ratios.calcular');
Route::middleware(['auth:sanctum', 'verified'])->post('/ratios/calculo',[EstadosImportarController::class,'calculoRatios' ])->name('ratios.calculo');
Route::middleware(['auth:sanctum', 'verified'])->get('/ratios/comparar',[EstadosImportarController::class,'compararRatio' ])->name('ratios.comparar');


// P r o b a r
Route::middleware(['auth:sanctum', 'verified'])->get('/ratios/probarRatio',[EstadosImportarController::class,'probarRatio' ])->name('ratios.probar');

// G R A F I C O S
Route::middleware(['auth:sanctum', 'verified'])->get('/grafico/probarGrafico',[GraficosController::class,'probarGrafico' ])->name('grafico.probar');

Route::middleware(['auth:sanctum', 'verified'])->get('/grafico/ratio1',[GraficosController::class,'graficoRatio1' ])->name('grafico.ratio1');
Route::middleware(['auth:sanctum', 'verified'])->get('/grafico/ratio2',[GraficosController::class,'graficoRatio2' ])->name('grafico.ratio2');
Route::middleware(['auth:sanctum', 'verified'])->get('/grafico/ratio3',[GraficosController::class,'graficoRatio3' ])->name('grafico.ratio3');
Route::middleware(['auth:sanctum', 'verified'])->get('/grafico/ratio4',[GraficosController::class,'graficoRatio4' ])->name('grafico.ratio4');

// C O M P A R A R
Route::middleware(['auth:sanctum', 'verified'])->get('/ratios/{id}/comparacion/{anio}',[EstadosImportarController::class,'comparacioEmpresas' ])->name('empresas.comparar');
Route::middleware(['auth:sanctum', 'verified'])->get('/ratios/comparacion/datos/{anio}',[EstadosImportarController::class,'comparacionDatos' ])->name('datos.comparar');

//T A B L A S        C A T A L O G O 
Route::middleware(['auth:sanctum', 'verified'])->get('/catalogos',[EstadosImportarController::class,'catalogos' ])->name('catalogos.inicio');
Route::middleware(['auth:sanctum', 'verified'])->post('/catalgos/tipo',[EstadosImportarController::class,'guardarTipo' ])->name('guardar.tipo');
Route::middleware(['auth:sanctum', 'verified'])->post('/catalgos/empresa',[EstadosImportarController::class,'guardarEmpresa' ])->name('guardar.empresa');
Route::middleware(['auth:sanctum', 'verified'])->post('/catalgos/ratio',[EstadosImportarController::class,'guardarRatio' ])->name('guardar.ratio');


//Variacion de cuentas
Route::middleware(['auth:sanctum', 'verified'])->get('/cuentas/variacion',[EstadosImportarController::class,'cuentasVariacion' ])->name('cuentas.variacion');
Route::middleware(['auth:sanctum', 'verified'])->get('/cuentas/variacion/datos/{id}',[EstadosImportarController::class,'cuentasVariacionDatos' ])->name('variacion.datos');

//Analisis
Route::middleware(['auth:sanctum', 'verified'])->get('/analisis/inicio',[EstadosImportarController::class,'analisisInicio' ])->name('analisis.inicio');
Route::middleware(['auth:sanctum', 'verified'])->get('/analisis/{anios}',[EstadosImportarController::class,'analisisDatos' ])->name('analisis.datos');

//Subir Catalogo
Route::middleware(['auth:sanctum', 'verified'])->get('/catalogo/subir',[EstadosImportarController::class,'catalogoSubir' ])->name('catalogo.subir');
Route::middleware(['auth:sanctum', 'verified'])->post('/catalogo/subr',[EstadosImportarController::class,'guardarCatalogo' ])->name('guardar.catalogo');

//permisos
Route::middleware(['auth:sanctum', 'verified'])->get('/permisos/inicio',[EstadosImportarController::class,'permisosUsuario' ])->name('permisos.inicio');
Route::middleware(['auth:sanctum', 'verified'])->get('/permisos/tabla',[EstadosImportarController::class,'permisosData' ])->name('permisos.data');
Route::middleware(['auth:sanctum', 'verified'])->post('/permisos/modificar',[EstadosImportarController::class,'permisosModificar' ])->name('permisos.modificar');