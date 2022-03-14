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
        $cursos=Curso::orderby('id', 'desc')->paginate(5);
        return \view('cursos.index', compact('cursos'));
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
        // \dd($request);
        $curso=new Curso;

        $curso->name=$request->name;
        $curso->description=$request->description;
        $curso->category=$request->category;

        $curso->save();

        return \redirect()->route('cursos.index')->with('success', 'hecho');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cursos\Curso  $curso
     * @return \Illuminate\Http\Response
     */

    public function show(Curso $curso)
    {
        // $curso=Curso::find($id);
        // dd($curso);
        return \view('cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cursos\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        return \view('cursos.edit', compact('curso'));

        // $curso=Curso::find($id);
        // $curso->name=$request->name;
        // $curso->description=$request->description;
        // $curso->category=$request->category;

        // $curso->save();
        return $curso;
        // return \redirect()->route('cursos.show', $curso)->with('success', 'Project aangepast');
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
