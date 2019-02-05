<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login |Sbm Web|</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="contenedor-form">
    <div class="toggle">
        <input type="submit" id="cancelar" onclick="location.href='RegistroWeb' " value="Registrarse">
    </div>

    <div class="formulario">
        @if($valor == 2)
            <br><h2 style="color: red;">Usuario o Contraseña Incorrectos..</h2>
         @endif
        @if($valor == 3)
                <br><h2 style="color: blue;">Registro exitoso, Ingrese sus datos para continuar..</h2>
         @endif
        <h2>Iniciar sesión</h2>
        <form method="POST" action="{{ action('AuthController@login') }}">
            @csrf
            <input id="web" name="web" type="hidden"/>

            @csrf
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
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
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Recordarme') }}
                        </label>
                    </div>
                </div>
            </div>
            <br>

            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>

    <div class="reset-password">
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Olvidaste tu Contraseña?') }}
            </a>
        @endif
    </div>
</div>
</body>
</html>