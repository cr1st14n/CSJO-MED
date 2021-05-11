<?php

namespace App\Http\Controllers;

use App\laboratorio;
use Illuminate\Http\Request;

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
        return $n;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showHistLabPaci(Request $request)
    {
         return laboratorio::where('id_paciente',$request->paciente)->get();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function show(laboratorio $laboratorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
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
