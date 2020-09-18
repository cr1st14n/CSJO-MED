<?php

namespace App\Http\Controllers;

use App\pacientes;
use Illuminate\Http\Request;

class descargoMedicoContrller extends Controller
{
    public function index(Request $request)
    {
        $paciente=pacientes::where('pa_di',$request->pacientes)->first();
        return view('ProceMedicos.descargoQuirurgico')->compact('pacientes');
    }
}
