@extends('layouts.app')

@section('content')
    <div class="card">
        <h1 class="card-title">Comprobante de Pago</h1>

        <p><strong>Nombre del Cliente:</strong> {{ $client->name }}</p>
        <p><strong>Número de Contrato:</strong> {{ $client->contract_number }}</p>

        <hr>

        <p><strong>Número de recibo:</strong> {{ $payment->receipt_number }}</p>
        <p><strong>Monto:</strong> ${{ number_format($payment->amount, 2) }}</p>
        <p><strong>Fecha:</strong> {{ $payment->created_at->format('d/m/Y') }}</p>

        <br>

        @if ($payment)
            <a href="{{ route('payment.voucherPDF', $payment->id) }}" class="btn-voucher">
                Descargar comprobante
            </a>
        @endif

        <div class="back-link">
            <a href="{{ route('payment.showClient', $client->id) }}">← Volver</a>
        </div>
    </div>
@endsection
