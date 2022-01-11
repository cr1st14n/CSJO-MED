<?php

namespace App\Http\Controllers;

use App\atencion;
use App\citPrev;
use App\historiaClincia;
use App\pacientes;
use App\recetarioM;
use App\signosvitales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoriaClinciaController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function showHCL(Request $request)
    {
        $paciente = pacientes::where('pa_id', $request->input('id'))->first();
        $fechnac = $paciente->pa_fechnac;
        $fechnac = Carbon::parse($fechnac)->format('d-m-Y');
        $receta = recetarioM::where('id_Paciente', $request->input('id'))
            ->join('Users as u', 'u.id', '=', 'recetario_m_s.id_usuMed')
            ->select('recetario_m_s.*')
            ->addSelect('u.usu_nombre', 'u.usu_appaterno', 'u.usu_apmaterno')
            ->get();
        $vista = view('paciente.hcl')
            ->with('paciente', $paciente)
            ->with('fechnac', $fechnac)
            ->with('receta', $receta);
        return $vista;
    }

    public function showSigVi(Request $request)
    {
        $sv = '';
        $date = '';
        $estado = '';
        $sv = signosvitales::where('sv_idPaciente', $request->input('id'))->latest('id')->first();
        if ($sv == null) {
            // return 'sin datos';
            $sv = 'sin datos';
            
        }else {
            $date = $sv['created_at'];
            if ($date == Carbon::now()->format('Y-m-d')) {
                $estado = 1;
            } else {
                $estado = 0;
            }
        }
        // return $date = Carbon::parse($date)->format('Y-m-d');
        // return $date;

        $mc = atencion::where('id', $request->input('id2'))->value('ate_descripcion');

        return ['sv' => $sv, 'date' => $date, 'estado' => $estado, 'mc' => $mc];
    }

    public function colaPacienteMedAten(Request $request)
    {
        // citPrev::join('pacientes','pacientes.pa_id','cp_paciente')
        // ->where('cp_med',17)->where('cp_estado',1)->orderBy('cp_time','asc')W
        // ->select('cit_prevs.*','pacientes.pa_nombre','pacientes.pa_appaterno')
        // ->get();


        $resp = atencion::where('atencion.ate_estAteMed', 0)
            ->Where('ate_med', Auth::user()->id)
            ->Where('ate_pago', 'cancelado')
            ->whereDate('atencion.created_at', Carbon::now()->format('Y-m-d'))
            ->join('pacientes as pa', 'pa.pa_id', 'atencion.pa_id')
            ->select('atencion.id', 'atencion.pa_id', 'atencion.ate_procedimiento', 'pa.pa_nombre', 'pa.pa_appaterno')->limit('10')->get();

        return $resp;
    }
    public function nroPacienteCola()
    {
        return citPrev::where('cp_med', 17)->where('cp_estado', 1)->count();
    }
    public function concluirAte(Request $request)
    {
        $res = atencion::where('id', $request->input('id'))->update(['ate_estAteMed' => 1]);
        return ["estado" => $res, 'id' => $request->input('id')];
    }
}
