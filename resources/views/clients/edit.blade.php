@extends('layouts.app')

{{-- @section('content')
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

        // Obtener la URL actual
const url = window.location.href;

// Dividir la URL por '/'
const partesUrl = url.split('/');

// Obtener el número deseado (en este caso, el número "9")
const numero = parseInt(partesUrl[partesUrl.length - 2]);

showEditForm(numero);
    </script>

@endsection --}}

@section('extraStyles')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
@endsection

@section('asides')
<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="/clients" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <button
            class="w-full  bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class="fas fa-plus mr-3"></i> <a href="/clients/create">New Client</a>
        </button>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="/clients" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="/clients/9/edit" class="flex active-nav-link items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-align-left mr-3"></i>
            Edit User
        </a>
    </nav>
    <a href="/"
        class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
        <i class="fas fa-arrow-circle-up mr-3"></i>
        Upgrade to Pro!
    </a>
</aside>
@endsection

@section('content')

<div class="relative w-full flex flex-col h-screen overflow-y-hidden">
    <!-- Desktop Header -->
    <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
        <div class="w-1/2"></div>
        <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
            <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
            </button>
            <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
            <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
            </div>
        </div>
    </header>

    <!-- Mobile Header & Nav -->
    <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
        <div class="flex items-center justify-between">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                <i x-show="!isOpen" class="fas fa-bars"></i>
                <i x-show="isOpen" class="fas fa-times"></i>
            </button>
        </div>

        <!-- Dropdown Nav -->
        <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
            <a href="index.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="blank.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Blank Page
            </a>
            <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-table mr-3"></i>
                Tables
            </a>
            <a href="forms.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Forms
            </a>
            <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-tablet-alt mr-3"></i>
                Tabbed Content
            </a>
            <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-calendar mr-3"></i>
                Calendar
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-cogs mr-3"></i>
                Support
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-user mr-3"></i>
                My Account
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Sign Out
            </a>
            <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
            </button>
        </nav>
    </header>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Edit User</h1>

            <div class="flex flex-wrap">
                <div class="w-full  my-6 pr-0 lg:pr-2">
                    <p class="text-xl pb-6 flex items-center">
                        <i class="fas fa-list mr-3"></i> Edit Form
                    </p>
                    <div class="leading-loose">
                        <form class="p-10 bg-white rounded shadow-xl" method="POST" action="/clients/9">
                            @csrf
                            @method('PUT')
                                <div>
                                    <label class="block text-sm text-gray-600" for="name">Name</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" value="{{ $client->name }}"
                                        name="name" type="text" required placeholder="Your Name" aria-label="Name">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="address">Address</label>
                                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" name="address"
                                        id="address" type="text" required placeholder="Your Address" value="{{ $client->address }}"
                                        aria-label="Address">
                                </div>
                                <div class="mt-2">
                                    <label class=" block text-sm text-gray-600" for="phone">Phone</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="phone"
                                        id="phone" type="tel" required placeholder="Your Phone" aria-label="Phone" value="{{ $client->phone }}">
                                </div>
                                <div class="mt-2">
                                    <label
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                        for="country_id">
                                        Country
                                    </label>
                                    <select  name="country_id"m id="countryEdit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-6">
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-green-500 rounded"
                                        type="submit">Update</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </main>

        <footer class="w-full bg-white text-right p-4">
            Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
        </footer>
    </div>

</div>

@endsection

@section('scripts')
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

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

        // Obtener la URL actual
        const url = window.location.href;

        // Dividir la URL por '/'
        const partesUrl = url.split('/');

        // Obtener el número deseado (en este caso, el número "9")
        const numero = parseInt(partesUrl[partesUrl.length - 2]);

        showEditForm(numero);
    </script>
@endsection
