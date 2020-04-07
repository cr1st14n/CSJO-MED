<?php

namespace App\Http\Controllers;

use App\historiaClincia;
use App\pacientes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoriaClinciaController extends Controller
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
    public function create()
    {
        //
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
     * @param  \App\historiaClincia  $historiaClincia
     * @return \Illuminate\Http\Response
     */
    public function showHCL(Request $request)
    {
        $paciente=pacientes::where('pa_id',$request->input('id'))->first();
        $fechnac=$paciente->pa_fechnac;
        $fechnac=Carbon::parse($fechnac)->format('d-m-Y');
        $vista= view('paciente.hcl')->with('paciente',$paciente)->with('fechnac',$fechnac); 
        return $vista;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\historiaClincia  $historiaClincia
     * @return \Illuminate\Http\Response
     */
    public function edit(historiaClincia $historiaClincia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\historiaClincia  $historiaClincia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, historiaClincia $historiaClincia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\historiaClincia  $historiaClincia
     * @return \Illuminate\Http\Response
     */
    public function destroy(historiaClincia $historiaClincia)
    {
        //
    }
}
