@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Fruta</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $fruta->nombre }}</h5>
            <p class="card-text">Color: {{ $fruta->color }}</p>
            <p class="card-text">Precio: ${{ $fruta->precio }}</p>
            <a href="{{ route('frutas.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
</div>
@endsection

