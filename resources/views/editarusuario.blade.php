@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar Usuario SBM.') }}</div>

                    <div class="card-body">
                        <form id="editarusuario" method="POST" action="{{route('actualizarusuario')}}">
                            @csrf
                            @foreach($usuario as $usuarios)
                            <input id="rol_id" name="rol_id" type="hidden" value="2"/>
                            <div class="form-group row">
                                <label for="cod_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Numero de Cuenta') }}</label>

                                <div class="col-md-6">
                                    <input id="cod_usuario" type="text" class="form-control{{ $errors->has('cod_usuario') ? ' is-invalid' : '' }}" name="cod_usuario" value="{{ $usuarios->cod_usuario }}" required autofocus>

                                    @if ($errors->has('cod_usuario'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cod_usuario') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombre_completo" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre_completo" type="text" class="form-control{{ $errors->has('nombre_completo') ? ' is-invalid' : '' }}" name="nombre_completo" value="{{ $usuarios->nombre_completo }}" required autofocus>

                                    @if ($errors->has('nombre_completo'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre_completo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $usuarios->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                                <div class="form-group row">
                                    <label for="carrera_id" class="col-md-4 col-form-label text-md-right">{{ __('Carrera') }}</label>
                                    <div class="col-md-6">
                                        <select name="carrera_id" style="width: 330px">
                                            @foreach($carrera as $carreras)
                                                <option value=" {{ $carreras->id }}">{{ $carreras->nombre_carrera }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $usuarios->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="password" type="hidden" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ $usuarios->password }}" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                                <div class="form-group row">
                                    <label for="rol_id" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>
                                    <div class="col-md-6">
                                        @if($usuarios->rol_id == 1)
                                            <select name="rol_id" style="width: 330px">
                                                <option value="1" selected>Administrador</option>
                                                <option value="2">Cliente</option>
                                            </select>
                                        @endif
                                        @if($usuarios->rol_id == 2)
                                            <select name="rol_id" style="width: 330px">
                                                <option value="1">Administrador</option>
                                                <option value="2" selected>Cliente</option>
                                            </select>
                                        @endif
                                  </div>
                                </div>

                                <input id="id" type="hidden" name="id" value="{{ $usuarios->id }}" >
                            @endforeach

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Actualizar') }}
                                    </button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                    <button type="button" onclick="location.href='/sbm-web/public/administraciondeusuarios'" class="btn btn-primary">
                                        {{ __('Cancelar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection