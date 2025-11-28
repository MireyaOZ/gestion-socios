@extends('layouts.app')  

@section('content')

<div class="card">
    <h1 class="card-title">Detalles del Socio</h1>

    <p><strong>Número de Contrato:</strong> {{ $client->contract_number }}</p>
    <p><strong>CURP:</strong> {{ $client->curp }}</p>
    <p><strong>Nombre:</strong> {{ $client->name }}</p>
    <p><strong>Dirección:</strong> {{ $client->direction }}</p>

    <div class="back-link">
        <a href="{{ route('client.index') }}">← Volver</a>
    </div>
</div>


@endsection