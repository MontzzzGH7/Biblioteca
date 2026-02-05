@extends('/layouts/app')

@section('Biblioteca', 'Mostrar Administradores')

@section('contenido')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Administradores</h2>
            <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Gestión de personal del sistema</p>
        </div>

        <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
            @foreach ($administradores as $admin)
            <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                <a href="/admins/{{$admin->id}}/ver" class="w-full sm:w-48 h-48 flex-shrink-0">
                    <img class="w-full h-full rounded-lg sm:rounded-none sm:rounded-l-lg object-cover"
                         src="{{ asset('img/admins/'.$admin->foto) }}"
                         alt="{{$admin->nombre}}">
                </a>
                <div class="p-5 w-full">
                    <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="/admins/{{$admin->id}}/ver">{{$admin->nombre}} {{$admin->apellido_paterno}}</a>
                    </h3>
                    <span class="text-primary-600 dark:text-primary-500 font-medium">{{$admin->rol}}</span>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Estado: 
                        <span class="{{ $admin->estado == 'activo' ? 'text-green-600' : 'text-red-600' }} font-semibold">
                            {{ ucfirst($admin->estado) }}
                        </span>
                    </p>

                    <div class="flex items-center space-x-4 mt-4 border-t pt-4 dark:border-gray-700">
        
                        <a href="/admins/{{$admin->id}}/ver" class="text-blue-600 dark:text-blue-500 hover:underline inline-flex items-center text-sm font-medium">
                            Ver Perfil
                        </a>

                        <a href="/admins/{{$admin->id}}/editar" class="text-blue-600 dark:text-blue-500 hover:underline inline-flex items-center text-sm font-medium">
                            Editar
                        </a>

                        <form action="/admins/{{$admin->id}}/eliminar" method="POST" onsubmit="return confirm('¿Eliminar permanentemente a este administrador?')">
                            @csrf
                            <button type="submit" class="text-red-600 dark:text-red-500 hover:underline inline-flex items-center text-sm font-medium">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection