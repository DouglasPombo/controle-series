@extends('layout')

@section('cabecalho')
    Episódios
@endsection

@section('conteudo')
    <form action="/temporadas/{{ $temporadaId }}/episodios/assistir" method="POST">
        @csrf
        <ul class="list-group">
            @foreach($episodios as $episodio)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episodio {{$episodio->numero}}
                <input type="checkbox" name="episodios[]" value="{{$episodio->numero}}">
            </li>
            @endforeach
        </ul>
        <button class="btn-primary mt-2 mb-2">Salvar</button>
    </form>
@endsection