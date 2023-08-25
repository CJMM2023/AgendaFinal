<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index(){
        $nota = Nota::paginate(10);
        return view('Nota.RaizNota')->with('notas',$notas);
    }
    public function show($id){
        $nota = Nota::findOrfail($id);
        return view('Nota.verNota')->with('nota',$nota); //mostrar un nota individual
    }
    public function create(){
        $contactos = Contacto::all();
        return view('Nota.formularioNota')->with('contactos',$contactos);
    }
    public function store (Request $request){
        $request->validate([
            'contacto'=>'required',
            'texto'=>'required|regex:/^[\pLñÑ0-9;:(),.\s\-]+$/u|min:3|max:150',
            'fecha'=>'required|date',

        ],[
            'contacto.required'=>'El contacto es obligatorio',

            'texto.required'=>'La descripción es obligatorio',
            'texto.regex'=>'La descripción tiene un caracter no permitido',

            'fecha.required'=>'La fecha es obligatoria',
            'fecha.date'=>'El dato debe ser de tipo fecha',  
        ]);
        $nuevoNota = new Nota();
        $nuevoNota->texto=$request->input('texto');
        $nuevoNota->fecha=$request->input('fecha');
        $nuevoNota->contacto_id=$request->input('contacto');

        $creado=$nuevoNota->save();
        if($creado){
            return redirect()->route('nota.index')->with ('mensaje','La nota fue creada exitosamente');
        }else{
            return back();
            
        }
    }
    //editar
    public function edit ($id){
        $contactos = Contacto::all();
        $nota = Nota::findOrfail($id);
        return view('Nota.editarNota')->with('nota',$nota)->with('contactos',$contactos);
    }
    //actualizar
    public function update (Request $request , $id){

        $request->validate([
            'contacto'=>'required',
            'texto'=>'required|regex:/^[\pLñÑ0-9;:(),.\s\-]+$/u|min:3|max:150',
            'fecha'=>'required|date',

        ],[
            'contacto.required'=>'El contacto es obligatorio',

            'texto.required'=>'La descripción es obligatorio',
            'texto.regex'=>'La descripción tiene un caracter no permitido',

            'fecha.required'=>'La fecha es obligatoria',
            'fecha.date'=>'El dato debe ser de tipo fecha',  
        ]);
        
        $nota = Nota::findOrFail($id);
        $nota->texto=$request->input('texto');
        $nota->fecha=$request->input('fecha');
        $nota->contacto_id=$request->input('contacto');

        $creado=$nota->save();
        if($creado){
            return redirect()->route('nota.index')->with ('mensaje','La nota fue actualizada exitosamente');
        }else{
            return back();
            
        }
    }
    public function destroy($id)
    {
        Nota::destroy($id);
        return redirect()->route('nota.index')->with('mensaje', 'Nota borrada correctamente');
    }
}