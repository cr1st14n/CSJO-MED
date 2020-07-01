<?php

namespace App\Http\Controllers;

use App\cotizacion;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cot=new cotizacion();
        $cot->cot_id_paciente=$request->input('id_paciente_new_cotizacion');
        $cot->cot_EspecialidadCirugia->filter_input
        $cot->cot_tipoCirugia->filter_input
        $cot->cot_tiempoAproximado->filter_input
        $cot->cot_cirujanoHonorarios->filter_input
        $cot->cot_espAneesteseologo->filter_input
        $cot->cot_quirofanoMayor->filter_input
        $cot->cot_salaEndoscopia->filter_input
        $cot->cot_salaPartos->filter_input
        $cot->cot_equipoLaparosopica->filter_input
        $cot->cot_ayudante1->filter_input
        $cot->cot_ayudante2->filter_input
        $cot->cot_instrumentador->filter_input
        $cot->cot_circulante->filter_input
        $cot->cot_oxigeno->filter_input
        $cot->cot_agujaK->filter_input
        $cot->cot_insumoQuirofano->filter_input
        $cot->cot_medicamentosQuirofano->filter_input
        $cot->cot_otros->filter_input
        $cot->cot_procedimiento->filter_input
        return $request;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show(cotizacion $cotizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cotizacion $cotizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(cotizacion $cotizacion)
    {
        //
    }
}
