<?php


namespace App\Services;


use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RemovedorDeSerie
{
    public function RemoverSerie(int $serieId) : String
    {
        DB::beginTransaction();
        $serie = Serie::find($serieId);
        $nomeSerie = $serie->nome;

        if($serie->capa){
            Storage::delete($serie->capa);
        }

        $serie->temporadas->each(function (Temporada $temporada){
            $temporada->episodios()->each(function (Episodio $episodio){
                $episodio->delete();
            });
            $temporada->delete();
        });
        $serie->delete();
        DB::commit();

        return $nomeSerie;
    }

}
