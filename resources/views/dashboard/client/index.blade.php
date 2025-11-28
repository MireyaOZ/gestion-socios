@extends('layouts.app')

@section('content')
    <div class="table-container">

        <a href="{{ route('client.create') }}">Create</a>

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
                        Nombre
                    </th>
                    <th>
                        Dirección
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
                            {{ $cli->direction }}
                        </td>
                        <td>
                            <a href="{{ route('client.edit', $cli) }}">Editar</a>
                            <a href="{{ route('client.show', $cli) }}">Mostrar</a>
                            <form action="{{ route('client.destroy', $cli) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este elemento?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $clients->links() }} <!-- Permite navegar entre paginas -->

    </div>
@endsection
