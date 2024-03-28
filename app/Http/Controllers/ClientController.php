<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Here you get the list of clients
        $clients  = Client::all();
        $countries = Countries::all();

        // You return the response in JSON format
        return view('clients.index', ['clients' => $clients,'countries'=>$countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Countries::all();
        $clients = Client::all();

        return view('clients.create', ['countries' => $countries,'clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country_id' => 'required|exists:countries,id',
        ]);

        // Create a new Client
        $client = new Client();
        $client->name = $request->input('name');
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');
        $client->country_id = $request->input('country_id');
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client successfully updated.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        // You return the client information in JSON format
        return response()->json(['status' => 200, 'data' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client, $id = null)
    {
        if ($id !== null) {
            $client = Client::findOrFail($id);
        }

        // Get all customers from the database
        $clients = Client::all();
        $countries = Countries::all();

        // Return edit view with clients
        return view('clients.edit', ['clients' => $clients,'client' => $client,'countries' => $countries]);
    }

    public function getClientData(Client $client)
    {
        // Return customer data in JSON format
        return response()->json($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        // Validate updated customer data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country_id' => 'required|exists:countries,id',
        ]);

        // Update customer data in database
        $client->update($validatedData);

        // Redirect to the path 'clients.index' with a success message
        return redirect()->route('clients.index')->with('success', 'Client successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        // Check if the client exists
        if (!$client) {
            return response()->json(['status' => 404, 'message' => 'Client not found'], 404);
        }

        // Remove the client from the database
        $client->delete();

        // Return response in JSON format
        return redirect()->route('clients.index')->with('success', 'Client successfully created.');
    }
}
