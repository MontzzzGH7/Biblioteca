@extends('/layouts/app')

@section('Biblioteca','crear administradores')
    
@section('contenido')
    
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Registrar Nuevo Administrador</h2>
      <form action="/admins/registro" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <!-- Nombre -->
              <div class="w-full">
                  <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre *</label>
                  <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nombre del cliente" required>
              </div>
              
              <!-- Apellido Paterno -->
              <div class="w-full">
                  <label for="apellido_paterno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Paterno *</label>
                  <input type="text" name="apellido_paterno" id="apellido_paterno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Apellido paterno" required>
              </div>
              
              <!-- Apellido Materno -->
              <div class="w-full">
                  <label for="apellido_materno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Materno</label>
                  <input type="text" name="apellido_materno" id="apellido_materno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Apellido materno">
              </div>
              
              <!-- Puesto -->
              <div class="w-full">
                  <label for="puesto_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Puesto *</label>
                  <select id="puesto_id" name="puesto_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                      <option value="" selected disabled>Seleccionar puesto</option>
                      <option value="1">Gerente</option>
                      <option value="2">Vendedor</option>
                      <option value="3">Cajero</option>
                      <option value="4">Almacenista</option>
                      <option value="5">Administrativo</option>
                  </select>
              </div>
              
              <!-- Turno -->
              <div class="w-full">
                  <label for="turno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Turno *</label>
                  <select id="turno" name="turno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                      <option value="" selected disabled>Seleccionar turno</option>
                      <option value="matutino">Matutino</option>
                      <option value="vespertino">Vespertino</option>
                      <option value="nocturno">Nocturno</option>
                      <option value="mixto">Mixto</option>
                  </select>
              </div>
              
              <!-- Foto -->
              <div class="sm:col-span-2">
                  <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fotografía</label>
                  <input type="file" name="foto" id="foto" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                  <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">PNG, JPG o WEBP (MAX. 2MB)</p>
                  <!-- Preview opcional -->
                  <div id="foto-preview" class="mt-2 hidden">
                      <img id="foto-preview-img" class="h-32 w-auto rounded-lg border border-gray-300">
                  </div>
              </div>
              
              <!-- Espacio para futuros campos -->
              <div class="sm:col-span-2">
                  <label for="notas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notas Adicionales</label>
                  <textarea id="notas" name="notas" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Notas o comentarios adicionales..."></textarea>
              </div>
          </div>
          
          <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
              Registrar Administrador
          </button>
      </form>
  </div>
</section>

@endsection