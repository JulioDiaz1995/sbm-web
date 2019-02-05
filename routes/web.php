<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Carrers;

Route::get('/', function () {
    return view('LoginWeb', ['valor' => 1]);
});

Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

Route::get('/registrarUsuarios', function () {
    return view('registarUsuario');
});

Route::get('/userRegis', function () {
    $carreras=Carrers::get();
    return view('userRegis', compact("carreras"));
});

Route::get('/adminRegis', function () {
    return view('adminRegis');
});

Route::get('/LoginWeb', function () {
    return view('LoginWeb', ['valor'=>1]);
});

Route::get('/LoginWebb', function () {
    return view('LoginWeb', ['valor'=>3]);
});



Route::get('/RegistroWeb', function () {
    return view('RegistroWeb');
});

Route::get('/RegistroExitoso', function () {
    return view('RegistroExitoso');
});

Route::get('/RecuperacionDeContraseña', function () {
    return view('RecuperacionDeContraseña');
});

Route::get('/errordelogueo', function () {
    return view('LoginWeb', ['valor' => 2]);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/administraciondeusuarios', 'UserController@administarUsuarios')->name('administrarUsuarios')->middleware('auth');


//Ruta de administracion de usuarios.
Route::resource('users', 'UserController');

/*
Las siguientes Rutas se usaran en conjunto con SBM Movil y SBM web para esto las api correspondientes.
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::post('loginweb', 'AuthController@loginweb');
    Route::post('signupweb', 'AuthController@signupweb');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

//LIBROS
Route::get('libro','LibrosController@index');
Route::get('libro/{id}','LibrosController@show');
Route::get('libroDetail/{id}','LibrosController@libroDetail');
Route::get('libroCategory/{id}','LibrosController@libroCategory');
Route::post('libro','LibrosController@store');
Route::get('libro/{id}','LibrosController@update');
Route::get('libro/{id}','LibrosController@delete');
Route::get('busquedaLibro/{id}','LibrosController@search');

//Ruta web mostrar libros
Route::get('/libros','LibrosController@verlibros')->middleware('auth')->name('libros')->middleware('auth');
Route::get('/nuevolibro','LibrosController@nuevolibro')->name('nuevolibro')->middleware('auth');
Route::post('/nuevolibro', 'LibrosController@guardarlibro')->name('guardarlibro')->middleware('auth');


//Rutas para editar, ver y borrar libros
Route::get('/borrarlibro/{id}','LibrosController@borrarlibro')->name('borrarlibro')->middleware('auth');
Route::get('/editarlibro/{id}','LibrosController@editarlibro')->name('editarlibro')->middleware('auth');
Route::post('/editarlibro','LibrosController@guardareditadolibro')->name('actualizarlibro')->middleware('auth');
Route::get('/verlibro/{id}','LibrosController@verlibro')->name('verlibro')->middleware('auth');
Route::get('/verfoto/{id}','LibrosController@verfoto')->name('verfoto')->middleware('auth');

//Rutas para editar, ver y borrar usuarios
Route::get('/borrarusuario/{id}','UserController@borrarusuario')->name('borrarusuario')->middleware('auth');
Route::get('/editarusuario/{id}','UserController@editarusuario')->name('editarusuario')->middleware('auth');
Route::post('/editarusuario','UserController@guardareditadousuario')->name('actualizarusuario')->middleware('auth');
Route::get('/verusuario/{id}','UserController@verusuario')->name('verusuario')->middleware('auth');

//Agregar nuevo autor version web
Route::get('/nuevoautor','AutoresController@nuevoautor')->name('nuevoautor')->middleware('auth')->middleware('auth');
Route::post('/nuevoautor','AutoresController@guardarautor')->middleware('auth');

//Agregar nueva categoria version web
Route::get('/nuevacategoria','CategoriasController@nuevacategoria')->name('nuevacategoria')->middleware('auth');
Route::post('/nuevacategoria','CategoriasController@guardarcategoria')->middleware('auth');

//Agregar nueva materia version web
Route::get('/nuevamateria','MateriasController@nuevamateria')->name('nuevamateria')->middleware('auth');
Route::post('/nuevamateria','MateriasController@guardarmateria')->middleware('auth');


//CATEGORIAS
Route::get('categories','ModelCategoryController@index');
Route::get('categories/{id}', 'ModelCategoryController@show');
Route::post('categories','ModelCategoryController@store');
Route::get('categories/{id}', 'ModelCategoryController@update');
Route::get('categories/{id}', 'ModelCategoryController@destroy');


//MATERIAS
Route::get('subjetcs','Subjetcs_Controller@index');
Route::get('subjetcs/{id}','Subjetcs_Controller@show');
Route::get('subjetcsCategory/{id}','Subjetcs_Controller@SubjectsCategory');
Route::post('subjetcs','Subjetcs_Controller@store');
Route::get('subjetcs/{id}','Subjetcs_Controller@update');
Route::get('subjetcs/{id}','Subjetcs_Controller@delete');

Route::get('home2', 'HomeController@index')->name('home');

//Carrera
Route::get('carrers','CarrersController@index');
Route::get('carrers/{id}','CarrersController@show');
Route::post('carrers','CarrersController@store');
Route::get('carrers/{id}','CarrersController@update');
Route::get('carrers/{id}','CarrersController@delete');

//Recuperación de contraseña
Route :: group ([
    'namespace' => 'Auth',
    'middleware' => 'api',
    'prefix' => 'password'
], function () {
    Route :: post ('create','PasswordResetController@create');
    Route :: get ('find/{token}','PasswordResetController@find');
    Route :: post ('reset','PasswordResetController@reset');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/reset', 'AuthController@reset');

//Recuperación de contraseña
Route :: group ([
    'namespace' => 'Auth',
    'middleware' => 'web',
    'prefix' => 'password'
], function () {
    Route :: post ('create','PasswordResetController@create');
    Route :: get ('find/{token}','PasswordResetController@find');
    Route :: post ('reset','PasswordResetController@reset');
});

//verificar correo
Route::post('verificarCorreo','AuthController@verifyEmail');
Route::post('verificarNameUser','AuthController@verifyNameUser');
Route::post('verificarNumCuen','AuthController@verifyNumCuen');