<?php

namespace App\Http\Controllers\curso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return \view('cursos.index');
    }
    public function show($curso, $categoria=null)
    {
        if ($categoria==null) {
            return \view('cursos.show', compact('curso'));
        } else {
            return \view('cursos.show', compact('curso', 'categoria'));
        }
    }
    public function create()
    {
        return \view('cursos.create');
    }
}
