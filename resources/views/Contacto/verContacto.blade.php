@extends('plantillas.plantilla')

@section('tit', 'Detalle del contacto')

@section('contenido')
<div class=" d-flex justify-content-center">
    <div class="card m-3" style="width: 60%;" >
        <div class="card-body">
            <h1 style="text-align: center;" >Detalles de: {{$contacto->nombre}} {{$contacto->apellido}}</h1>
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
                        <th cope="row">Nombre:</th>
                        <td>{{ $contacto->nombre}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Apellido:</th>
                        <td>{{$contacto->apellido}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Correo electrónico:</th>
                        <td>{{$contacto->correo_electronico}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Teléfono:</th>
                        <td>{{$contacto->telefono}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 style="color:darkslateblue">Notas:</h3>
            <hr class="">
            <table class="table">
                <thead>
                    <tr>
                    <th>Detalle</th>
                    <th style="text-align: center;">Valores</th>
                    <th style="text-align: center; padding-left: 0px">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacto->notas as $i => $c)
                       <tr>
                        <td style="width: 200px"><strong>{{++$i}}</strong></td>
                        <td style="text-align: center;"> {{$c->fecha}}</td>
                        <td style="padding: 0.5rem 3rem 0.5rem 2.7rem; text-align: center" ><a class="btn btn-info"href="{{route('nota.show', ['id'=>$c->id])}}"> Ver</a></td>
                       </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="">No hay resultados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <br>
            <h3 style="color:darkslateblue">Eventos:</h3>
            <hr class="">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Detalle</th>
                    <th scope="col" style="text-align: center">Valores</th>
                    <th scope="col" style="text-align: center" >Ver</th>
                    </tr>
                </thead>
                <tbody >
                    @forelse ($contacto->eventos as $i => $c)
                        <tr>
                        <td style="width: 200px"><strong>{{++$i}}</strong></td>
                        <td style="text-align: center">{{$c->titulo}}</td>
                        <td style="text-align: center" ><a class="btn btn-info"href="{{route('Evento.Show', ['id'=>$c->id])}}"> Ver</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="">No hay resultados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <br>
            <div class="" style="text-align: center;">
            <a class ="btn btn-success" href="{{route('Contacto.index')}}">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection