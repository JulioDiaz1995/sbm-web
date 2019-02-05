@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Datos del Libro') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('nuevolibro') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="cod_isbn" class="col-md-4 col-form-label text-md-right">{{ __('Codigo ISBN') }}</label>
                                <div class="col-md-6" required autofocus>
                                    <input id="cod_isbn" type="text" class="form-control{{ $errors->has('cod_isbn') ? ' is-invalid' : '' }}" name="cod_isbn" value="{{ old('cod_isbn') }}" required autofocus>
                                @if ($errors->has('cod_isbn'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cod_isbn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo del libro') }}</label>
                                <div class="col-md-6">
                                    <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" value="{{ old('titulo') }}" required autofocus>
                                    @if ($errors->has('titulo'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">

                                <!-- Llamamos los autores de la base de datos -->
                                <label for="id_autor" class="col-md-4 col-form-label text-md-right">{{ __('Autor') }}</label>
                                <div class="col-md-6">
                                    <select name="id_autor" style="width: 235px">
                                        @foreach($autor as $autores)
                                        <option value=" {{ $autores->id }}">{{ $autores->descripcion_autor }}</option>
                                        @endforeach
                                    </select>
                                    <input type="button" class="btn btn-primary" id="nuevoautor" onclick="location.href='nuevoautor'" style="width: 90px" value="Agregar">
                                </div>
                            </div>
                            <div class="form-group row">

                                <!-- Llamamos las categorias de la base de datos -->
                                <label for="id_categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
                                <div class="col-md-6">
                                    <select name="id_categoria" style="width: 235px">
                                        @foreach($categoria as $categorias)
                                        <option value=" {{ $categorias->id }}">{{ $categorias->descripcion_categoria }}</option>
                                        @endforeach
                                    </select>
                                    <input type="button" class="btn btn-primary" id="nuevacategoria" onclick="location.href='nuevacategoria'" style="width: 90px" value="Agregar">
                                </div>
                            </div>
                            <div class="form-group row">

                                <!-- Llamamos las materias de la base de datos -->
                                <label for="id_materia" class="col-md-4 col-form-label text-md-right">{{ __('Materia') }}</label>
                                <div class="col-md-6">
                                    <select name="id_materia" style="width: 235px">
                                        @foreach($materia as $materias)
                                        <option value=" {{ $materias->id }}">{{ $materias->descripcion_materia }}</option>
                                        @endforeach
                                    </select>
                                    <input type="button" class="btn btn-primary" id="nuevamateria" onclick="location.href='nuevamateria'" style="width: 90px" value="Agregar">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cod_dewey" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Dewey') }}</label>
                                <div class="col-md-6">
                                    <input id="cod_dewey" type="text" class="form-control{{ $errors->has('cod_dewey') ? ' is-invalid' : '' }}" name="cod_dewey" value="{{ old('cod_dewey') }}" required autofocus>
                                    @if ($errors->has('cod_dewey'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cod_dewey') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cod_cutter" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Cutter') }}</label>
                                <div class="col-md-6">
                                    <input id="cod_cutter" type="text" class="form-control{{ $errors->has('cod_cutter') ? ' is-invalid' : '' }}" name="cod_cutter" value="{{ old('cod_cutter') }}" required autofocus>
                                    @if ($errors->has('cod_cutter'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cod_cutter') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion_libro" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                                <div class="col-md-6">
                                    <textarea id="descripcion_libro" type="text" class="form-control{{ $errors->has('descripcion_libro') ? ' is-invalid' : '' }}" name="descripcion_libro" value="{{ old('descripcion_libro') }}" required autofocus></textarea>
                                   @if ($errors->has('descripcion_libro'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion_libro') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="portada" class="col-md-4 col-form-label text-md-right">{{ __('Portada del Libro') }}</label>
                                <div class="col-md-6">
                                    <input id="portada" type="file" class="form-control{{ $errors->has('portada') ? ' is-invalid' : '' }}" name="portada" value="{{ old('portada') }}" required autofocus>
                                    @if ($errors->has('portada'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('portada') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="width: 110px">
                                        {{ __('Guardar Libro') }}
                                    </button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="button" class="btn btn-primary" id="cancelar" onclick="location.href='home'" style="width: 110px" value="Cancelar">
                                </div>
                            </div>
                       
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection