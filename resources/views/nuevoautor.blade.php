@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Datos del Autor') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('nuevoautor') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="descripcion_autor" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Autor') }}</label>
                                <div class="col-md-6">
                                    <input id="descripcion_autor" type="text" class="form-control{{ $errors->has('descripcion_autor') ? ' is-invalid' : '' }}" name="descripcion_autor" value="{{ old('descripcion_autor') }}" required autofocus>
                                    @if ($errors->has('descripcion_autor'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion_autor') }}</strong>
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