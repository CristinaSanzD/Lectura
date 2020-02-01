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
//Página de inicio
Route::get('/', function () {
    return view('welcome');
});

//Ruta para acceder a la vista de la insercción de un nuevo libro a la base de datos
/*Route::get('/libro', function(){
return view('list');
});*/
Route::resource('generos','GeneroController');
Route::get('/nuevo', function () {
    return view('generos.nuevo');
});
//Ruta para el recurso libro
Route::resource('libro','LibroController'); // Invoca al método index
//Ruta para crear un nuevo libro
// Route::post('libro.store', 'LibroController@store');

//Ruta para acceder a la vista de insertar una nuevo libro

Route::get('/crear', function (){
return view('new');
});

Route::get('editar/{id}',['as' =>'editar','uses'=> 'LibroController@edit']);

Route::get('eliminar/{id}', ['as' =>'eliminar','uses'=>'LibroController@destroy']);

Route::view('/buscar', 'libros.buscar');
Route::get('/search','BuscaController@indexDescripcion');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('update/{id}', ['as' =>'update','uses'=>'LibroController@update']);

Route::get('/ordAscNom','LibroController@indexOrdNomAsc');
Route::get('/ordDescNom','LibroController@indexOrdNomDesc');
Route::get('/ordAscAut','LibroController@indexOrdAutAsc');
Route::get('/ordDescAut','LibroController@indexOrdAutDesc');
Route::get('/ordAscGen','LibroController@indexOrdGeneroAsc');
Route::get('/ordDescGen','LibroController@indexOrdGeneroDesc');
Route::get('/ordAscPag','LibroController@indexOrdPagAsc');
Route::get('/ordDescPag','LibroController@indexOrdPagDesc');

Route::get('/salir', function () {
    Auth::logout();
    Session::flash('estado', 'Sesión finalizada con éxito !');
    return view('welcome');
});