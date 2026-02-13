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
                      <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Ingrese el título del libro" required>
                  </div>
                  
                  <div class="sm:col-span-2">
                      <label for="autor_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Autor *</label>
                      <select id="autor_id" name="autor_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                          <option value="" selected disabled>Seleccionar autor</option>
                          <option value="1" {{ old('autor_id') == '1' ? 'selected' : '' }}>Autor 1</option>
                          <option value="2" {{ old('autor_id') == '2' ? 'selected' : '' }}>Autor 2</option>
                          <option value="3" {{ old('autor_id') == '3' ? 'selected' : '' }}>Autor 3</option>
                      </select>
                      <p class="mt-1 text-xs text-gray-500">Si el autor no está en la lista, agréguelo primero.</p>
                  </div>
                  
                  <div class="sm:col-span-2">
                      <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                      <textarea id="descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Descripción del libro...">{{ old('descripcion') }}</textarea>
                  </div>
              </div>
          </div>
          
          <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Datos Técnicos</h3>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div class="w-full">
                      <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                      <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white" placeholder="978-XXX-XXXXX">
                  </div>
                  
                  <div class="w-full">
                      <label for="edicion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edición</label>
                      <input type="text" name="edicion" id="edicion" value="{{ old('edicion') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white" placeholder="Ej: 1ra">
                  </div>
                  
                  <div class="w-full">
                      <label for="fecha_publi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de Publicación</label>
                      <input type="date" name="fecha_publi" id="fecha_publi" value="{{ old('fecha_publi') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
                  </div>
                  
                  <div class="w-full">
                      <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                      <select id="estado" name="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white" required>
                          <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                          <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                          <option value="2" {{ old('estado') == '2' ? 'selected' : '' }}>Agotado</option>
                      </select>
                  </div>
              </div>
          </div>
          
          <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Clasificación</h3>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div class="w-full">
                      <label for="formato_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Formato *</label>
                      <select id="formato_id" name="formato_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white" required>
                          <option value="" selected disabled>Seleccionar</option>
                          <option value="1" {{ old('formato_id') == '1' ? 'selected' : '' }}>Tapa blanda</option>
                          <option value="2" {{ old('formato_id') == '2' ? 'selected' : '' }}>Tapa dura</option>
                          <option value="3" {{ old('formato_id') == '3' ? 'selected' : '' }}>Digital</option>
                      </select>
                  </div>
                  
                  <div class="w-full">
                      <label for="idioma_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Idioma *</label>
                      <select id="idioma_id" name="idioma_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white" required>
                          <option value="" selected disabled>Seleccionar</option>
                          <option value="1" {{ old('idioma_id') == '1' ? 'selected' : '' }}>Español</option>
                          <option value="2" {{ old('idioma_id') == '2' ? 'selected' : '' }}>Inglés</option>
                      </select>
                  </div>
                  
                  <div class="w-full">
                      <label for="genero_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Género *</label>
                      <select id="genero_id" name="genero_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white" required>
                          <option value="" selected disabled>Seleccionar</option>
                          <option value="1" {{ old('genero_id') == '1' ? 'selected' : '' }}>Terror</option>
                          <option value="2" {{ old('genero_id') == '2' ? 'selected' : '' }}>Ficción</option>
                      </select>
                  </div>
                  
                  <div class="w-full">
                      <label for="editorial_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Editorial *</label>
                      <select id="editorial_id" name="editorial_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white" required>
                          <option value="" selected disabled>Seleccionar</option>
                          <option value="1" {{ old('editorial_id') == '1' ? 'selected' : '' }}>Editorial 1</option>
                      </select>
                  </div>
              </div>
          </div>
          
          <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Imágenes</h3>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div>
                      <label for="portada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Portada *</label>
                      <input type="file" name="portada" id="portada" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 dark:text-white" required>
                      <div id="portada-preview" class="mt-2 hidden">
                          <img id="portada-preview-img" class="h-32 w-auto rounded-lg border">
                      </div>
                  </div>
                  
                  <div>
                      <label for="contraportada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraportada</label>
                      <input type="file" name="contraportada" id="contraportada" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 dark:text-white">
                      <div id="contraportada-preview" class="mt-2 hidden">
                          <img id="contraportada-preview-img" class="h-32 w-auto rounded-lg border">
                      </div>
                  </div>
              </div>
          </div>
          
          <div class="flex justify-between items-center mt-8">
              <a href="{{ url('/productos/listado') }}" class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600">
                  Cancelar
              </a>
              <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                  <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                  Guardar Libro
              </button>
          </div>
      </form>
  </div>
</section>

<script>
// El script de previsualización se mantiene igual, ya está correcto.
document.addEventListener('DOMContentLoaded', function() {
    function setupPreview(inputId, previewId, imgId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const img = document.getElementById(imgId);

        input.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    }

    setupPreview('portada', 'portada-preview', 'portada-preview-img');
    setupPreview('contraportada', 'contraportada-preview', 'contraportada-preview-img');
});
</script>
@endsection