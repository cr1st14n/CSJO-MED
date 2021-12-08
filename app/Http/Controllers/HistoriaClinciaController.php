<?php

namespace App\Http\Controllers;

use App\atencion;
use App\citPrev;
use App\historiaClincia;
use App\pacientes;
use App\recetarioM;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoriaClinciaController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
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
        $receta=recetarioM::where('id_Paciente',$request->input('id'))
                ->join('Users as u','u.id','=','recetario_m_s.id_usuMed')
                ->select('recetario_m_s.*')
                ->addSelect('u.usu_nombre','u.usu_appaterno','u.usu_apmaterno')
                ->get();
        $vista= view('paciente.hcl')
                ->with('paciente',$paciente)
                ->with('fechnac',$fechnac) 
                ->with('receta',$receta); 
        return $vista;
    }

    public function edit(historiaClincia $historiaClincia)
    {
        //
    }

    public function update(Request $request, historiaClincia $historiaClincia)
    {
        //
    }

    public function destroy(historiaClincia $historiaClincia)
    {
        //
    }
    public function colaPacienteMedAten(Request $request)
    {
        // citPrev::join('pacientes','pacientes.pa_id','cp_paciente')
        // ->where('cp_med',17)->where('cp_estado',1)->orderBy('cp_time','asc')
        // ->select('cit_prevs.*','pacientes.pa_nombre','pacientes.pa_appaterno')
        // ->get();

        $resp=atencion::where('atencion.ate_estAteMed',0)
        ->Where('ate_med',Auth::user()->id)
        ->Where('ate_pago','cancelado')
        ->whereDate('atencion.created_at',Carbon::now()->format('Y-m-d'))
        ->join('pacientes as pa','pa.pa_id','atencion.pa_id')
        ->select('atencion.id','atencion.pa_id','atencion.ate_procedimiento','pa.pa_nombre','pa.pa_appaterno')->limit('10')->get();
        return $resp;
    }
    public function nroPacienteCola()
    {
        return citPrev::where('cp_med',17)->where('cp_estado',1)->count();
    }
    public function concluirAte(Request $request)
    {
        $res=atencion::where('id',$request->input('id'))->update(['ate_estAteMed'=>1]); 
        return ["estado"=>$res,'id'=>$request->input('id')];       
    }
}
