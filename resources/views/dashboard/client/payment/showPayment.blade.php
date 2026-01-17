@extends('layouts.app')

@section('content')
    <div class="table-container">
        <h2 class="card-title">Historial de pagos</h2>
        @if ($payments->isEmpty())
            <p>No hay pagos registrados para este cliente</p>
        @else
            <table class="table-payments">
                <thead>
                    <tr>
                        <th>Fecha de pago</th>
                        <th>Número de recibo</th>
                        <th>Monto</th>
                        <th>Comprobante</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $payment->created_at->format('d/m/Y') }}</td>
                            <td>{{ $payment->receipt_number }}</td>
                            <td>${{ number_format($payment->amount, 2) }}</td>
                            <td>
                                <a class="btn-payments" href="{{ route('payment.voucher', $payment) }}">Ver comprobante</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $payments->links() }} <!-- Permite navegar entre paginas -->
            </div>
        @endif
        <div class="back-link">
            <a href="{{ route('payment.listClients') }}">← Volver</a>
        </div>
    </div>
@endsection
