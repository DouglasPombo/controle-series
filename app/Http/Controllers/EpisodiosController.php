<?php


namespace App\Http\Controllers;


use App\Episodio;
use App\Temporada;
use illuminate\http\Request;

class EpisodiosController extends Controller
{

    public function index(Temporada $temporada)
    {
        $episodios = $temporada->episodios;
        $temporadaId = $temporada->id;
        return view('episodios.index', compact('episodios', 'temporadaId'));
    }

    /**
     * https://cursos.alura.com.br/forum/topico-erro-na-atualizacao-dos-episodios-assistidos-113051
     * @param Temporada $temporada
     * @param Request $request
     */
    public function assistir(Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function (Episodio $episodio) use ($episodiosAssistidos) {
            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
        });

        $temporada->push();
    }

}
