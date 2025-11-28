<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::paginate(5);
        return view('dashboard.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = new Client();    
    
        return view('dashboard.client.create', compact('client'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Client::create($request->all());
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('dashboard.client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('dashboard.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();     
        return to_route('client.index');
    }
}
