@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Datos de la Materia') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('nuevamateria') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="descripcion_materia" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Materia') }}</label>
                                <div class="col-md-6">
                                    <input id="descripcion_materia" type="text" class="form-control{{ $errors->has('descripcion_materia') ? ' is-invalid' : '' }}" name="descripcion_materia" value="{{ old('descripcion_materia') }}" required autofocus>
                                    @if ($errors->has('descripcion_materia'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion_materia') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="imagen_materias" class="col-md-4 col-form-label text-md-right">{{ __('Imagen Materia') }}</label>
                                <div class="col-md-6">
                                    <input id="imagen_categoria" type="file" class="form-control{{ $errors->has('imagen_materias') ? ' is-invalid' : '' }}" name="imagen_materias" value="{{ old('imagen_materias') }}" required autofocus>
                                    @if ($errors->has('imagen_materias'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('imagen_materias') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
                                <div class="col-md-6">
                                    <select name="id_categoria" style="width: 330px">
                                        @foreach($categorie as $categories)
                                            <option value=" {{ $categories->id }}">{{ $categories->descripcion_categoria }}</option>
                                        @endforeach
                                    </select>
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