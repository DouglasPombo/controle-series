<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{

    public function index(int $serieId)
    {
        $serie = Serie::find($serieId);
//        dd($serie);
        $temporadas = Serie::find($serieId)->temporadas;

        return view('temporadas.index', compact('temporadas', 'serie'));

    }
}
