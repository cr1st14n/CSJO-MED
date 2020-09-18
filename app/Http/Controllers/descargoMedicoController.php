<?php

namespace App\Http\Controllers;

use App\pacientes;
use Illuminate\Http\Request;

class descargoMedicoController extends Controller
{
    public function make(Request $request)
    {
        // return "qwer";
        $paciente=pacientes::where('pa_id',$request->input('paciente'))->first();
        return view('ProceMedicos.descargoQuirurgico',compact('paciente'));
    }
}
