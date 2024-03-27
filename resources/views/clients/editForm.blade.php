@extends('layouts.app')

@section('content')
    <h1>Editar Cliente</h1>

    <form method="POST" action="{{ route('clients.update', $client->id) }}">
        @csrf
        @method('PUT')

        <!-- Aquí incluye los campos del formulario para editar el cliente -->
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ $client->name }}"><br>

        <label for="address">Dirección:</label>
        <input type="text" name="address" id="address" value="{{ $client->address }}"><br>

        <label for="phone">Teléfono:</label>
        <input type="text" name="phone" id="phone" value="{{ $client->phone }}"><br>

        <label for="country_id">País ID:</label>
        <input type="text" name="country_id" id="country_id" value="{{ $client->country_id }}"><br>

        <button type="submit">Actualizar Cliente</button>
    </form>
@endsection
