<?php

namespace App\Http\Controllers;

use App\pacientes;
use App\recetarioM;
use App\User;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Barryvdh\DomPDF\PDF;
// use Dompdf\Dompdf;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCode;

class recetarioMController extends Controller
{

    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $rm = new recetarioM();
        $rm->id_usuMed = Auth::user()->id;
        $rm->id_Paciente = $request['paciente'];
        $rm->rm_Contenido = serialize($request['data']);
        $rm->rm_detalleRecete = $request['detalleRecete'];

        $rm->ca_usu_cod = Auth::user()->id;
        $rm->ca_tipo = 'create';
        $rm->ca_fecha = Carbon::now();
        $rm->ca_estado = '1';
        $r = $rm->save();

        $re = ($r) ? 1 : 0;

        return ['a' => $re, 'b' => ($rm->id)];
    }

    public function list($id)
    {
        return recetarioM::where('id_paciente',$id)->first();
    }


    public function pdfReceta($data)
    {
        // return $data;
        $a = array();
        $a = [1, 2, 3, 4, 5, 6, 7, 8];
        $a = implode(",",$a);
        // return $a;
        $datos = recetarioM::where('id',$data)->first();
        $medico= User::where('id',$datos['id_usuMed'])->select('usu_nombre','usu_apPaterno','usu_apMaterno')->first();
        $medic=unserialize($datos['rm_Contenido']);

        // return $medic;

        $descMedic=$datos['rm_detalleRecete'];
        
        $Paciente= pacientes::where('pa_id',$datos['id_Paciente'])->select('pa_id','pa_nombre','pa_appaterno','pa_apmaterno')->first();
        $Paciente1=''.$Paciente['pa_nombre'].' '.$Paciente['pa_appaterno'].'  '. $Paciente['pa_apmaterno'].'';
        // return $medic;
        $recetaA='"Centro de salud Jesus Obero"  '.
        '  medico:  '.$medico['usu_nombre']  .$medico['usu_apPaterno']  .$medico['usu_apMaterno']  .
        '  Paciente:  '.$Paciente['pa_nombre'].' '.$Paciente['pa_appaterno'].'  '. $Paciente['pa_apmaterno']  .
        '  fecha:  '.$datos['created_at']  .''  
        ;
        // return $recetaA;
        $receta= array();
        $cont=0;
        foreach ($medic as $key => $value) {
            
            $data='  *'.($key+1).') medicamento:'. $value['a'].
            ',Forma:'. $value['b'].
            ',Via:'. $value['c'].
            ',Dosis:'. $value['d'].' ';
            array_push($receta, $data);
        }
        // return $receta;
        $recetaB= implode(",",$receta); 
        // return $recetaC= $recetaA

        $datosQr= ''.$recetaA.''.$recetaB.'';
        // return $datosQr;
        $Qr= QrCode::generate($recetaA);
        // return view('recetario.receta_a');
        // $dompdf = new Dompdf();
        $dompdf = PDF::loadView('recetario.receta_a',["qr"=>$Qr,"medico"=>$medico,"paciente1"=>$Paciente1,"descMedico"=>$descMedic,"farmacos"=>$medic]);
        $dompdf->setPaper('A5', 'portrait');
        return $dompdf->stream('invoice.pdf');
    }
}
