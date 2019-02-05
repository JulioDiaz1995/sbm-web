@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @forelse($user as $users)
                        <h3 align="center" style="color: blue;">{{ $users->nombre_completo }}</h3></div>
                    <table class="table table-striped">

                        <td>
                            <tr><h4><center><br>Codigo Usuario: {{ $users->cod_usuario }}</center></h4></tr>
                            <tr><h4><center><br>Nombre de Usuario: {{ $users->name }}</center></h4></tr>
                            <tr><h4><center><br>Email: {{ $users->email }}</center></h4></tr>
                            <tr><h4><center><br>Carrera: {{ $users->nombre_carrera }}</center></h4></tr>
                            <tr><h4><center><br>Rol: {{ $users->description }}</center></h4></tr>
                            <tr><center><br><input type="button" class="btn btn-primary" id="cancelar" onclick="location.href='/sbm-web/public//administraciondeusuarios'" style="width: 110px" value="Regresar"></center></tr>
                        @empty
                                <h1 align="center" style="color: red">Usuario No Encontrado</h1>
                        @endforelse
                    </table>
                </div>
                </div>
                <br>
          </div>
        </div>
    </div>
@endsection