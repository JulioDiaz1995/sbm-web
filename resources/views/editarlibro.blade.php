@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Datos del Libro') }}</div>
                    <div class="card-body">
                        <form id="editarlibro" method="POST" action="{{route('actualizarlibro')}}" enctype="multipart/form-data">
                        @csrf

                            @foreach($book as $books)
                            <div class="form-group row">
                                <label for="cod_isbn" class="col-md-4 col-form-label text-md-right">{{ __('Codigo ISBN') }}</label>
                                <div class="col-md-6" required autofocus>
                                    <input id="cod_isbn" type="text" class="form-control{{ $errors->has('cod_isbn') ? ' is-invalid' : '' }}" name="cod_isbn" value="{{$books->cod_isbn}}" required autofocus>
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
                                        <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" value="{{ $books->titulo }}" required autofocus>
                                        @if ($errors->has('titulo'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_autor" class="col-md-4 col-form-label text-md-right">{{ __('Autor') }}</label>
                                    <div class="col-md-6">
                                        <select name="id_autor" style="width: 330px">
                                                <option value=" {{ $books->id_autor }}">{{ $books->descripcion_autor }}</option>
                                        </select>
                                   </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
                                    <div class="col-md-6">
                                        <select name="id_categoria" style="width: 330px">
                                                <option value=" {{ $books->id_categoria }}">{{ $books->descripcion_categoria }}</option>
                                        </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_materia" class="col-md-4 col-form-label text-md-right">{{ __('Materia') }}</label>
                                    <div class="col-md-6">
                                        <select name="id_materia" style="width: 330px">
                                                <option value=" {{$books->id_materia}}">{{ $books->descripcion_materia }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cod_dewey" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Dewey') }}</label>
                                    <div class="col-md-6">
                                        <input id="cod_dewey" type="text" class="form-control{{ $errors->has('cod_dewey') ? ' is-invalid' : '' }}" name="cod_dewey" value="{{ $books->cod_dewey }}" required autofocus>
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
                                        <input id="cod_cutter" type="text" class="form-control{{ $errors->has('cod_cutter') ? ' is-invalid' : '' }}" name="cod_cutter" value="{{ $books->cod_cutter }}" required autofocus>
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
                                        <input id="descripcion_libro" type="text" class="form-control{{ $errors->has('descripcion_libro') ? ' is-invalid' : '' }}" name="descripcion_libro" value="{{ $books->descripcion_libro }}" required autofocus>
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
                                        <input id="portada" type="file" class="form-control{{ $errors->has('portada') ? ' is-invalid' : '' }}" name="portada" value="{{ $books->portada }}" required autofocus>
                                        @if ($errors->has('portada'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('portada') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <input id="id" type="hidden" name="id" value="{{ $books->id }}" >
                            @endforeach
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="width: 110px">
                                        {{ __('Actualizar') }}
                                    </button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="button" class="btn btn-primary" id="cancelar" onclick="location.href='/sbm-web/public/libros'" style="width: 110px" value="Cancelar">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection