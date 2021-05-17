<?php

namespace App\Http\Controllers;

use App\laboratorio;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\PDF as PDF;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class LaboratorioController extends Controller
{
    
    public function storeLab(Request $request )
    {
        $new=new laboratorio();
        $new->id_paciente=$request['a']['paciente'];
        $new->lab_respaldo=$request['a']['respaldo'];
        $new->lab_tipoPago=$request['a']['tipoDePago'];
        $new->lab_data=serialize($request['b']);
        $n=$new->save();
        return ["estR"=>$n,"idR"=>$new->id];
    }

    public function showHistLabPaci(Request $request)
    {
         $co= (unserialize(laboratorio::where('id_paciente',$request->paciente)->value('lab_data')))['0']['data'];
         
         $cat= laboratorio::where('id_paciente',$request->paciente)
        //  ->selectRaw(unserialize('laboratorios.lab_data'),'as data')
        //  ->addSelect('laboratorios.*')
         ->get();
         $data=0;
         $cadena=array();
         foreach ($cat as $key => $value) {
             $data=unserialize($value['lab_data']);
             array_push($cadena,['lab'=>$value,'cont'=>$data]);
         }
         return $cadena;

        
    }

    public function showPdfPaciente($data,Request $request)
    {
        return $data;
        $da=["nombre"=>3];        
        $dompdf = PDF::loadView('laboratorio.labViewPdf',["da"=>$da]);
        // return View('laborato1rio.labViewPdf');
        // $dompdf = PDF::loafView();
        $dompdf->setPaper('letter', 'portrait');
        return $dompdf->stream('invoice.pdf');
    }

    public function edit(laboratorio $laboratorio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, laboratorio $laboratorio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(laboratorio $laboratorio)
    {
        //
    }
}
