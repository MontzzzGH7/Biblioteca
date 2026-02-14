@extends('/layouts/app')

@section('title', 'Crear Administradores')

@section('contenido')

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Registrar Nuevo Administrador</h2>
        <form action="/admins/registro" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre *</label>
                    <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Nombre completo" required>
                </div>

                <div class="w-full">
                    <label for="usuario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de Usuario *</label>
                    <input type="text" name="usuario" id="usuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Ej: tony.soprano" required>
                </div>

                <div class="w-full">
                    <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electrónico *</label>
                    <input type="email" name="correo" id="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="ejemplo@correo.com" required>
                </div>

                <div class="w-full">
                    <label for="contraseña" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña *</label>
                    <input type="password" name="contraseña" id="contraseña" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="••••••••" required>
                </div>

                <div class="w-full">
                    <label for="apellido_paterno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Paterno *</label>
                    <input type="text" name="apellido_paterno" id="apellido_paterno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Apellido paterno" required>
                </div>

                <div class="w-full">
                    <label for="apellido_materno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Materno</label>
                    <input type="text" name="apellido_materno" id="apellido_materno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Apellido materno">
                </div>

                <div class="w-full">
                    <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol de Administrador *</label>
                    <select id="rol" name="rol" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        <option value="" selected disabled>Seleccionar rol</option>
                        <option value="SuperAdmin">SuperAdmin</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <div class="sm:col-span-2">
                    <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fotografía</label>
                    <input type="file" name="foto" id="foto" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">PNG, JPG o WEBP (MAX. 2MB)</p>
                </div>
            </div>

            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-700 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                Registrar Administrador
            </button>
        </form>
    </div>
</section>

@endsection