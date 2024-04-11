@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Frutas</h1>
    <a href="{{ route('frutas.create') }}" class="btn btn-primary">Agregar Fruta</a>
    <ul class="list-group mt-3">
        @foreach ($frutas as $fruta)
            <li class="list-group-item">
                {{ $fruta->nombre }} - {{ $fruta->color }} - ${{ $fruta->precio }}
                <a href="{{ route('frutas.show', $fruta->id) }}" class="btn btn-info">Ver</a>
                <a href="{{ route('frutas.edit', $fruta->id) }}" class="btn btn-secondary">Editar</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
