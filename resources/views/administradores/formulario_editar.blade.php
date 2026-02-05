@extends('/layouts/app')

@section('Biblioteca', 'Editar Administrador')
    
@section('contenido')
    
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Actualizar Administrador</h2>

      {{-- Formulario con tus campos y lógica de Productos --}}
      <form action="/admins/{{ $administrador->id }}/actualizar" method="POST" enctype="multipart/form-data">
            @csrf
          
          <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Información Personal</h3>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div class="sm:col-span-2">
                      <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre *</label>
                      <input type="text" name="nombre" id="nombre" value="{{ $administrador->nombre }}"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                  </div>
                  
                  <div class="w-full">
                      <label for="apellido_paterno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Paterno *</label>
                      <input type="text" name="apellido_paterno" id="apellido_paterno" value="{{ $administrador->apellido_paterno }}"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                  </div>
                  
                  <div class="w-full">
                      <label for="apellido_materno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Materno</label>
                      <input type="text" name="apellido_materno" id="apellido_materno" value="{{ $administrador->apellido_materno }}"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  </div>
              </div>
          </div>
          
          <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Configuración de Acceso</h3>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div class="w-full">
                      <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol del Sistema *</label>
                      <select id="rol" name="rol" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                          <option value="SuperAdmin" {{ $administrador->rol == 'SuperAdmin' ? 'selected' : '' }}>SuperAdmin</option>
                          <option value="Admin" {{ $administrador->rol == 'Admin' ? 'selected' : '' }}>Admin</option>
                          <option value="Editor" {{ $administrador->rol == 'Editor' ? 'selected' : '' }}>Editor</option>
                          <option value="Moderador" {{ $administrador->rol == 'Moderador' ? 'selected' : '' }}>Moderador</option>
                      </select>
                  </div>
                  
                  <div class="w-full">
                      <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado *</label>
                      <select id="estado" name="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                          <option value="activo" {{ $administrador->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                          <option value="inactivo" {{ $administrador->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                      </select>
                  </div>
              </div>
          </div>
          
          <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Archivos y Notas</h3>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div class="sm:col-span-2">
                      <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fotografía</label>
                      <div class="flex items-center space-x-4 mb-4">
                        <img id="portada-preview-img" src="{{ asset('img/admins/'.$administrador->foto) }}" class="h-24 w-24 rounded-lg object-cover border border-gray-300">
                        <p class="text-xs text-gray-500 dark:text-gray-400">Imagen actual en el sistema</p>
                      </div>
                      <input type="file" name="foto" id="foto" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400">
                  </div>
                  
                  <div class="sm:col-span-2">
                      <label for="notas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notas Adicionales</label>
                      <textarea id="notas" name="notas" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Notas o comentarios adicionales...">{{ $administrador->notas ?? '' }}</textarea>
                  </div>
              </div>
          </div>

          {{-- Botones de Acción Estilo Productos --}}
          <div class="flex justify-between items-center mt-8">
              <a href="/admins/listado" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                  Cancelar
              </a>
              <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                  <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                  </svg>
                  Guardar Cambios
              </button>
          </div>
      </form>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fotoInput = document.getElementById('foto');
    const previewImg = document.getElementById('portada-preview-img');
    
    fotoInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const reader = new FileReader();
            reader.onload = function(e) { previewImg.src = e.target.result; }
            reader.readAsDataURL(e.target.files[0]);
        }
    });
});
</script>

@endsection