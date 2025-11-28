@extends('layouts.app')  

@section('content')  

    {{--@include('dashboard.fragment._errors-form') --}}

    <h1 class="card-title">Registrar un cliente</h1>
    
    <form action="{{ route('client.store')}}" method="post">      

        @include('dashboard.client._form')
        
    </form>

@endsection