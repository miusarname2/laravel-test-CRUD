@extends('layouts.app')

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

        [x-cloak] {
            display: none;
        }
    </style>
@endsection

@section('asides')
<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="/clients" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <button
            class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class="fas fa-plus mr-3"></i> <a href="/clients/create">New Client</a>
        </button>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="/clients" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="/clients/9/edit" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
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
    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
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
            <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
                <a href="index.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
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
                <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Forms
                </a>
                <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Tabbed Content
                </a>
                <a href="calendar.html"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
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
                <button
                    class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                </button>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Dashboard</h1>
                <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Latest Clients
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Address</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm"></th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm"></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($clients as $client)
                                    @if ($client->id % 2 != 0)
                                        <tr>
                                            <td class="w-1/3 text-left py-3 px-4">{{ $client->name }}</td>
                                            <td class="w-1/3 text-left py-3 px-4">{{ $client->address }}</td>
                                            <td class="w-1/3 text-left py-3 px-4"><a class="hover:text-blue-500"
                                                    href="tel:622322662">{{ $client->phone }}</a></td>
                                            <td class="w-1/3 text-left py-3 px-4">
                                                <a href="{{ route('clients.edit', $client->id) }}"
                                                    class="text-blue-600 hover:text-blue-900 ml-2">
                                                    <i class="fas fa-pen mr-3"></i>
                                                </a>
                                            </td>
                                            <td class="w-1/3 text-left py-3 px-4">
                                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900"
                                                        onclick="return confirm('¿Estás seguro de eliminar este cliente?')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="bg-gray-200">
                                            <td class="w-1/3 text-left py-3 px-4">{{ $client->name }}</td>
                                            <td class="w-1/3 text-left py-3 px-4">{{ $client->address }}</td>
                                            <td class="w-1/3 text-left py-3 px-4"><a class="hover:text-blue-500"
                                                    href="tel:622322662">{{ $client->phone }}</a></td>
                                            <td class="w-1/3 text-left py-3 px-4"><a
                                                    href="{{ route('clients.edit', $client->id) }}"
                                                    class="text-blue-600 hover:text-blue-900 ml-2">
                                                    <i class="fas fa-pen mr-3"></i>
                                                </a></td>
                                            <td class="w-1/3 text-left py-3 px-4"><form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('¿Estás seguro de eliminar este cliente?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </form></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>

    </div>
@endsection

@section('scripts')
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
@endsection
