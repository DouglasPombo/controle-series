<?php


namespace App\Http\Controllers;
use App\Serie;
use illuminate\http\Request;


class seriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::all();


        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');

    }

    public function store(Request $request)
    {
        $nome = $request->nome;
        Serie::create([
            'nome' => $nome
        ]);

    }

}
