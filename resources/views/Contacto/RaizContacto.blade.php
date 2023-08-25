@extends('plantillas.plantilla')
@section('tit', 'Contactos')
@section('contenido')


<div style="margin: 10px">
    @if (session('mensaje'))
  <div class = "alert alert-success">
    {{session('mensaje')}}
  </div>
    @endif
    <h1>Lista de contactos 
        <a class="btn btn-primary" style="float:right; margin-top:10px;" href="{{route ('Contacto.create')}}"> Nuevo Contacto</a>
    </h1> 
    <div class="table-responsive" >
        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center">
                    <th>Id</th>
                    <th>Nombre completo</th>
                    <th>Correo electrónico</th>
                    <th>Teléfono</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contactos as $i => $c )
                    <tr style="text-align: center">
                        <td><strong>{{++$i}}</strong></td>
                        <td style="text-align: left" >{{$c->nombre}} {{$c->apellido}}</td>
                        <td style="text-align: left" >{{$c->correo_electronico}} </td>
                        <td style="text-align: right">{{$c->telefono}}</td>
                        <td ><a class="btn btn-info"href="Id"> Ver</a></td>
                        <td> <a class="btn btn-warning" href ="{{route('Contacto.edit', ['id'=>$c->id])}}"> Editar</a></td>
                        <td>
                            <form action="{{route('Contacto.destroy', ['id'=>$c->id])}}" method="POST" style="display: inline-black;" onsubmit="return confirm('Estas seguro de eliminar el registro?')" >
                              @method('delete')
                              @csrf
                              <input type="submit" class="btn btn-danger" value="Eliminar">   
                          </form> 
                          </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="">No hay resultados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $contactos->links('pagination::bootstrap-4') }}
</div>



@endsection

