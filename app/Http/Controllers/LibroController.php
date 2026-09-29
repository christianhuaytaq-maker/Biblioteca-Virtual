<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Editor;
use App\Models\Traductor;

class LibroController extends Controller
{
    // Panel de administración con búsqueda y filtro
    public function index(Request $request)
    {
        $query = Libro::query();

        // Búsqueda por título
        if ($request->has('buscar') && $request->buscar != '') {
            $query->where('Titulo', 'LIKE', '%' . $request->buscar . '%');
        }

        // Filtro por género
        if ($request->has('genero') && $request->genero != '') {
            $query->where('genero', $request->genero);
        }

        $libros = $query->get();
        $totalAutores = Autor::count();
        $totalEditores = Editor::count();
        $totalTraductores = Traductor::count();

        // Lista de géneros únicos para el filtro
        $generos = Libro::select('genero')->distinct()->pluck('genero');

        return view('libros.index', compact('libros', 'totalAutores', 'totalEditores', 'totalTraductores', 'generos'));
    }

    // Catálogo de libros
    public function catalogo()
    {
        $libros = Libro::with(['autor', 'editor', 'traductor'])->get();
        return view('libros.catalogo', compact('libros'));
    }

    // Formulario para crear libro
    public function create()
    {
        $autores = Autor::all();
        $editores = Editor::all();
        $traductores = Traductor::all();
        return view('libros.create', compact('autores', 'editores', 'traductores'));
    }

    // Guardar nuevo libro
    public function store(Request $request)
    {
        $request->validate([
            'Titulo' => 'required',
            'Tipo' => 'required',
            'ID_autor' => 'required',
            'ID_editor' => 'required',
            'ID_traductor' => 'required',
            'genero' => 'required',
            'imagen' => 'required',
        ]);

        Libro::create($request->all());

        return redirect()->route('panel')->with('success', 'Libro agregado correctamente');
    }
}
