<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('client.client', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.createClient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pt_name' => 'required',
            'person_name' => 'required',
            'contact_number' => 'required',
        ]);

        $client = new client;
        $client->pt_name = $request->get('pt_name');
        $client->person_name = $request->get('person_name');
        $client->contact_number = $request->get('contact_number');;

        $client->save();
        return redirect()->route('client.index')->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Client::where('id', $id)->first();
        return view('client.editClient', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pt_name' => 'required',
            'person_name' => 'required',
            'contact_number' => 'required',
        ]);

        $client = Client::find($id);
        $client->pt_name = $request->get('pt_name');
        $client->person_name = $request->get('person_name');
        $client->contact_number = $request->get('contact_number');;
        $client->save();
    
        // $id->update();
    
        return redirect()->route('client.index')
                        ->with('success','Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Client::where('id', $id)->delete();
        return redirect()->back();
    }
}
