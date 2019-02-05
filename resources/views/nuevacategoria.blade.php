@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Datos de la Categoria') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('nuevacategoria') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="descripcion_categoria" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Categoria') }}</label>
                                <div class="col-md-6">
                                    <input id="descripcion_categoria" type="text" class="form-control{{ $errors->has('descripcion_categoria') ? ' is-invalid' : '' }}" name="descripcion_categoria" value="{{ old('descripcion_categoria') }}" required autofocus>
                                    @if ($errors->has('descripcion_categoria'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion_categoria') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="imagen_categoria" class="col-md-4 col-form-label text-md-right">{{ __('Imagen Categoria') }}</label>
                                <div class="col-md-6">
                                    <input id="imagen_categoria" type="file" class="form-control{{ $errors->has('imagen_categoria') ? ' is-invalid' : '' }}" name="imagen_categoria" value="{{ old('imagen_categoria') }}" required autofocus>
                                    @if ($errors->has('imagen_categoria'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('imagen_categoria') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="width: 110px">
                                        {{ __('Guardar') }}
                                    </button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="button" class="btn btn-primary" id="cancelar" onclick="location.href='nuevolibro' " style="width: 110px" value="Cancelar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection