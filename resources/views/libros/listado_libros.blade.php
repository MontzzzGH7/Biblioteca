@extends('layouts.app')

@section('Biblioteca', 'Mostrar Libros')

@section('contenido')

<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Libro</th>
                            <th scope="col" class="px-4 py-3">ISBN / Editorial</th>
                            <th scope="col" class="px-4 py-3 text-center">Estado</th>
                            <th scope="col" class="px-4 py-3">Fecha Pub.</th>
                            <th scope="col" class="px-4 py-3 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $libro)
                        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <th scope="row" class="flex items-center px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{-- Imagen con fallback por si no tiene portada --}}
                                <img src="{{ $libro->portada ? asset('img/libros/'.$libro->portada) : asset('img/no-cover.png') }}" 
                                     alt="Cover" class="w-10 h-14 mr-3 object-cover rounded shadow-sm border border-gray-200">
                                <div class="flex flex-col">
                                    <span class="text-base font-bold">{{ $libro->titulo }}</span>
                                    <span class="text-xs text-gray-500 font-normal">ID Autor: {{ $libro->autor_id }}</span>
                                </div>
                            </th>
                            <td class="px-4 py-2">
                                <div class="flex flex-col">
                                    <span class="font-medium text-gray-900 dark:text-white">{{ $libro->isbn ?? 'Sin ISBN' }}</span>
                                    <span class="text-xs text-gray-500">Editorial ID: {{ $libro->editorial_id }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-2 text-center">
                                @if($libro->estado == 1)
                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300 italic">Activo</span>
                                @elseif($libro->estado == 2)
                                    <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300 italic">Agotado</span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 italic">Inactivo</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                {{ $libro->fecha_publi ? date('d/m/Y', strtotime($libro->fecha_publi)) : 'N/A' }}
                            </td>
                            
                            <td class="px-4 py-2">
                                <div class="flex items-center justify-center space-x-2">
                                    {{-- Ver --}}
                                    <a href="{{ url('/productos/'.$libro->id.'/ver') }}" class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg dark:text-blue-500 dark:hover:bg-gray-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                    {{-- Editar --}}
                                    <a href="{{ url('/productos/'.$libro->id.'/editar') }}" class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-lg dark:text-yellow-500 dark:hover:bg-gray-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>

                                    {{-- Eliminar --}}
                                    <form action="{{ url('/productos/'.$libro->id.'/eliminar') }}" method="POST" onsubmit="return confirm('¿Eliminar este libro definitivamente?')">
                                        @csrf
                                        @method('DELETE') {{-- Es buena práctica usar DELETE en formularios de eliminación --}}
                                        <button type="submit" class="p-2 text-red-600 hover:bg-red-100 rounded-lg dark:text-red-500 dark:hover:bg-gray-600">
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