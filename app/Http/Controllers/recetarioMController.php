<?php

namespace App\Http\Controllers;

use App\recetarioM;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $rm->ca_usu_cod = Auth::user()->id;
        $rm->ca_tipo = 'create';
        $rm->ca_fecha = Carbon::now();
        $rm->ca_estado = '1';
        $r = $rm->save();

        $re = ($r) ? 1 : 0;

        return ['a' => $re, 'b' => ($rm->id)];
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function pdfReceta()
    {
        $a = array();
        $a = [1, 2, 3, 4, 5, 6, 7, 8];
        $a = implode(",",$a);
        // return $a;
        return  QrCode::generate($a);
        // return view('recetario.receta_a');
        // $dompdf = new Dompdf();
        $dompdf = PDF::loadView('recetario.receta_a');
        $dompdf->setPaper('letter', 'portrait');
        return $dompdf->stream('invoice.pdf');
    }
}
