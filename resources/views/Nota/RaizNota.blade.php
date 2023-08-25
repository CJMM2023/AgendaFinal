@extends('plantillas.plantilla')
@section('tit', 'Notas')
@section('contenido')


<div style="margin: 10px">
    
    @if (session('mensaje'))
    <div class="alert alert-info" role="alert">
    {{session('mensaje')}}
    </div>
    @endif
    <h1>Lista de Notas
        <a class="btn btn-primary" style="float:right; margin-top:10px;" href="{{route('nota.create')}}">Nueva Nota</a>
    </h1> 
    <div class="table-responsive" >
        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center">
                    <th>N</th>
                    <th>Contacto</th>
                    <th>Fecha</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notas as $i => $c )
                    <tr style="text-align: center">
                        <td><strong>{{++$i}}</strong></td>
                        <td style="text-align: left" >{{$c->contacto->nombre}} {{$c->contacto->apellido}}</td>
                        <td style="text-align: right" >{{$c->fecha}} </td>
                        <td ><a class="btn btn-info"href="{{route('nota.show', ['id'=>$c->id])}}"> Ver</a></td>
                        <td> <a class="btn btn-warning" href ="{{route('nota.edit', ['id'=>$c->id])}}"> Editar</a></td>
                        <td>
                            <form action="{{route('nota.destroy', ['id'=>$c->id])}}" method="POST" style="display: inline-black;" onsubmit="return confirm('Estas seguro de eliminar el registro?')" >
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
    {{ $notas->links('pagination::bootstrap-4') }}

    <br>
    <div class="" style="text-align: center;">
    <a class ="btn btn-success" href="{{route('home')}}">Volver</a>
    </div>
</div>

@endsection

