<?php

use App\descargoMedicoCont;
use App\Http\Controllers\ServrxController;
use Facade\FlareClient\View;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::get('dev1', function () {
    return view('recetario.receta_a');
});

Route::get('/', function () {
    return view('auth.SysLogin');
})->middleware('guest')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('home', 'homeController@index')->name('home');
Route::group(['prefix' => 'historiaClinica'], function () {
    Route::get('hcl', 'HistoriaClinciaController@showHCL');
    Route::get('colaPacienteMedAten', 'HistoriaClinciaController@colaPacienteMedAten');
    Route::get('nroPacienteCola', 'HistoriaClinciaController@nroPacienteCola');
});
Route::group(['prefix' => 'cotizacion'], function () {
    Route::post('create', 'CotizacionController@create');
});
Route::group(['prefix' => 'Descargo'], function () {
    Route::get('make', 'descargoMedicoController@make');
    Route::apiResource('desMed', descargoMedicoController::class, ['only' => ['store']]);
    Route::apiResource('desMedCont', descargoMedicoContController::class);
});
Route::group(['prefix' => 'recetarioM'], function () {
    route::POST('create', 'recetarioMController@create');
    Route::get('pdf_recetamedica/{receta}', 'recetarioMController@pdfReceta');
});
Route::Group(['prefix' => 'signosVitales'], function () {
    route::post('store/{paciente}', 'SignosvitalesController@store');
    route::get('list1', 'SignosvitalesController@list1');
});
Route::Group(['prefix' => 'servRX'], function () {
    route::post('store/{paciente}','ServrxController@store')->name('312654');
    route::get('listPaciSerRX/','ServrxController@listPaciSerRX');
    route::get('showPlacaRX/','ServrxController@showPlacaRX');
    route::get('delete/{id}','ServrxController@delete');
    route::post('delete/{id}',[ServrxController::class,'delete']);
});
