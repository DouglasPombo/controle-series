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


use App\Mail\NovaSerie;
use Illuminate\Support\Facades\Mail;

Route::get('/series', 'seriesController@index')->name('listar_series');
Route::get('/series/criar', 'seriesController@create')->name('criar_serie')->middleware('autenticador');
Route::post('/series/criar', 'seriesController@store')->middleware('autenticador');
Route::post('/series/{id}/editaNome', 'seriesController@editaNome')->middleware('autenticador');
Route::delete('/series/{id}', 'seriesController@destroy')->middleware('autenticador');
Route::get('/series/editar', 'seriesController@edit');
Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');
Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');


Route::get('series/{serieId}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->middleware('autenticador');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sair', function () {

    Auth::logout();
    return redirect('/entrar');
});


Route::get('/enviando-email', function () {

    $email = New NovaSerie(
        'Teste',
        '5',
        '5'
    );

    $email->subject = 'Nova Série Adicionada';

    $user = (object)[
        'email' => 'douglas@teste.com',
        'name' => 'douglsa'
    ];

    Mail::to($user)->send($email);
    return 'Email enviado';

});
