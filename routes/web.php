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


Route::get('/series', 'seriesController@index')->name('listar_series');
Route::get('/series/criar', 'seriesController@create')->name('criar_serie');
Route::post('/series/criar', 'seriesController@store');
Route::post('/series/{id}/editaNome', 'seriesController@editaNome');
Route::delete('/series/{id}', 'seriesController@destroy');
Route::get('/series/editar', 'seriesController@edit');
Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');
Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');


Route::get('series/{serieId}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
