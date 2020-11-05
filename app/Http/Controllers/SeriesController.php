<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadorDeSeries;
use App\Services\RemovedorDeSeries;
use App\Temporada;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()
            ->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {

        return view('series.create');

    }

    public function store(SeriesFormRequest $request, CriadorDeSeries $criadorDeSeries)
    {

        $serie = $criadorDeSeries->criarSeries(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada);

        $request->session()
            ->flash(
                'mensagem',
                "Série id: {$serie->id}, {$serie->nome} e seus episodios criada com sucesso "
            );

        return redirect()->route('listar_series');

    }

    public function destroy(Request $request, RemovedorDeSeries $removedorDeSerie)
    {

        $nomeSerie = $removedorDeSerie->removerSerie($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "Série $nomeSerie removida com sucesso!"
            );

        return redirect()->route('listar_series');


    }

}
