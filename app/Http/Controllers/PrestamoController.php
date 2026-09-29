<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with(['libro', 'usuario'])->get();
        return view('prestamos.index', compact('prestamos'));
    }
}
