<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreRequest; 
use App\Models\Client;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$client = Client::find(3);
        //dd($client->name); 
        $clients = Client::paginate(5);           //muestra lista de clientes de 5 por cada página
        return view('dashboard.client.index', compact('clients'));  //muestra la vista y le envía variables a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = new Client();         //crea un modelo vacio, que aun no esta guardado en la base de datos
    
        return view('dashboard.client.create', compact('client'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)  
    {
        Client::create($request->validated());  //Se devuelven solo datos validados,crea y guarda
        return redirect()->route('client.create')->with('success', 'El usuario se registró con exito'); //redirige a otra página y muestra el mensaje
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('dashboard.client.show', compact('client')); //muestra un cliente por id
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('dashboard.client.edit', compact('client'));  //muestra vista del formulario con los datos ya cargados
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Client $client)
    {
        $client->update($request->validated()); //valida datos y actualiza el cliente
        return redirect()->route('client.index')->with('success', 'Los datos se actualizaron con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();     //elimina el registro
        return to_route('client.index'); //redirige a una ruta por nombre
    }
}
