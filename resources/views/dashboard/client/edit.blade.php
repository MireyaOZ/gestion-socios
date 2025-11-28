@extends('layouts.app') 

@section('content')   

    {{--@include('dashboard.fragment._errors-form')--}} 

    <h1 class="card-title">Actualizar cliente</h1>
    
    <form action="{{ route('client.update', $client->id) }}" method="post">   
         
        @method('PATCH')

        @include('dashboard.client._form') 
                                                            


    </form>

@endsection