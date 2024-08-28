<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientFormRequest;
use App\Http\Requests\ClientUpdateForm;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return view('admin.client.index', compact('clients')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = new Client();      
        return view('admin.client.form', compact( 'client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Client $client, ClientFormRequest $request)
    {
        
        try {
            $client->designation = $request->designation;
            $client->raisonsociale = $request->raisonsociale;
            $client->adresse = $request->adresse;
            $client->telephone = $request->telephone;
            $client->email = $request->email;
            $client->ifu = $request->ifu;
            $client->rccm = $request->rccm;
            $client->save();
            return redirect()->route('client.index')->with('success_message', 'Client crée avec succès');
          } catch (Exception $e) {
               dd($e);
          }   
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('admin.client.edit', compact('client' ));
    }

    /**
     * Update the specified resource in storage.
     */ 
    public function update(ClientUpdateForm $request, Client $client)
    {
        
        try {
            $client->designation = $request->designation;
            $client->raisonsociale = $request->raisonsociale;
            $client->adresse = $request->adresse;
            $client->telephone = $request->telephone;
            $client->email = $request->email;
            $client->ifu = $request->ifu;
            $client->rccm = $request->rccm;  
 
            $client->update();
           
           return redirect()->route('client.index')->with('success_message', 'Les informations du client ont été mise à jour');
        
         } catch (Exception $e) {
             dd($e);
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
