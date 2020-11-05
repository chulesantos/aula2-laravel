<?php


namespace App\Services;

use App\{Serie, Temporada, Episodio};


class RemovedorDeSeries
{

    public function removerSerie(int $serieId): string
    {

        $serie = Serie::find($serieId);

        $serie->temporadas->each(function (Temporada $temporadas) {

            $temporadas->episodios->each(function (Episodio $episodio) {

                $episodio->delete();

            });
            $temporadas->delete();
        });

        $serie->delete();

        return $serie->nome;

    }
}
