<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(){
    $eventos = Evento::paginate(10);
    return view('Evento.RaizEvento')->with('eventos',$eventos);
    }
    public function show($id){
        $evento = Evento::findOrfail($id);
        return view('Evento.verEvento')->with('evento',$evento); //mostrar un evento individual
    }
    public function create(){
        $contactos = Contacto::all();
        return view('Evento.formularioEvento')->with('contactos',$contactos);
    }
    public function store (Request $request){
        $request->validate([
            'titulo'=>'required|regex:/^[a-zA-Z\s\pLñÑ\.]+$/|max:50|min:3',
            'descripcion'=>'required|regex:/^[\pLñÑ0-9;:(),.\s\-]+$/u|min:3|max:150',
            'fecha_inicio'=>'required|date',
            'fecha_final'=>'required|date',
            'contacto'=>'required',

        ],[

            'titulo.required'=>'El título es obligatorio',
            'titulo.regex'=>'El título tiene un caracter no permitido',

            'descripcion.required'=>'La descripción es obligatorio',
            'descripcion.regex'=>'La descripción tiene un caracter no permitido',

            'fecha_inicio.required'=>'La fecha es obligatoria',
            'fecha_inicio.date'=>'El dato debe ser de tipo fecha',

            'fecha_final.required'=>'La fecha es obligatoria',
            'fecha_final.date'=>'El dato debe ser de tipo fecha',

            'contacto.required'=>'El contacto es obligatorio'
        ]);

        $nuevoEvento = new  Evento();
        $nuevoEvento->titulo=$request->input('titulo');
        $nuevoEvento->descripcion=$request->input('descripcion');
        $nuevoEvento->fecha_inicio=$request->input('fecha_inicio');
        $nuevoEvento->fecha_final=$request->input('fecha_final');
        $nuevoEvento->contacto_id=$request->input('contacto');
            
        $creado=$nuevoEvento->save();
        if($creado){
            return redirect()->route('Evento.index')->with ('mensaje','El evento fue creado exitosamente');
        }else{
            return back();    
        }
    }
    //editar
    public function edit ($id){
    $contactos = Contacto::all();
    $evento = Evento::findOrfail($id);
    return view('Evento.editarEvento')->with('evento',$evento)->with('contactos',$contactos);
    }

    //actualizar
    public function update (Request $request , $id){

        $request->validate([
            'titulo'=>'required|regex:/^[a-zA-Z\s\pLñÑ\.]+$/|max:50|min:3',
            'descripcion'=>'required|regex:/^[\pLñÑ0-9;:(),.\s\-]+$/u|min:3|max:150',
            'fecha_inicio'=>'required|date',
            'fecha_final'=>'required|date',
            'contacto'=>'required',

        ],[

            'titulo.required'=>'El título es obligatorio',
            'titulo.regex'=>'El título tiene un caracter no permitido',

            'descripcion.required'=>'La descripción es obligatorio',
            'descripcion.regex'=>'La descripción tiene un caracter no permitido',

            'fecha_inicio.required'=>'La fecha es obligatoria',
            'fecha_inicio.date'=>'El dato debe ser de tipo fecha',

            'fecha_final.required'=>'La fecha es obligatoria',
            'fecha_final.date'=>'El dato debe ser de tipo fecha',

            'contacto.required'=>'El contacto es obligatorio'
        ]);

        $evento = Evento::findOrFail($id);
        $evento->titulo=$request->input('titulo');
        $evento->descripcion=$request->input('descripcion');
        $evento->fecha_inicio=$request->input('fecha_inicio');
        $evento->fecha_final=$request->input('fecha_final');
        $evento->contacto_id=$request->input('contacto');
        
        $creado= $evento->save();
        if($creado){
            return redirect()->route('Evento.index')->with ('mensaje', "".$evento->titulo." se actualizó correctamente");
        }else{
            return back();    
        }
    }

    public function destroy($id)
    {
        Evento::destroy($id);
        return redirect()->route('Evento.index')->with('mensaje', 'Evento borrado correctamente');
    }
}
