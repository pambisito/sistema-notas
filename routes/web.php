<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('/salon', 'SalonController');

Route::get('/salon', 'SalonController@index')->name('salon.index');
Route::get('/salon/create', 'SalonController@create')->name('salon.create');
Route::post('/salon', 'SalonController@store')->name('salon.store');
Route::get('/salon/{grado}/{seccion}', 'SalonController@show')->name('salon.show');
Route::get('/salon/{grado}/{seccion}/edit', 'SalonController@edit')->name('salon.edit');
Route::put('/salon/{grado}/{seccion}', 'SalonController@update')->name('salon.update');
Route::delete('/salon/{grado}/{nivel}', 'SalonController@destroy')->name('salon.destroy');

Route::resource('/usuario-registrar', 'PersonaController');
//Route::get('/usuario-registrar', 'Auth\RegisterController@registrarUsuario')->name('usuario.registrar');

Route::post('/matricularAlumno','PersonaController@matricula')->name('matricula.alumno');

Route::get('/curso', 'AlumnoCursoController@cursos')->name('estudiante.cursos');
Route::get('/nota', 'AlumnoCursoController@notas')->name('estudiante.notas');
Route::get('/asistencia', 'AsistenciaController@index')->name('estudiante.asistencias');


Route::get('/info', 'PersonaController@index')->name('user.info');

Route::post('/asignarProfesor','PersonaController@asignarCurso')->name('asignar.curso');


Route::get('/cursosDictados', 'ProfesorCursoController@cursos')->name('profesor.cursos');
Route::get('/ingresarNotasCurso', 'ProfesorCursoController@createIngresar')->name('profesor.ingresar');
Route::post('/ingresarNotasAlumno', 'ProfesorCursoController@createIngresar1')->name('profesor.ingresar1');
Route::post('/ingresarNotas', 'ProfesorCursoController@ingresarNotas')->name('profesor.ingresarNotas');
Route::get('/reporteCursos', 'ProfesorCursoController@reporteAlumnos')->name('profesor.alumnos');
Route::get('/reporteCursos/{id}', 'ProfesorCursoController@reporteCompleto')->name('profesor.reporte');

Route::resource('/curso-registrar','CursoController');
