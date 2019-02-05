<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

//esta ruta es usada en la administracion de usuarios para administrar las opciones de CRUD
Route::get('users', function (){
    //return App\User::all();
    return datatables()
        ->eloquent(App\User::query())
        ->addColumn('btn', 'actions')
        ->rawColumns(['btn'])
        ->toJson();
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

//verificar correo
Route::post('verificarCorreo','AuthController@verifyEmail');
Route::post('verificarNameUser','AuthController@verifyNameUser');
Route::post('verificarNumCuen','AuthController@verifyNumCuen');



//USUARIOS
Route::get('modiUser/{id}','UserController@editarusuarioAndroid');
Route::post('updateUser','UserController@updateUser');





