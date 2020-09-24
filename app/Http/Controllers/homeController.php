<?php

namespace App\Http\Controllers;

use App\descargoItem;
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
        if (Auth::user()->usu_area == 'Quirofano') {
             $items1 = descargoItem::where('dmi_tipo','medicamento')->get();
             $items2 = descargoItem::where('dmi_tipo','insumo')->get();
            return view('home1',compact(['items1','items2']));
        }
        return view('home');
    }
}
