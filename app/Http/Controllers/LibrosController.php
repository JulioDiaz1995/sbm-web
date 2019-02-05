<?php

namespace App\Http\Controllers;

use App\author;
use App\Book;
use App\categories;
use App\subjects;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LibrosController extends Controller
{
    public function index()
    {
        return json_encode(array("items" => Book::all()));
    }

    public function search($id)
    {
        return json_encode(array("items" => Book::where('titulo', 'LIKE', "%{$id}%")->get()));
    }

    public function show($id)
    {
        return Book::find($id);
    }

    public function libroDetail($id)
    {
        return json_encode(array("items" => Book::where('books.id', $id)
            ->join('authors', 'books.id_autor', '=', 'authors.id')
            ->join('categories', 'categories.id', '=', 'books.id_categoria')
            ->select('portada', 'titulo', 'descripcion_autor', 'descripcion_categoria', 'descripcion_libro', 'cod_isbn')
            ->get()));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'portada' => 'required',
            'titulo' => 'required|string',
            'cod_dewey' => 'required|string',
            'cod_cutter' => 'required|string',
            'cod_isbn' => 'required|string|unique:books',
            'id_usuario' => 'required|integer',
            'id_autor' => 'required|integer',
            'id_categoria' => 'required|integer',
            'id_materia' => 'required|integer',
            'descripcion_libro' => 'string',

        ]);

        Book::create($request->all());
        return response()->json([
            'message' => 'Libro registrado con éxito'], 201);
    }

    


    public function guardarlibro(Request $request)
    {

        $this->validate($request, [
            'cod_isbn' => 'required|string|unique:books',
        ]);


        $foto = $_FILES["portada"]["name"];
        $ruta = $_FILES["portada"]["tmp_name"];
        $destino = "images/libros/" . $foto;
        copy($ruta, $destino);

        $libro = new Book();
        $libro->cod_isbn = $request->input('cod_isbn');
        $libro->titulo = $request->input('titulo');
        $libro->cod_dewey = $request->input('cod_dewey');
        $libro->cod_cutter = $request->input('cod_cutter');
        $libro->id_autor = $request->input('id_autor');
        $libro->id_categoria = $request->input('id_categoria');
        $libro->id_materia = $request->input('id_materia');
        $libro->descripcion_libro = $request->input('descripcion_libro');
        $libro->portada = $foto;
        $libro->id_usuario = 1;
        $libro->save();

        return redirect()->route('home');
    }

    public function update(Request $request, $id)
    {
        $libro = Book::findOrFail($id);
        $libro->update($request->all());

        return $libro;
    }

    public function delete(Request $request, $id)
    {
        $libro = Book::findOrFail($id);
        $libro->delete();

        return 204;
    }

    public function libroCategory($id)
    {
        $libros = Book::select('id', 'portada', 'titulo', 'cod_isbn')->where('id_materia', $id)->get();
        return json_encode(array("items" => $libros));

    }

    public function nuevolibro()
    {
        $categorias = categories::all();
        $autores = author::all();
        $materias = subjects::all();

        return view('nuevolibro', ['categoria' => $categorias, 'autor' => $autores, 'materia' => $materias]);

    }

    public function verlibros()
    {
        $books = DB::table('books')
            ->join('authors', 'books.id_autor', '=', 'authors.id')
            ->join('categories', 'books.id_categoria', '=', 'categories.id')
            ->join('subjects', 'books.id_materia', '=', 'subjects.id')
            ->select('books.*', 'authors.descripcion_autor', 'categories.descripcion_categoria', 'descripcion_materia')
            ->get();

        return view('libros', ['book' => $books]);
    }

    public function borrarlibro($id)
    {
        Book::destroy($id);
        return redirect('libros');
    }

    public function editarlibro($id)
    {
        $books = DB::table('books')->where('books.id', '=', $id)
            ->join('authors', 'books.id_autor', '=', 'authors.id')
            ->join('categories', 'books.id_categoria', '=', 'categories.id')
            ->join('subjects', 'books.id_materia', '=', 'subjects.id')
            ->select('books.*', 'authors.descripcion_autor', 'categories.descripcion_categoria', 'descripcion_materia')
            ->get();

        return view('editarlibro', ['book' => $books]);
    }

    public function guardareditadolibro(Request $request)
    {
        $libro = Book::findOrFail($request->input('id'));

        $foto = $_FILES["portada"]["name"];
        $ruta = $_FILES["portada"]["tmp_name"];
        $destino = "images/libros/" . $foto;
        copy($ruta, $destino);

        $libro->cod_isbn = $request->input('cod_isbn');
        $libro->titulo = $request->input('titulo');
        $libro->id_autor = $request->input('id_autor');
        $libro->id_categoria = $request->input('id_categoria');
        $libro->id_materia = $request->input('id_materia');
        $libro->cod_dewey = $request->input('cod_dewey');
        $libro->cod_cutter = $request->input('cod_cutter');
        $libro->descripcion_libro = $request->input('descripcion_libro');
        $libro->portada = $foto;

        $libro->save();

        return redirect()->route('libros');

    }

    public function verlibro($id)
    {
        $books = DB::table('books')->where('books.id', '=', $id)
            ->join('authors', 'books.id_autor', '=', 'authors.id')
            ->join('categories', 'books.id_categoria', '=', 'categories.id')
            ->join('subjects', 'books.id_materia', '=', 'subjects.id')
            ->select('books.*', 'authors.descripcion_autor', 'categories.descripcion_categoria', 'descripcion_materia')
            ->get();

        return view('datoslibro', ['book' => $books]);
    }
    public function verfoto($id)
    {
        $books = DB::table('books')->where('id', '=', $id)->get();

        return view('verfoto', ['book' => $books]);
    }

}