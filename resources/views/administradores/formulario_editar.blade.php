@extends('/layouts/app')

@section('Biblioteca', 'Editar Administrador')
    
@section('contenido')
    
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Actualizar Administrador</h2>

      <form action="/admins/{{ $administrador->id }}/actualizar" method="POST" enctype="multipart/form-data">
            @csrf
          
          {{-- Información Personal --}}
          <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Información Personal</h3>
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
          
          {{-- Configuración de Acceso --}}
          <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Configuración de Acceso</h3>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div class="w-full">
                      <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol del Sistema *</label>
                      <select id="rol" name="rol" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                          <option value="SuperAdmin" {{ $administrador->rol == 'SuperAdmin' ? 'selected' : '' }}>SuperAdmin</option>
                          <option value="Admin" {{ $administrador->rol == 'Admin' ? 'selected' : '' }}>Admin</option>
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
          
          {{-- Fotografía de Perfil (RENOVADA) --}}
          <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2">Fotografía y Notas</h3>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 pt-2">
                  <div class="sm:col-span-2">
                      <label class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Imagen de Perfil</label>
                      
                      <div class="flex flex-col items-center justify-center p-6 border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 bg-gray-50 dark:bg-gray-800">
                          {{-- Imagen Única --}}
                          <div class="relative mb-4">
                              <img id="main-preview" 
                                   src="{{ asset('storage/img/admins/'.$administrador->foto) }}" 
                                   class="h-32 w-32 rounded-full object-cover border-4 border-blue-500 shadow-lg"
                                   onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($administrador->nombre) }}&background=0D8ABC&color=fff'">
                              
                              <span id="status-badge" class="absolute bottom-0 right-0 bg-gray-500 text-white text-[10px] px-2 py-0.5 rounded-full uppercase font-bold">Actual</span>
                          </div>

                          <div class="text-center">
                              <label for="foto" class="cursor-pointer inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-300 dark:hover:bg-blue-800">
                                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                  Seleccionar nueva imagen
                              </label>
                              <input type="file" name="foto" id="foto" accept="image/*" class="hidden">
                              <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">PNG, JPG o WEBP</p>
                          </div>
                      </div>
                  </div>
                  
                  <div class="sm:col-span-2">
                      <label for="notas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notas Adicionales</label>
                      <textarea id="notas" name="notas" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Notas o comentarios adicionales...">{{ $administrador->notas ?? '' }}</textarea>
                  </div>
              </div>
          </div>

          <div class="flex justify-between items-center mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
              <a href="/admins/listado" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
                  Cancelar
              </a>
              <button type="submit" class="inline-flex items-center px-6 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
                  Guardar Cambios
              </button>
          </div>
      </form>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fotoInput = document.getElementById('foto');
    const mainPreview = document.getElementById('main-preview');
    const statusBadge = document.getElementById('status-badge');
    
    fotoInput.addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) { 
                mainPreview.src = e.target.result; 
                // Feedback visual de cambio
                mainPreview.classList.replace('border-blue-500', 'border-green-500');
                statusBadge.innerText = "Nueva";
                statusBadge.classList.replace('bg-gray-500', 'bg-green-600');
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    });
});
</script>

@endsection