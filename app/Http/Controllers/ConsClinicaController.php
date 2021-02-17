<?php

namespace App\Http\Controllers;

use App\consClinica;
use Illuminate\Http\Request;

class ConsClinicaController extends Controller
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
       return'holaaaa';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\consClinica  $consClinica
     * @return \Illuminate\Http\Response
     */
    public function show(consClinica $consClinica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\consClinica  $consClinica
     * @return \Illuminate\Http\Response
     */
    public function edit(consClinica $consClinica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\consClinica  $consClinica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, consClinica $consClinica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\consClinica  $consClinica
     * @return \Illuminate\Http\Response
     */
    public function destroy(consClinica $consClinica)
    {
        //
    }
}
