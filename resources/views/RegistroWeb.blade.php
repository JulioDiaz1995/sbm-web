<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro |Sbm Web|</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="contenedor-form">
    <div class="toggle">
        <input type="submit" id="cancelar" onclick="location.href='LoginWeb' " value="Iniciar Sesion">
    </div>

    <div class="formulario">
        <h2>Registro</h2>
        <form method="POST" action="{{ action('AuthController@signup') }}">
            @csrf

            <input id="rol_id" name="rol_id" type="hidden" value="2"/>

            <div class="form-group row">
                <label for="cod_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Codigo del Empleado') }}</label>

                <div class="col-md-6">
                    <input id="cod_usuario" type="text" class="form-control{{ $errors->has('cod_usuario') ? ' is-invalid' : '' }}" name="cod_usuario" value="{{ old('cod_usuario') }}" required autofocus>

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
                    <input id="nombre_completo" type="text" class="form-control{{ $errors->has('nombre_completo') ? ' is-invalid' : '' }}" name="nombre_completo" value="{{ old('nombre_completo') }}" required autofocus>

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
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">

                <label class="col-md-4 col-form-label text-md-right">{{ __('Nota: Por tu seguridad la contraseña debe contener: Mayusculas,(ABC...) Minusculas(abc...) y Numeros.(0123456789)') }}</label>

                <br>
                <br>

                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Repita la Contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <input type="hidden" name="carrera_id" id="carrera_id" value="1">

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <input type="submit" value="Registrarse">
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>