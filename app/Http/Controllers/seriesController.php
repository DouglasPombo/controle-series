<?php


namespace App\Http\Controllers;
use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use App\Temporada;
use illuminate\http\Request;


class seriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');


        return view('series.index', compact('series','mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {
        $serie = $criadorDeSerie->criarSerie($request->nome, $request->qtd_temporadas, $request->ep_por_temporada);
        $request->session()->flash('mensagem',"Série {$serie->id} criada com sucesso {$serie->nome}");

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, RemovedorDeSerie $nomeSerie)
    {
        $nome = $nomeSerie->RemoverSerie($request->id);
        $request->session()->flash('mensagem',"Série {$nome} removida com sucesso!");

        return redirect()->route('listar_series');
    }

    public function editaNome(Request $request , int $id)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();

    }

}
