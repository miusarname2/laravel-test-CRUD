@extends('layouts.app')

@section('content')
    <h1>Editar Clientes</h1>

    <ul>
        @foreach ($clients as $client)
            <li>
                {{ $client->name }} -
                <a href="#" onclick="showEditForm({{ $client->id }})">Editar</a>
            </li>
        @endforeach
    </ul>

    <div id="editForm" style="display: none;">
        <h2>Editar Cliente</h2>

        <form id="editClientForm" method="POST" action="#">
            @csrf
            @method('PUT')

            <!-- Aquí incluye los campos del formulario para editar el cliente -->
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value=""><br>

            <label for="address">Dirección:</label>
            <input type="text" name="address" id="address" value=""><br>

            <label for="phone">Teléfono:</label>
            <input type="text" name="phone" id="phone" value=""><br>

            <label for="country_id">País ID:</label>
            <input type="text" name="country_id" id="country_id" value=""><br>

            <button type="submit">Actualizar Cliente</button>
        </form>
    </div>

    <script>
       async function showEditForm(clientId) {
            // Realizar una petición AJAX para obtener los datos del cliente
            axios.get('/clients/' + clientId)
                .then(function (response) {
                    var client = response.data;

                    // Mostrar el formulario de edición y prellenar los campos con los datos del cliente
                    document.getElementById('editForm').style.display = 'block';
                    document.getElementById('name').value = client.data.name;
                    document.getElementById('address').value = client.data.address;
                    document.getElementById('phone').value = client.data.phone;
                    document.getElementById('country_id').value = client.data.country_id;

                    // Actualizar la acción del formulario con la ruta correcta para actualizar el cliente
                    var form = document.getElementById('editClientForm');
                    form.action = '/clients/' + clientId;
                })
                .catch(function (error) {
                    console.error('Error al obtener los datos del cliente:', error);
                });
        }
    </script>

@endsection
