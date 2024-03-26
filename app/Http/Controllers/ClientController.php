<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

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
        $clients = Client::all();

        // Devuelves la respuesta en formato JSON
        return response()->json(['status' => 200, 'data' => $clients]);
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
        return response()->json(['status' => 200, 'message' => 'Mostrar formulario de creación de cliente']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Aquí obtienes los datos del cliente del cuerpo de la solicitud
        // Validar los datos del cliente
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country_id' => 'required|exists:countries,id',
        ]);

        // Crear un nuevo cliente en la base de datos
        $client = new Client();
        $client->name = $validatedData['name'];
        $client->address = $validatedData['address'];
        $client->phone = $validatedData['phone'];
        $client->country_id = $validatedData['country_id'];
        $client->save();

        // Devolver la respuesta en formato JSON
        return response()->json(['status' => 200, 'data' => 'Cliente creado exitosamente']);
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
        // Verificar si el cliente existe
        if (!$client) {
            return response()->json(['status' => 404, 'message' => 'Cliente no encontrado'], 404);
        }

        // Devolver la respuesta en formato JSON con los datos del cliente
        return response()->json(['status' => 200, 'data' => $client]);
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
        // Verificar si el cliente existe
        if (!$client) {
            return response()->json(['status' => 404, 'message' => 'Cliente no encontrado'], 404);
        }

        // Validar los datos actualizados del cliente
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country_id' => 'required|exists:countries,id',
        ]);

        // Actualizar los datos del cliente en la base de datos
        $client->name = $validatedData['name'];
        $client->address = $validatedData['address'];
        $client->phone = $validatedData['phone'];
        $client->country_id = $validatedData['country_id'];
        $client->save();

        // Devolver la respuesta en formato JSON
        return response()->json(['status' => 200, 'message' => 'Cliente actualizado exitosamente']);
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
