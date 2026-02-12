@extends('/layouts/app')

@section('Biblioteca', 'mostrar clientes')

@section('contenido')

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Buscar</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Buscar clientes..." required="">
                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="/clientes/formulario"
                            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Nuevo Cliente
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Cliente</th>
                                <th scope="col" class="px-4 py-3">Usuario</th>
                                <th scope="col" class="px-4 py-3">Correo</th>
                                <th scope="col" class="px-4 py-3">Teléfono</th>
                                <th scope="col" class="px-4 py-3 text-center">Estado</th>
                                <th scope="col" class="px-4 py-3 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">


                                        <div class="flex items-center">
                                            @if ($cliente->foto)
                                                <img src="{{ asset('storage/img/clientes/' . $cliente->foto) }}"
                                                    class="w-10 h-10 rounded-full mr-3 object-cover border border-gray-200">
                                            @else
                                                <div
                                                    class="w-10 h-10 rounded-full bg-primary-100 flex items-center justify-center mr-3 text-primary-700 font-bold">
                                                    {{ strtoupper(substr($cliente->nombre, 0, 1)) }}
                                                </div>
                                            @endif
                                            <div>
                                                <div class="text-base font-semibold">{{ $cliente->nombre }}
                                                    {{ $cliente->apellido_paterno }}</div>
                                                <div class="text-xs text-gray-500 font-normal">
                                                    {{ $cliente->apellido_materno }}</div>
                                            </div>
                                        </div>


                                    </th>
                                    <td class="px-4 py-3">{{ $cliente->usuario }}</td>
                                    <td class="px-4 py-3 italic">{{ $cliente->correo }}</td>
                                    <td class="px-4 py-3">{{ $cliente->telefono }}</td>
                                    <td class="px-4 py-3 text-center">
                                        @if ($cliente->estado == 1 || $cliente->estado == 'activo')
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Activo</span>
                                        @else
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Inactivo</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-center space-x-2">
                                            {{-- BOTÓN MOSTRAR (VER) --}}
                                            <a href="/clientes/{{ $cliente->id }}/ver"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-xs px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
                                                Ver
                                            </a>

                                            {{-- BOTÓN EDITAR --}}
                                            <a href="/clientes/{{ $cliente->id }}/editar"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                Editar
                                            </a>

                                            {{-- BOTÓN BORRAR --}}
                                            <form action="/clientes/{{ $cliente->id }}/eliminar" method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este cliente?')">
                                                @csrf
                                                <button type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 dark:bg-red-500 dark:hover:bg-red-600 focus:outline-none dark:focus:ring-red-900">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
