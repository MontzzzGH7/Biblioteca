@extends('/layouts/app')

@section('Biblioteca', 'mostrar administradores')

@section('contenido')

    <section class="bg-white dark:bg-gray-900">
        
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
            
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Administrador</h2>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Listado de Administradores</p>
            </div>
            <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
                
                {{-- INICIO DEL FOREACH --}}
                @foreach ($administradores as $admin)
                <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">

                        <img class="w-full rounded-lg sm:rounded-none sm:rounded-l-lg"
                            src="{{$admin->foto}}"
                            alt="{{$admin->nombre}}">
                    </a>
                    <div class="p-5">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">{{$admin->nombre}} {{$admin->apellido_paterno}}</a>
                        </h3>
                        <span class="text-gray-500 dark:text-gray-400">{{$admin->rol}}</span>
                        <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Turno: {{$admin->turno ?? 'No asignado'}}</p>
                        <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Estado: {{$admin->estado}}</p>

                        <ul class="flex space-x-4 sm:mt-0">
                            <li>
                                <a href="/admins/{{$admin->id}}/editar" class="text-gray-500 hover:text-gray-900 dark:hover:text-white"> Editar
                                    {{--<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>--}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
                {{-- FIN DEL FOREACH --}}

                <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="w-full rounded-lg sm:rounded-none sm:rounded-l-lg"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                            alt="Jese Avatar">
                    </a>
                    <div class="p-5">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Jese Leos</a>
                        </h3>
                        <span class="text-gray-500 dark:text-gray-400">CTO</span>
                        <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Jese drives the technical strategy of the flowbite platform and brand.</p>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection