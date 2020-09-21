<?php

namespace App\Http\Controllers;

use App\pacientes;
use Illuminate\Http\Request;

class descargoMedicoController extends Controller
{
    public function make(Request $request)
    {
        $tipo=$request->input('tipo');
        $paciente=pacientes::where('pa_id',$request->input('paciente'))->first();
        return view('ProceMedicos.descargoQuirurgico',compact('paciente'))->with('tipo',$tipo);
    }
}
