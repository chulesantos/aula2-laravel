<?php


namespace App\Services;

use App\Serie;

class CriadorDeSeries
{

    public function criarSeries(
        string $nome,
        int $qtdTemporadas,
        int $ep_por_temporada): Serie
    {

        $serie = Serie::create([
            'nome' => $nome
        ]);

        for ($i = 1; $i <= $qtdTemporadas; $i++) {

            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for ($j = 1; $j <= $ep_por_temporada; $j++) {

                $temporada->episodios()->create(['numero' => $j]);
            }
        }

        return $serie;

    }
}
