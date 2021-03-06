@extends('layout')

@section('cabecalho')
    Séries
@endsection

@section('conteudo')

    @if(!empty($mensagem))
        <div class="alert alert-success">

            {{ $mensagem }}

        </div>
    @endif

    <a href="{{ route('criar_serie') }}" class="btn btn-primary mb-2"><i class="fas fa-plus"></i></a>

    <ul class="list-group">

        @foreach ($series as $serie)

            <li class="list-group-item d-flex justify-content-between align-items-center">

                {{ $serie->nome }}

                <span class="d-flex">

                    <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-outline-info btn-sm mr-1">
                       <i class="fas fa-external-link-alt"></i>
                    </a>

                <form method="post" action="/series/{{ $serie->id }}"

                      onsubmit="return confirm ('Tem certeza que deseja remover {{ addslashes($serie->nome) }} ?')">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>

                </form>

                </span>
            </li>

        @endforeach

    </ul>

@endsection


