@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @forelse($book as $books)
                        <h3 align="center" style="color: blue;">{{ $books->titulo }}</h3></div>
                    <table class="table table-striped">

                        <td>
                            <tr><center><a href="/images/libros/{{$books->portada}}" ><img src="/images/libros/{{ $books->portada }}" width="300" heigth="300"></a></center></tr>
                            <tr><h4><center><br>Codigo ISBN: {{ $books->cod_isbn }}</center></h4></tr>
                            <tr><h4><center><br>Autor: {{ $books->descripcion_autor }}</center></h4></tr>
                            <tr><h4><center><br>Categoria: {{ $books->descripcion_categoria }}</center></h4></tr>
                            <tr><h4><center><br>Materia: {{ $books->descripcion_materia }}</center></h4></tr>
                            <tr><h4><center><br>Descripcion: {{ $books->descripcion_libro }}</center></h4></tr>
                            <tr><center><br><input type="button" class="btn btn-primary" id="cancelar" onclick="location.href='/sbm-web/public/libros'" style="width: 110px" value="Regresar"></center></tr>
                        @empty
                                <h1 align="center" style="color: red">Libro No Encontrado</h1>
                        @endforelse
                    </table>
                </div>
                </div>
                <br>
          </div>
        </div>
    </div>
@endsection