@extends('plantillas.plantilla')
@section('tit', 'Eventos')
@section('contenido')


<div style="margin: 10px">
    
    @if (session('mensaje'))
    <div class="alert alert-info" role="alert">
    {{session('mensaje')}}
    </div>
    @endif
    <h1>Lista de Eventos 
        <a class="btn btn-primary" style="float:right; margin-top:10px;" href="{{route('Evento.create')}}"> Nuevo Evento</a>
    </h1> 
    <div class="table-responsive" >
        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center">
                    <th>N</th>
                    <th>Título</th>
                    <th>Fecha inicial</th>
                    <th>Fecha final</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($eventos as $i => $c )
                    <tr style="text-align: center">
                        <td><strong>{{++$i}}</strong></td>
                        <td style="text-align: left" >{{$c->titulo}}</td>
                        <td style="text-align: right" >{{$c->fecha_inicio}} </td>
                        <td style="text-align: right">{{$c->fecha_final}}</td>
                        <td ><a class="btn btn-info"href="{{route('Evento.Show', ['id'=>$c->id])}}"> Ver</a></td>
                        <td> <a class="btn btn-warning" href ="{{route('Evento.edit', ['id'=>$c->id])}}"> Editar</a></td>
                        <td>
                            <form action="{{route('Evento.destroy', ['id'=>$c->id])}}" method="POST" style="display: inline-black;" onsubmit="return confirm('Estas seguro de eliminar el registro?')" >
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
    {{ $eventos->links('pagination::bootstrap-4') }}

    <br>
    <div class="" style="text-align: center;">
    <a class ="btn btn-success" href="{{route('home')}}">Volver</a>
    </div>
</div>

@endsection
