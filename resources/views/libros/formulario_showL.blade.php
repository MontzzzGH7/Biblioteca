@extends('/layouts/app')

@section('Biblioteca', 'Detalles del Producto')

@section('contenido')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <div class="flex flex-col md:flex-row items-center gap-8 mb-8 pb-6 border-b dark:border-gray-700">
            <div class="w-48 h-64 flex-shrink-0">
                <img src="{{ asset('img/productos/'.$producto->foto) }}" 
                     class="w-full h-full rounded-lg object-cover shadow-2xl border dark:border-gray-700" 
                     alt="{{ $producto->nombre }}">
            </div>
            
            <div class="flex-1 text-center md:text-left">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-2">{{ $producto->nombre }}</h2>
                <p class="text-xl text-primary-600 font-bold mb-4">${{ number_format($producto->precio, 2) }}</p>
                <span class="{{ $producto->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} text-sm font-medium px-3 py-1 rounded-full">
                    Stock: {{ $producto->stock }} unidades
                </span>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label class="block text-sm font-semibold text-gray-500">Categoría</label>
                <p class="text-gray-900 dark:text-white font-medium italic">{{ $producto->categoria ?? 'General' }}</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-500">Estado</label>
                <p class="font-bold {{ $producto->estado == 1 ? 'text-green-600' : 'text-red-600' }}">
                    {{ $producto->estado == 1 ? 'Disponible' : 'No disponible' }}
                </p>
            </div>
            <div class="sm:col-span-2 mt-4">
                <label class="block text-sm font-semibold text-gray-500 mb-1">Descripción</label>
                <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border dark:border-gray-700 text-gray-700 dark:text-gray-300">
                    {{ $producto->descripcion ?? 'Sin descripción disponible.' }}
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center mt-10">
            <a href="/productos/listado" class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white">
                Volver al Listado
            </a>
            <div class="flex space-x-3">
                <a href="/productos/{{ $producto->id }}/editar" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5">
                    Editar Producto
                </a>
            </div>
        </div>
    </div>
</section>
@endsection