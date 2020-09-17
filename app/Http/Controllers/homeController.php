<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    public function index()
    {   
        if(Auth::user()->usu_area == 'Quirofano')
        {
            return view('home1');
        }
        return view('home');
    }
}
