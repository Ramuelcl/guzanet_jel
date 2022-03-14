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
        $request->validate([
            'name' => 'required',
            'description' => 'required|min:5',
            // 'category'=>'',
        ], [
            'name.required' => 'El nombre es requerido.',
            'description.required' => 'La descripción es requerida.',
            // 'category'=>'',
        ]);
        $curso =Curso::create($request->all());
        return \redirect()->route('cursos.show', $curso)->with('success', 'Registro creado satisfactoriamente.');
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
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required|min:5',
        ], [
            'name.required' => 'El nombre es requerido.',
            'description.required' => 'La descripción es requerida.',
        ]);

        $curso->update($request->all());

        return \redirect()->route('cursos.show', $curso)->with('success', 'Registro actualizado satisfactoriamente.');
    }

//     public function store(Request $request)
//     {
//         $data = $request->validate([
//             'name' => 'required',
//             'password' => 'required|min:5',
//             'email' => 'required|email|unique:users'
//         ], [
//             'name.required' => 'Name field is required.',
//             'password.required' => 'Password field is required.',
//             'email.required' => 'Email field is required.',
//             'email.email' => 'Email field must be email address.'
//         ]);

//         $data['password'] = bcrypt($data['password']);

//         User::create($data);

//         return back()->with('success', 'User created successfully.');
//     }

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cursos\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return \redirect()->route('cursos.index')->with('success', 'Registro eliminado satisfactoriamente.');
    }
}
