@extends('layouts.app')

@section('content')
    @include('dashboard.client.fragment._errors-form')
    <div class="form-container">
        <h1 class="card-title">Actualizar cliente</h1>

        <form action="{{ route('client.update', $client->id) }}" method="post">

            @method('PATCH')

            @include('dashboard.client._form')

        </form>
    </div>
@endsection
