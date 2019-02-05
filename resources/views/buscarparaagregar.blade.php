@extends('layouts.app')

@section('content')
    <br><br><br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ingrese un codigo ISBM para revisar si el libro existe.') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('buscarparaagregar') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="cod_isbm" class="col-md-4 col-form-label text-md-right">{{ __('Codigo ISBM') }}</label>
                                <div class="col-md-6">
                                    <input id="cod_isbm" type="text" class="form-control{{ $errors->has('cod_isbm') ? ' is-invalid' : '' }}" name="cod_isbm" value="{{ old('cod_isbm') }}" required autofocus>
                                    @if ($errors->has('cod_isbm'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cod_isbm') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="width: 110px">
                                        {{ __('Buscar Libro') }}
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