<?php


namespace App\Http\Controllers;
use App\Serie;
use illuminate\http\Request;


class seriesController extends Controller
{
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

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());
        $request->session()->flash('mensagem',"Série {$serie->id} criada com sucesso {$serie->nome}");

        return redirect('/series');

    }

}
