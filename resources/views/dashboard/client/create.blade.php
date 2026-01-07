@extends('layouts.app')

@section('content')
    @include('dashboard.client.fragment._errors-form')
    @include('dashboard.client.fragment._user-success')
    <div class="form-container">
        <h1 class="card-title">Registrar un cliente</h1>

        <form action="{{ route('client.store') }}" method="post">

            @include('dashboard.client._form')

        </form>
    </div>
@endsection
