@extends('/layouts/app')

@section('Biblioteca', 'Editar cliente')

@section('contenido')

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Actualizar Datos del Cliente</h2>
            
           <form action="/clientes/{{ $cliente->id }}/actualizar" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre *</label>
                        <input type="text" name="nombre" id="nombre" value="{{ $cliente->nombre }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nombre del cliente" required>
                    </div>

                    <div class="w-full">
                        <label for="apellido_paterno"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Paterno *</label>
                        <input type="text" name="apellido_paterno" id="apellido_paterno" value="{{ $cliente->apellido_paterno }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Apellido paterno" required>
                    </div>

                    <div class="w-full">
                        <label for="apellido_materno"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Materno</label>
                        <input type="text" name="apellido_materno" id="apellido_materno" value="{{ $cliente->apellido_materno }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Apellido materno">
                    </div>

                    <div class="w-full">
                        <label for="usuario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario *</label>
                        <input type="text" name="usuario" id="usuario" value="{{ $cliente->usuario }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nombre de usuario" required>
                    </div>

                    <div class="w-full">
                        <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electrónico *</label>
                        <input type="email" name="correo" id="correo" value="{{ $cliente->correo }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="cliente@ejemplo.com" required>
                    </div>

                    <div class="w-full">
                        <label for="telefono"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                        <input type="tel" name="telefono" id="telefono" value="{{ $cliente->telefono }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="+52 123 456 7890">
                    </div>

                    <div class="w-full">
                        <label for="contraseña"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nueva Contraseña (Opcional)</label>
                        <input type="password" name="contraseña" id="contraseña"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Dejar vacío para mantener la actual">
                    </div>

                    <div class="w-full">
                        <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado *</label>
                        <select id="estado" name="estado"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                            <option value="1" {{ $cliente->estado == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ $cliente->estado == 0 ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="foto"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actualizar Fotografía</label>
                        
                        {{-- Mostramos la foto que ya tiene --}}
                        <div class="flex items-center gap-4 mb-4">
                            <img src="{{ asset('img/clientes/'.$cliente->foto) }}" class="h-20 w-20 rounded-full border border-gray-300 object-cover" alt="Foto actual">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Foto actual cargada</p>
                        </div>

                        <input type="file" name="foto" id="foto" accept="image/*"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">PNG, JPG o WEBP (Sustituirá a la actual)</p>
                        
                        <div id="foto-preview" class="mt-2 hidden">
                            <img id="foto-preview-img" class="h-32 w-auto rounded-lg border border-gray-300">
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-4 mt-6">
                    <button type="submit"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Guardar Cambios
                    </button>
                    <a href="/clientes/listado" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fotoInput = document.getElementById('foto');
            const fotoPreview = document.getElementById('foto-preview');
            const fotoPreviewImg = document.getElementById('foto-preview-img');

            if (fotoInput && fotoPreview && fotoPreviewImg) {
                fotoInput.addEventListener('change', function(e) {
                    if (e.target.files.length > 0) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            fotoPreviewImg.src = e.target.result;
                            fotoPreview.classList.remove('hidden');
                        }
                        reader.readAsDataURL(e.target.files[0]);
                    }
                });
            }
        });
    </script>

@endsection