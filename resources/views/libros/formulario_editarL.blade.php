@extends('/layouts/app')

@section('Biblioteca','crear libros')
    
@section('contenido')
    
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Editar Libro</h2>
      <form action="/productos/{{ $producto->id }}/actualizar" method="POST" enctype="multipart/form-data">
            @csrf
          <!-- Sección 1: Información Básica -->
          <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Información Básica</h3>
              
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div class="sm:col-span-2">
                      <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título del Libro *</label>
                      <input type="text" name="titulo" id="titulo" value="{{ $producto->titulo }}"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ingrese el título del libro" required>
                  </div>
                  
                  <div class="sm:col-span-2">
                      <label for="autor_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Autor *</label>
                      <select id="autor_id" name="autor_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                          <option value="" selected disabled>Seleccionar autor</option>
                          <option value="1" {{ $producto->autor_id == 1 ? 'selected' : '' }}>Autor 1</option>
                          <option value="2" {{ $producto->autor_id == 2 ? 'selected' : '' }}>Autor 2</option>
                          <option value="3" {{ $producto->autor_id == 3 ? 'selected' : '' }}>Autor 3</option>
                      </select>
                      <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Si el autor no está en la lista, agregarlo primero en la sección de autores</p>
                  </div>
                  
                  <div class="sm:col-span-2">
                      <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                      <textarea id="descripcion" name="descripcion" rows="4" value="{{ $producto->descripcion }}"
                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Descripción del libro...">{{ $producto->descripcion }}</textarea>
                  </div>
              </div>
          </div>
          
          <!-- Sección 2: Datos Técnicos -->
          <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Datos Técnicos</h3>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div class="w-full">
                      <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                      <input type="text" name="isbn" id="isbn" value="{{ $producto->isbn }}"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="978-XXX-XXXXX-XX-X">
                      <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Formato: 978-3-16-148410-0</p>
                  </div>
                  
                  <div class="w-full">
                      <label for="edicion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edición</label>
                      <input type="text" name="edicion" id="edicion" value="{{ $producto->edicion }}"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ej: 1ra, 2da, etc.">
                  </div>
                  
                  <div class="w-full">
                      <label for="fecha_publi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de Publicación</label>
                      <input type="date" name="fecha_publi" id="fecha_publi" value="{{ $producto->fecha_publi }}"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  </div>
                  
                  <div class="w-full">
                      <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                      <select id="estado" name="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                          <option value="1" {{ $producto->estado == 1 ? 'selected' : '' }}>Activo</option>
                          <option value="0" {{ $producto->estado == 0 ? 'selected' : '' }}>Inactivo</option>
                          <option value="2" {{ $producto->estado == 2 ? 'selected' : '' }}>Agotado</option>
                          <option value="3" {{ $producto->estado == 3 ? 'selected' : '' }}>Próximo lanzamiento</option>
                      </select>
                  </div>
              </div>
          </div>
          
          <!-- Sección 3: Clasificación -->
          <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Clasificación</h3>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div class="w-full">
                      <label for="formato_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Formato *</label>
                      <select id="formato_id" name="formato_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                          <option value="" selected disabled>Seleccionar formato</option>
                          <option value="1" {{ $producto->formato_id == 1 ? 'selected' : '' }}>Tapa blanda</option>
                          <option value="2" {{ $producto->formato_id == 2 ? 'selected' : '' }}>Tapa dura</option>
                          <option value="3" {{ $producto->formato_id == 3 ? 'selected' : '' }}>Digital (eBook)</option>
                          <option value="4" {{ $producto->formato_id == 4 ? 'selected' : '' }}>Audiolibro</option>
                      </select>
                  </div>
                  
                  <div class="w-full">
                      <label for="idioma_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Idioma *</label>
                      <select id="idioma_id" name="idioma_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                          <option value="" selected disabled>Seleccionar idioma</option>
                          <option value="1" {{ $producto->idioma_id == 1 ? 'selected' : '' }}>Español</option>
                          <option value="2" {{ $producto->idioma_id == 2 ? 'selected' : '' }}>Inglés</option>
                          <option value="3" {{ $producto->idioma_id == 3 ? 'selected' : '' }}>Francés</option>
                          <option value="4" {{ $producto->idioma_id == 4 ? 'selected' : '' }}>Alemán</option>
                          <option value="5" {{ $producto->idioma_id == 5 ? 'selected' : '' }}>Portugués</option>
                      </select>
                  </div>
                  
                  <div class="w-full">
                      <label for="genero_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Género *</label>
                      <select id="genero_id" name="genero_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                          <option value="" selected disabled>Seleccionar género</option>
                          <option value="1" {{ $producto->genero_id == 1 ? 'selected' : '' }}>Terror</option>
                          <option value="2" {{ $producto->genero_id == 2 ? 'selected' : '' }}>Ficción</option>
                          <option value="3" {{ $producto->genero_id == 3 ? 'selected' : '' }}>No ficción</option>
                          <option value="4" {{ $producto->genero_id == 4 ? 'selected' : '' }}>Romance</option>
                          <option value="5" {{ $producto->genero_id == 5 ? 'selected' : '' }}>Ciencia ficción</option>
                          <option value="6" {{ $producto->genero_id == 6 ? 'selected' : '' }}>Fantasía</option>
                          <option value="7">Biografía</option>
                      </select>
                  </div>
                  
                  <div class="w-full">
                      <label for="editorial_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Editorial *</label>
                      <select id="editorial_id" name="editorial_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                          <option value="" selected disabled>Seleccionar editorial</option>
                          <option value="1" {{ $producto->editorial_id == 1 ? 'selected' : '' }}>Editorial 1</option>
                          <option value="2" {{ $producto->editorial_id == 2 ? 'selected' : '' }}>Editorial 2</option>
                          <option value="3" {{ $producto->editorial_id == 3 ? 'selected' : '' }}>Editorial 3</option>
                      </select>
                  </div>
              </div>
          </div>
          
          <!-- Sección 4: Archivos -->
          <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Imágenes</h3>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div>
                      <label for="portada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Portada *</label>
                      <input type="file" name="portada" id="portada" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" required>
                      <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">PNG, JPG o WEBP (MAX. 5MB)</p>
                      <div id="portada-preview" class="mt-2 hidden">
                          <img id="portada-preview-img" class="h-32 w-auto rounded-lg border border-gray-300">
                      </div>
                  </div>
                  
                  <div>
                      <label for="contraportada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraportada</label>
                      <input type="file" name="contraportada" id="contraportada" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                      <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Opcional - PNG, JPG o WEBP (MAX. 5MB)</p>
                      <div id="contraportada-preview" class="mt-2 hidden">
                          <img id="contraportada-preview-img" class="h-32 w-auto rounded-lg border border-gray-300">
                      </div>
                  </div>
              </div>
          </div>
          
          <div class="flex justify-between items-center mt-8">
              <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                  Cancelar
              </button>
              <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                  <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                  </svg>
                  Guardar Libro
              </button>
          </div>
      </form>
  </div>
</section>

<!-- Script para previsualización de imágenes -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Previsualización para portada
    const portadaInput = document.getElementById('portada');
    const portadaPreview = document.getElementById('portada-preview');
    const portadaPreviewImg = document.getElementById('portada-preview-img');
    
    portadaInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const reader = new FileReader();
            reader.onload = function(e) {
                portadaPreviewImg.src = e.target.result;
                portadaPreview.classList.remove('hidden');
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    });
    
    // Previsualización para contraportada
    const contraportadaInput = document.getElementById('contraportada');
    const contraportadaPreview = document.getElementById('contraportada-preview');
    const contraportadaPreviewImg = document.getElementById('contraportada-preview-img');
    
    contraportadaInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const reader = new FileReader();
            reader.onload = function(e) {
                contraportadaPreviewImg.src = e.target.result;
                contraportadaPreview.classList.remove('hidden');
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    });
});
</script>
@endsection