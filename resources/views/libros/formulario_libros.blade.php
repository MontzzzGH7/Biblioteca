@extends('layouts.app')

@section('Biblioteca', 'Crear Libros')

@section('contenido')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Agregar Nuevo Libro</h2>

            <form action="{{ url('/productos/registro') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Información Básica</h3>
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título del Libro *</label>
                            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                placeholder="Ingrese el título del libro" required>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="autor_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Autor *</label>
                            <select id="autor_id" name="autor_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                required>
                                <option value="" selected disabled>Seleccionar autor</option>
                                <option value="1" {{ old('autor_id') == '1' ? 'selected' : '' }}>Autor 1</option>
                                <option value="2" {{ old('autor_id') == '2' ? 'selected' : '' }}>Autor 2</option>
                                <option value="3" {{ old('autor_id') == '3' ? 'selected' : '' }}>Autor 3</option>
                            </select>
                            <p class="mt-1 text-xs text-gray-500">Si el autor no está en la lista, agréguelo primero.</p>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                            <textarea id="descripcion" name="descripcion" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                placeholder="Descripción del libro...">{{ old('descripcion') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Datos Técnicos</h3>
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="w-full">
                            <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                            <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white"
                                placeholder="978-XXX-XXXXX">
                        </div>

                        <div class="w-full">
                            <label for="edicion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edición</label>
                            <input type="text" name="edicion" id="edicion" value="{{ old('edicion') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white"
                                placeholder="Ej: 1ra">
                        </div>

                        <div class="w-full">
                            <label for="fecha_publi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de Publicación</label>
                            <input type="date" name="fecha_publi" id="fecha_publi" value="{{ old('fecha_publi') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div class="w-full">
                            <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                            <select id="estado" name="estado"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white"
                                required>
                                <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                                <option value="3" {{ old('estado') == '3' ? 'selected' : '' }}>Inactivo</option>
                                <option value="2" {{ old('estado') == '2' ? 'selected' : '' }}>Agotado</option>
                                <option value="4" {{ old('estado') == '4' ? 'selected' : '' }}>Próximo Lanzamiento</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Imágenes</h3>
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        {{-- Portada --}}
                        <div>
                            <label for="portada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Portada *</label>
                            <input type="file" name="portada" id="portada" accept="image/*"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 dark:text-white"
                                required>
                            <div id="portada-preview" class="mt-2 hidden">
                                <img id="portada-preview-img" src="#" alt="Preview Portada"
                                    class="w-20 h-28 object-cover rounded shadow-sm border border-gray-200">
                            </div>
                        </div>

                        {{-- Contraportada --}}
                        <div>
                            <label for="contraportada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraportada</label>
                            <input type="file" name="contraportada" id="contraportada" accept="image/*"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 dark:text-white">
                            <div id="contraportada-preview" class="mt-2 hidden">
                                <img id="contraportada-preview-img" src="#" alt="Preview Contraportada"
                                    class="w-20 h-28 object-cover rounded shadow-sm border border-gray-200">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center mt-8">
                    <a href="{{ url('/productos/listado') }}"
                        class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                        Guardar Libro
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function setupPreview(inputId, previewContainerId, imgElementId) {
                const input = document.getElementById(inputId);
                const previewContainer = document.getElementById(previewContainerId);
                const imgElement = document.getElementById(imgElementId);

                if (input) {
                    input.addEventListener('change', function(e) {
                        if (e.target.files && e.target.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                imgElement.src = e.target.result;
                                previewContainer.classList.remove('hidden');
                            }
                            reader.readAsDataURL(e.target.files[0]);
                        }
                    });
                }
            }

            setupPreview('portada', 'portada-preview', 'portada-preview-img');
            setupPreview('contraportada', 'contraportada-preview', 'contraportada-preview-img');
        });
    </script>
@endsection