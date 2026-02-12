@extends('/layouts/app')

@section('Biblioteca', 'Perfil del Administrador')

@section('contenido')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <div class="flex items-center space-x-4 mb-6">
            
            <img src="{{ asset('img/admins/'.$administrador->foto) }}" class="h-24 w-24 rounded-lg object-cover border-2 border-primary-600 shadow-sm">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $administrador->nombre }} {{ $administrador->apellido_paterno }}
                </h2>
                <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                    {{ $administrador->rol }}
                </span>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 border-t border-gray-200 dark:border-gray-700 pt-6">
            <div class="sm:col-span-1">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Apellido Materno</p>
                <p class="text-base text-gray-900 dark:text-white">{{ $administrador->apellido_materno ?? 'N/A' }}</p>
            </div>
            <div class="sm:col-span-1">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Estado de Cuenta</p>
                <p class="text-base {{ $administrador->estado == 'activo' ? 'text-green-600' : 'text-red-600' }} font-bold">
                    {{ ucfirst($administrador->estado) }}
                </p>
            </div>
            <div class="sm:col-span-2">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Notas Adicionales</p>
                <div class="mt-1 p-3 bg-gray-50 dark:bg-gray-800 rounded-lg text-gray-700 dark:text-gray-300 italic">
                    "{{ $administrador->notas ?? 'Sin observaciones' }}"
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center mt-8">
            <a href="/admins/listado" class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white">
                Volver al Listado
            </a>
            <a href="/admins/{{ $administrador->id }}/editar" class="text-white bg-primary-700 hover:bg-primary-800 font-medium rounded-lg text-sm px-5 py-2.5">
                Editar Datos
            </a>
        </div>
    </div>
</section>
@endsection