<?php

namespace App\Http\Controllers\inicio;

use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return \view('home');
    }

    // seccion contactanos
    public function enviar(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'messagge' => 'required',
        ], [
            'name.required' => 'El nombre es requerido.',
            'email.required' => 'eMail requerido',
            'email.email' => 'debe ser un eMail válido',
            'messagge.required' => 'Su mensaje es importante para mi.',
        ]);

        $correo=new ContactanosMailable($request->all());
        Mail::to('ramuelcl@gmail.com')->send($correo);
        return \redirect()->route('contactanos')->with('info', 'Correo enviado satisfactoriamente.');
    }
}
