<h2>Historial de pagos</h2>

@if ($client->payments->isEmpty())
    <p>No hay pagos registrados para este cliente</p>
@else
    <ul>
        @foreach ($client->payments as $payment)
            <li>
                {{ $payment->created_at->format('d/m/Y') }} — ${{ number_format($payment->amount, 2) }}
            </li>
        @endforeach
    </ul>
@endif
