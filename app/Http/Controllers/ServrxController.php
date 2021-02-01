<?php

namespace App\Http\Controllers;

use App\servrx;
use Illuminate\Http\Request;

use App\File;
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
    public function store(Request $request)
    {
        //* correr en terminal el comando php artisan storage link
        // return $request;
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        $imagenes = $request->file('file')->store('public/imagenes');

        $url = Storage::url($imagenes);
        // return $url;
        $file=new servrx();
        $file->id_paciente=Auth::user()->id;
        $file->rx_rutaImagen=$url;
        $file->save();
        return '1';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\servrx  $servrx
     * @return \Illuminate\Http\Response
     */
    public function show(servrx $servrx)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\servrx  $servrx
     * @return \Illuminate\Http\Response
     */
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
}
