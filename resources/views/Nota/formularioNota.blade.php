@extends('plantillas.plantilla')
@section('tit', 'Registro nota')
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
                    <h2 class="title" style="margin-bottom:0" >Registro de la nota</h2>
                    <form method="post" action="{{route('nota.store')}}">
                        @csrf
                       
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

                        <div class="form-group">
                            <label for="texto">Texto:</label>
                            <textarea class="form-control" type="text" placeholder="Ingrese la descripción" name="texto" id="texto"
                             minlength="3" maxlength="150" required
                            >{{ old('texto') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" name ="fecha" id="fecha" 
                            min="{{ date("Y-m-d",strtotime(now()))}}" max=""
                            placeholder="00/00/0000" value="{{old('fecha')}}" required>
                        </div>
                        <br>
                        <div class="" style="text-align: center;">
                        <a class ="btn btn-danger" href="{{route('nota.index')}}">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
@endsection
