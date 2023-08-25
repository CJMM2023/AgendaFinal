@extends('plantillas.plantilla')
@section('tit', 'Detalle de la nota')

@section('contenido')
<div class=" d-flex justify-content-center">
    <div class="card m-3" style="width: 60%;" >
        <div class="card-body">
            <h1 style="text-align: center;" >Detalles de la Nota</h1>
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
                        <th cope="row">Contacto:</th>
                        <td>{{$nota->contacto->nombre}} {{$nota->contacto->apellido}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Texto:</th>
                        <td>{{$nota->texto}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Fecha:</th>
                        <td>{{$nota->fecha}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div class="" style="text-align: center;">
            <a class ="btn btn-success" href="{{route('nota.index')}}">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection