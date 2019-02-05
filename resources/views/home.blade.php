@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Bienvenido al Sistema de administracion de Libros SBM!</div>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro de usuarios.') }}</div>

                <div class="card-body">
                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-4">
                            <input type="button" class="btn btn-primary" id="cancelar" onclick="location.href='/userRegis' " value="Usuarios">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="button" class="btn btn-primary" id="cancelar" onclick="location.href='/adminRegis' " value="Administradores">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Administracion de los Usuarios Registrados') }}</div>

                <div class="card-body">
                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-4">
                            <input type="button" class="btn btn-primary" id="cancelar" onclick="location.href='/administraciondeusuarios'" value="Usuarios Registrados">&nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ingreso de libros a SBM.') }}</div>

                <div class="card-body">
                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-4">
                            <input type="button" class="btn btn-primary" id="cancelar" onclick="location.href='/nuevolibro' " value="Agregar Nuevos Libros">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="button" class="btn btn-primary" id="cancelar" onclick="location.href='/libros' " value="Ver Libreria">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
