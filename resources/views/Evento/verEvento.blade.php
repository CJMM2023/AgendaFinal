@extends('plantillas.plantilla')
@section('tit', 'Detalle del evento')

@section('contenido')
<div class=" d-flex justify-content-center">
    <div class="card m-3" style="width: 60%;" >
        <div class="card-body">
            <h1 style="text-align: center;" >Detalles de: {{$evento->titulo}}</h1>
            <hr class="">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Detalle:</th>
                    <th scope="col">Valores</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th cope="row">Título:</th>
                        <td>{{ $evento->titulo}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Descripción:</th>
                        <td>{{$evento->descripcion}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Fecha inicio:</th>
                        <td>{{$evento->fecha_inicio}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Fecha final:</th>
                        <td>{{$evento->fecha_final}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Contacto:</th>
                        <td>{{$evento->contacto->nombre }} {{$evento->contacto->apellido}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div class="" style="text-align: center;">
            <a class ="btn btn-success" href="{{route('Evento.index')}}">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection