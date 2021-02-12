<?php

namespace App\Http\Controllers;

use App\servrx;
use Illuminate\Http\Request;

use App\File;
use Carbon\Carbon;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServrxController extends Controller
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
    public function store(Request $request,$paciente)
    {
        // return $request;
        //* correr en terminal el comando php artisan storage link
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);
        $imagenes = $request->file('file')->store('public/imagenes');
        $url = Storage::url($imagenes);
        $file=new servrx();
        $file->id_paciente=$paciente;
        $file->rx_rutaImagen="public$url";
        $file->rx_descripcion=$request->input('rxDescImagen');
        $file->ca_usu_cod=Auth::user()->id;
        $file->ca_tipo='create';
        $file->ca_fecha=Carbon::now();
        $file->ca_estado='1';
        $res= $file->save();
        $retVal = ($res) ? 1 : 0 ;
        return $retVal;
    }

    public function show(servrx $servrx)
    {
        //
    }

    public function edit(servrx $servrx)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\servrx  $servrx
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, servrx $servrx)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\servrx  $servrx
     * @return \Illuminate\Http\Response
     */
    public function destroy(servrx $servrx)
    {
        //
    }

    public function listPaciSerRX(Request $request)
    {
        return servrx::where('id_paciente',$request->input('paciente'))->get();
    }
    public function showPlacaRX(Request $request)
    {
        return servrx::where('id',$request->input('id_rx'))->first();
    }
}
