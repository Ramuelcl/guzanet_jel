<?php

namespace App\Http\Controllers\curso;

use App\Models\cursos\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('cursos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cursos\Curso  $curso
     * @return \Illuminate\Http\Response
     */

    public function show($curso, $categoria=null)
    {
        if ($categoria==null) {
            return \view('cursos.show', compact('curso'));
        } else {
            return \view('cursos.show', compact('curso', 'categoria'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cursos\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cursos\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cursos\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
    }
}
