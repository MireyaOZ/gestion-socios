@extends('layouts.app')

@section('content')

    <div class="table-container">

        <a class="btn btn-success" href="{{ route('client.create') }}">Registrar</a>

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
                        Calle
                    </th>
                     <th>
                        Colonia
                    </th>
                     <th>
                        Número interior
                    </th>
                     <th>
                        Número exterior
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
                            {{ $cli->street }}
                        </td>
                        <td>
                            {{ $cli->colony }}
                        </td>
                        <td>
                            {{ $cli->interior_number }}
                        </td>
                        <td>
                            {{ $cli->exterior_number }}
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('client.edit', $cli) }}">Editar</a>
                            <a class="btn btn-primary " href="{{ route('client.show', $cli) }}">Mostrar</a>
                            <form action="{{ route('client.destroy', $cli) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('¿Seguro que deseas eliminar este elemento?')">
                                    Eliminar
                                </button>
                            </form>
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
