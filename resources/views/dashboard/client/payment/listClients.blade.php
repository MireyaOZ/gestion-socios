@extends('layouts.app')

@section('content')
    <div class="table-container">

        <form method="GET" action="{{ route('client.index') }}" class="search-form">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar cliente...">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Número de contrato
                    </th>
                    <th>
                        CURP
                    </th>
                    <th>
                        Nombre completo
                    </th>
                    <th>
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $cli)
                    <tr>
                        <td>
                            {{ $cli->id }}
                        </td>
                        <td>
                            {{ $cli->contract_number }}
                        </td>
                        <td>
                            {{ $cli->curp }}
                        </td>
                        <td>
                            {{ $cli->name }}
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('payment.showClient', $cli) }}">Visualizar</a>
                            <a class="btn btn-primary" href="{{ route('payment.showPayment', $cli) }}">Ver pagos</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $clients->links() }} <!-- Permite navegar entre paginas -->
        </div>

    </div>
@endsection
