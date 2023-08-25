<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index(){
        $contactos=Contacto::paginate(10);
        return view('Contacto.RaizContacto')->with('contactos',$contactos);
    }
    public function show($id){
        $contactos=Contacto::findOrfail($id);
        return view('contactoIndividual')->with('contactos',$contactos); //mostrar un contacto individual

    }
    public function create(){
        return view('Contacto.formularioContacto'); //Envia al formulario
    }
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|regex:/^[a-zA-Z\s\pLñÑ\.]+$/|max:50|min:3',
            'apellido' => 'required|regex:/^[a-zA-Z\s\pLñÑ\.]+$/|max:50|min:3',
            'tel' => 'required|unique:contactos,telefono',
            'correo'=>'required|regex:/(.+)@(.+)\.(.+)$/|min:12|max:50|unique:contactos,correo_electronico',

        ],[
            'nombre.required' => 'El nombre no puede estar vacío',
            'nombre.regex'=> 'El nombre tiene caracteres no permitidos',
            'nombre.max' => 'El nombre es muy extenso',
            'nombre.min' => 'El nombre es muy corto',

            'apellido.required' => 'El apellido no puede estar vacío',
            'apellido.regex'=> 'El apellido tiene caracteres no permitidos',
            'apellido.max' => 'El apellido es muy extenso',
            'apellido.min' => 'El apellido es muy corto',

            'correo.required'=>'El correo es obligatorio',
            'correo.regex'=>'El correo es incorrecto, ejemplo:(usuario@mail.com ó usuario@mail.es)' ,
            'correo.min'=>'El correo es muy corto' ,
            'correo.max'=>'El correo es muy extenso' ,
            'correo.unique'=>'El correo ingresado ya existe',

            'tel.required' => 'El número telefónico es obligatorio',
            'tel.unique'=>'El teléfono ingresado ya existe',

        ]);
        
        $nuevoContacto = new Contacto();
        $nuevoContacto->nombre=$request->input('nombre');
        $nuevoContacto->apellido=$request->input('apellido');
        $nuevoContacto->correo_electronico=$request->input('correo');
        $nuevoContacto->telefono=$request->input('tel');

        $creado=$nuevoContacto->save();
        if($creado){
            return redirect()->route('Contacto.index')->with ('mensaje','El contacto fue creado exitosamente');
        }else{
            return back();
        }

    }
    //editar
    public function edit ($id){
        $contacto = Contacto::findOrfail($id);
        return view('Contacto.editarContacto')->with('contacto',$contacto);
    }
    //actualizar
    public function update (Request $request , $id){
        $contacto = Contacto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|regex:/^[a-zA-Z\s\pLñÑ\.]+$/|max:50|min:3',
            'apellido' => 'required|regex:/^[a-zA-Z\s\pLñÑ\.]+$/|max:50|min:3',
            'correo'=>['required','regex:/(.+)@(.+)\.(.+)$/','min:12','max:50'],
            'tel' => ['required',],
        ],[
            'nombre.required' => 'El nombre no puede estar vacío',
            'nombre.regex'=> 'El nombre tiene caracteres no permitidos',
            'nombre.max' => 'El nombre es muy extenso',
            'nombre.min' => 'El nombre es muy corto',

            'apellido.required' => 'El apellido no puede estar vacío',
            'apellido.regex'=> 'El apellido tiene caracteres no permitidos',
            'apellido.max' => 'El apellido es muy extenso',
            'apellido.min' => 'El apellido es muy corto',

            'correo.required'=>'El correo es obligatorio',
            'correo.regex'=>'El correo es incorrecto, ejemplo:(usuario@mail.com ó usuario@mail.es)' ,
            'correo.min'=>'El correo es muy corto' ,
            'correo.max'=>'El correo es muy extenso' ,
            'correo.unique'=>'El correo ingresado ya existe',

            'tel.required' => 'El número telefónico es obligatorio',
            'tel.unique'=>'El teléfono ingresado ya existe',

        ]);

        
        $contacto->nombre=$request->input('nombre');
        $contacto->apellido=$request->input('apellido');
        $contacto->correo_electronico=$request->input('correo');
        $contacto->telefono=$request->input('tel');
        $creado=$contacto->save();
      
        
        if ($creado) {
            return redirect()->route('Contacto.index')
            ->with('mensaje', "".$contacto->nombre." se actualizó correctamente");
        }else{
            return back();
        }

    }
    public function destroy($id)
    {
        Contacto::destroy($id);
        return redirect()->route('Contacto.index')->with('mensaje', 'Contacto borrado correctamente');
    }
}