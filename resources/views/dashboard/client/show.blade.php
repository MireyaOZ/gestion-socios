@extends('layouts.app')

@section('content')
    <div class="card">
        <h1 class="card-title">Detalles del Socio</h1>

        <p><strong>Número de Contrato:</strong> {{ $client->contract_number }}</p>
        <p><strong>CURP:</strong> {{ $client->curp }}</p>
        <p><strong>Nombre completo:</strong> {{ $client->name }}</p>
        <p><strong>Calle:</strong> {{ $client->street }}</p>
        <p><strong>Colonia:</strong> {{ $client->colony }}</p>
        <p><strong>Número interior:</strong> {{ $client->interior_number }}</p>
        <p><strong>Número exterior:</strong> {{ $client->exterior_number }}</p>

        <div class="back-link">
            <a href="{{ route('client.index') }}">← Volver</a>
        </div>
    </div>
@endsection
