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
        // Aquí obtienes la lista de clientes
        $client = Client::all();

        // Devuelves la respuesta en formato JSON
        return response()->json(['status' => 200, 'data' => $client]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Aquí puedes incluir lógica adicional si es necesario

        // Devolver la respuesta en formato JSON indicando que se muestra el formulario de creación
        // Obtener la lista de países
        $countries = Countries::all();

        return view('clients.create', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country_id' => 'required|exists:countries,id',
        ]);

        // Crear un nuevo Cliente
        $client = new Client();
        $client->name = $request->input('name');
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');
        $client->country_id = $request->input('country_id');
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Cliente creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        // Devuelves la información del cliente en formato JSON
        return response()->json(['status' => 200, 'data' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        // Obtener todos los clientes de la base de datos
        $clients = Client::all();

        // Devolver la vista de edición con los clientes
        return view('clients.edit', ['clients' => $clients]);
    }

    public function editForm(Client $client)
    {
        // Devolver la vista del formulario de edición con el cliente específico
        return view('clients.editForm', ['client' => $client]);
    }

    public function getClientData(Client $client)
    {
        // Devolver los datos del cliente en formato JSON
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
        // Validar los datos actualizados del cliente
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country_id' => 'required|exists:countries,id',
        ]);

        // Actualizar los datos del cliente en la base de datos
        $client->update($validatedData);

        // Redirigir a la ruta 'clients.index' con un mensaje de éxito
        return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        // Verificar si el cliente existe
        if (!$client) {
            return response()->json(['status' => 404, 'message' => 'Cliente no encontrado'], 404);
        }

        // Eliminar el cliente de la base de datos
        $client->delete();

        // Devolver la respuesta en formato JSON
        return response()->json(['status' => 200, 'message' => 'Cliente eliminado exitosamente']);
    }
}
