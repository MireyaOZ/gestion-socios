@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Comprobante de Pago</h1>

    <p><strong>Socio:</strong> {{ $client->name }}</p>
    <p><strong>Contrato:</strong> {{ $client->contract_number }}</p>

    <hr>

    <p><strong>Número de recibo:</strong> {{ $payment->receipt_number }}</p>
    <p><strong>Monto:</strong> ${{ number_format($payment->amount, 2) }}</p>
    <p><strong>Fecha:</strong> {{ $payment->created_at->format('d/m/Y') }}</p>

    <br>

    <a href="{{ route('payment.showPayment', $client->id) }}">← Volver</a>
</div>
@endsection
