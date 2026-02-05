@extends('/layouts/app')

@section('Biblioteca', 'Mostrar Libros')

@section('contenido')

<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Producto</th>
                            <th scope="col" class="px-4 py-3">Categoría</th>
                            <th scope="col" class="px-4 py-3 text-center">Stock</th>
                            <th scope="col" class="px-4 py-3">Costo</th>
                            <th scope="col" class="px-4 py-3 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $libro)
                        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <th scope="row" class="flex items-center px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img src="{{ asset('img/libros/'.$libro->imagen_url) }}" 
                                     alt="Cover" class="w-auto h-10 mr-3 object-cover rounded shadow-sm">
                                {{ $libro->titulo }}
                            </th>
                            <td class="px-4 py-2">
                                <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                    {{ $libro->categoria ?? 'General' }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <div class="flex items-center justify-center">
                                    <div class="w-3 h-3 mr-2 {{ $libro->stock > 5 ? 'bg-green-500' : 'bg-red-600' }} rounded-full"></div>
                                    {{ $libro->stock ?? '0' }}
                                </div>
                            </td>
                            <td class="px-4 py-2 font-bold">${{ number_format($libro->costo ?? 0, 2) }}</td>
                            
                            <td class="px-4 py-2">
                                <div class="flex items-center justify-center space-x-2">
                            
                                    <a href="/productos/{{ $libro->id }}/ver" class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg dark:text-blue-500 dark:hover:bg-gray-600" title="Ver Detalles">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                
                                    <a href="/productos/{{ $libro->id }}/editar" class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-lg dark:text-yellow-500 dark:hover:bg-gray-600" title="Editar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>

                            
                                    <form action="/productos/{{ $libro->id }}/eliminar" method="POST" onsubmit="return confirm('¿Eliminar este producto?')">
                                        @csrf
                                        <button type="submit" class="p-2 text-red-600 hover:bg-red-100 rounded-lg dark:text-red-500 dark:hover:bg-gray-600" title="Eliminar">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
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