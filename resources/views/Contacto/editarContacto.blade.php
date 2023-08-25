@extends('plantillas.plantilla')
@section('tit', 'Editar contacto')
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
                    <h2 class="title" style="margin-bottom:0" >Edición de: {{$contacto->nombre}} {{$contacto->apellido}}</h2>
                    <form method="post" action="{{route('Contacto.update', ['id'=>$contacto->id])}}">
                        @method('put')
                        @csrf
                        <div class="form-group">

                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" name ="nombre" id ="nombre" minlength="3" maxlength="50"
                            value="{{old('nombre', $contacto->nombre)}}" required>
                        </div>

                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" class="form-control" name ="apellido" id="apellido" minlength="3" maxlength="50"
                             value="{{old('apellido', $contacto->apellido)}}" required>
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo electrónico</label>
                            <input type="email" class="form-control" name ="correo" id="correo" minlength="12" maxlength="50"
                             value="{{old('correo', $contacto->correo_electronico)}}" required>
                        </div>

                        <div class="form-group">
                            <label for="tel">Teléfono</label>
                            <input type="text" class="form-control" name ="tel" id="tel" 
                            value="{{old('tel', $contacto->telefono)}}" required>
                        </div>
                        <br>
                        <div class="" style="text-align: center;">
                        <a class ="btn btn-danger" href="{{route('Contacto.index')}}">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
@endsection
