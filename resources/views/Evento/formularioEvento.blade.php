@extends('plantillas.plantilla')
@section('tit', 'Registro Evento')
@section('contenido')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <div class=" d-flex justify-content-center">
            <div class="card m-3" style="width: 60%;" >
                <div class="card-body">
                    <h2 class="title" style="margin-bottom:0" >Registro del Evento</h2>
                    <form method="post" action="{{route('Evento.store')}}">
                        @csrf
                        <div class="form-group">

                            <label for="titulo">Título:</label>
                            <input type="text" class="form-control" name ="titulo" id ="titulo" minlength="3" maxlength="50"
                            placeholder="titulo del estudiante" value="{{old('titulo')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" type="text" placeholder="Ingrese la descripción" name="descripcion" id="descripcion"
                             minlength="3" maxlength="150" required
                            >{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="fecha_inicio">Fecha inicio: </label>
                            <input type="date" class="form-control" name ="fecha_inicio" id="fecha_inicio" 
                            min="{{ date("Y-m-d",strtotime(now()))}}" max=""
                            placeholder="00/00/0000" value="{{old('fecha_inicio')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="fecha_final">Fecha final: </label>
                            <input type="date" class="form-control" name ="fecha_final" id="fecha_final" 
                            min="{{ date("Y-m-d",strtotime(now()."+ 1 day"))}}" max=""
                            placeholder="00/00/0000" value="{{old('fecha_final')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="contacto">Contacto: </label>
                            <select class="form-control"
                                    id="contacto"
                                    required autocomplete="contacto" name="contacto">
                                <option value="">Seleccione el contacto</option>
                                @foreach ($contactos as $c)
                                    <option value="{{ $c->id }}" {{ old('contacto') == $c->id ? 'selected' : '' }}>{{$c['nombre']}} {{$c['apellido']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="" style="text-align: center;">
                        <a class ="btn btn-danger" href="{{route('Evento.index')}}">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
@endsection