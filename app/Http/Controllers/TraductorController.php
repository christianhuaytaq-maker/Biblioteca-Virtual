<?php

namespace App\Http\Controllers;

use App\Models\Traductor;

class TraductorController extends Controller
{
    public function index()
    {
        $traductores = Traductor::all();
        return view('traductores.index', compact('traductores'));
    }
}
