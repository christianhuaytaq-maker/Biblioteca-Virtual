<?php

namespace App\Http\Controllers;

use App\Models\Editor;

class EditorController extends Controller
{
    public function index()
    {
        $editores = Editor::all();
        return view('editoriales.index', compact('editores'));
    }
}
