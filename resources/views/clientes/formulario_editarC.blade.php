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
                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                            *</label>
                        <input type="text" name="nombre" id="nombre" value="{{ $cliente->nombre }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Nombre del cliente" required>
                    </div>

                    <div class="w-full">
                        <label for="apellido_paterno"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Paterno *</label>
                        <input type="text" name="apellido_paterno" id="apellido_paterno"
                            value="{{ $cliente->apellido_paterno }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            placeholder="Apellido paterno" required>
                    </div>

                    <div class="w-full">
                        <label for="apellido_materno"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Materno</label>
                        <input type="text" name="apellido_materno" id="apellido_materno"
                            value="{{ $cliente->apellido_materno }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            placeholder="Apellido materno">
                    </div>

                    <div class="w-full">
                        <label for="usuario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario
                            *</label>
                        <input type="text" name="usuario" id="usuario" value="{{ $cliente->usuario }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            placeholder="Nombre de usuario" required>
                    </div>

                    <div class="w-full">
                        <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                            Electrónico *</label>
                        <input type="email" name="correo" id="correo" value="{{ $cliente->correo }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            placeholder="cliente@ejemplo.com" required>
                    </div>

                    <div class="w-full">
                        <label for="telefono"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                        <input type="tel" name="telefono" id="telefono" value="{{ $cliente->telefono }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            placeholder="+52 123 456 7890">
                    </div>

                    <div class="w-full">
                        <label for="contraseña" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nueva
                            Contraseña (Opcional)</label>
                        <input type="password" name="contraseña" id="contraseña"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            placeholder="Dejar vacío para mantener la actual">
                    </div>

                    <div class="w-full">
                        <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado
                            *</label>
                        <select id="estado" name="estado"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            required>
                            <option value="1" {{ $cliente->estado == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ $cliente->estado == 0 ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    {{-- SECCIÓN DE FOTOGRAFÍA RENOVADA --}}
                    <div class="sm:col-span-2 mt-4">
                        <label for="foto"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fotografía del
                            Cliente</label>

                        <div
                            class="flex items-center gap-6 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                            {{-- Contenedor de Imagen Única --}}
                            <div class="relative">
                                <img id="cliente-preview-img" src="{{ asset('/storage/img/clientes/' . $cliente->foto) }}"
                                    class="h-24 w-24 rounded-full border-4 border-blue-600 object-cover shadow-sm"
                                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($cliente->nombre) }}&background=random'"
                                    alt="Foto del cliente">
                                <span id="badge-status"
                                    class="absolute -top-2 -right-2 bg-gray-500 text-white text-[10px] px-2 py-0.5 rounded uppercase font-bold">Actual</span>
                            </div>

                            <div class="flex-1">
                                <input type="file" name="foto" id="foto-input" accept="image/*"
                                    class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600">
                                <p id="label-ayuda" class="mt-2 text-[11px] text-gray-500 dark:text-gray-400 italic">Haz
                                    clic para reemplazar la imagen actual</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Guardar Cambios
                    </button>
                    <a href="/clientes/listado"
                        class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </section>

    {{-- SCRIPT DE PREVISUALIZACIÓN MEJORADO --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fotoInput = document.getElementById('foto-input');
            const previewImg = document.getElementById('cliente-preview-img');
            const badgeStatus = document.getElementById('badge-status');
            const labelAyuda = document.getElementById('label-ayuda');

            fotoInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        // Cambia la fuente de la imagen actual por la nueva
                        previewImg.src = e.target.result;

                        // Actualiza el estilo para confirmar el cambio
                        previewImg.classList.replace('border-blue-600', 'border-green-500');
                        badgeStatus.innerText = "Nueva";
                        badgeStatus.classList.replace('bg-gray-500', 'bg-green-600');
                        labelAyuda.innerText = "¡Imagen nueva lista para subir!";
                        labelAyuda.classList.replace('text-gray-500', 'text-green-500');
                    }

                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        });
    </script>

@endsection
