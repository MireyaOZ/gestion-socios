@extends('layouts.app')

@section('content')

@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

    <div class="card">
        <h1 class="card-title">Detalles del Socio</h1>

        <p><strong>Número de Contrato:</strong> {{ $client->contract_number }}</p>
        <p><strong>CURP:</strong> {{ $client->curp }}</p>
        <p><strong>Nombre completo:</strong> {{ $client->name }}</p>
        <p><strong>Calle:</strong> {{ $client->street }}</p>
        <p><strong>Colonia:</strong> {{ $client->colony }}</p>
        <p><strong>Número interior:</strong> {{ $client->interior_number }}</p>
        <p><strong>Número exterior:</strong> {{ $client->exterior_number }}</p>

        <!-- 1. Checkbox oculto que controla el modal -->
        <input type="checkbox" id="modal-toggle" class="modal-toggle hidden">

        <!-- 2. Botón para abrir el modal -->
        <label for="modal-toggle" class="btn-openModal">
            Agregar pago
        </label>

        <!-- 3. Modal -->
        <div class="modal">
            <div class="modal-content">

                <h2 class="tittle-modal">Agregar abono</h2>

                <form action="{{ route('payment.storePayment') }}" method="POST">
                    @csrf

                    <input type="hidden" name="client_id" value="{{ $client->id }}">

                    <label class="monto">Monto del abono:</label>
                    <input class="enter-amount" type="number" name="amount" step="0.01" required>

                    <div>
                        <!-- 4. Botón para cerrar el modal -->
                        <label for="modal-toggle" class="btn-closeModal">
                            Cerrar
                        </label>

                        <button type="submit" class="btn-save">
                            Guardar
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <a href="{{ route('payment.voucherLast', $client)}}" type="submit" class="btn-voucher">
            Generar comprobante
        </a>

        <div class="back-link">
            <a href="{{ route('payment.listClients') }}">← Volver</a>
        </div>
    </div>
@endsection
