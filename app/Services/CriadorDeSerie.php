<?php


namespace App\Services;


use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{

    public function criarSerie(String $nomeSerie, int $qtdTemporadas, int $epPorTemporada, string $capa) : Serie
    {
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie, 'capa' => $capa]);

        for($i=1; $i <= $qtdTemporadas; $i++){
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for($j=1; $j <= $epPorTemporada; $j++){
                $temporada->episodios()->create(['numero' => $j]);
            }
        }
        DB::commit();

        return $serie;

    }

}
