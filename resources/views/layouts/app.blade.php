<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - @yield('title', 'Panel de Control')</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .sidebar-active { @apply bg-blue-50 text-blue-600 dark:bg-gray-700 dark:text-white; }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <div class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 sm:hidden">
        <div class="flex items-center justify-between p-4">
            <span class="text-lg font-bold text-blue-600">Los Sopranos</span>
            <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
    </div>

    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidenav">
        <div class="h-full px-4 py-6 overflow-y-auto bg-white border-r border-gray-100 shadow-xl dark:bg-gray-800 dark:border-gray-700">
            
            <div class="flex items-center px-2 mb-10">
                <div class="flex items-center justify-center w-10 h-10 shadow-lg bg-gradient-to-tr from-blue-600 to-cyan-500 rounded-xl shadow-blue-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <span class="ml-3 text-xl font-bold tracking-tight text-gray-800 dark:text-white">Los Sopranos</span>
            </div>

            <ul class="space-y-1.5 font-medium">
                <li>
                    <a href="/Inicio" class="flex items-center p-3 text-gray-600 rounded-xl transition-all group hover:bg-blue-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-gray-700">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span class="ml-3">Inicio Dashboard</span>
                    </a>
                </li>

                <li>
                    <button type="button" class="flex items-center w-full p-3 text-gray-600 transition-all rounded-xl group hover:bg-blue-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-gray-700" aria-controls="dropdown-admins" data-collapse-toggle="dropdown-admins">
                        <svg class="w-5 h-5 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Administradores</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <ul id="dropdown-admins" class="hidden py-2 space-y-1 pl-11">
                        <li><a href="/admins/registro" class="block p-2 text-sm text-gray-500 rounded-lg hover:text-blue-600 dark:hover:text-white transition-colors">Registrar Empleado</a></li>
                        <li><a href="/admins/listado" class="block p-2 text-sm text-gray-500 rounded-lg hover:text-blue-600 dark:hover:text-white transition-colors">Ver Listado</a></li>
                    </ul>
                </li>

                <li>
                    <button type="button" class="flex items-center w-full p-3 text-gray-600 transition-all rounded-xl group hover:bg-blue-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-gray-700" aria-controls="dropdown-clientes" data-collapse-toggle="dropdown-clientes">
                        <svg class="w-5 h-5 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Clientes</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <ul id="dropdown-clientes" class="hidden py-2 space-y-1 pl-11">
                        <li><a href="/clientes/registro" class="block p-2 text-sm text-gray-500 rounded-lg hover:text-blue-600 dark:hover:text-white transition-colors">Nuevo Cliente</a></li>
                        <li><a href="/clientes/listado" class="block p-2 text-sm text-gray-500 rounded-lg hover:text-blue-600 dark:hover:text-white transition-colors">Gestionar Clientes</a></li>
                    </ul>
                </li>

                <li>
                    <button type="button" class="flex items-center w-full p-3 text-gray-600 transition-all rounded-xl group hover:bg-blue-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-gray-700" aria-controls="dropdown-productos" data-collapse-toggle="dropdown-productos">
                        <svg class="w-5 h-5 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Productos</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <ul id="dropdown-productos" class="hidden py-2 space-y-1 pl-11">
                        <li><a href="/productos/registro" class="block p-2 text-sm text-gray-500 rounded-lg hover:text-blue-600 dark:hover:text-white transition-colors">Añadir Stock</a></li>
                        <li><a href="/productos/listado" class="block p-2 text-sm text-gray-500 rounded-lg hover:text-blue-600 dark:hover:text-white transition-colors">Inventario</a></li>
                    </ul>
                </li>

                <hr class="my-4 border-gray-100 dark:border-gray-700">

                <li>
                    <a href="/geolocalizacion" class="flex items-center p-3 text-gray-600 rounded-xl hover:bg-emerald-50 hover:text-emerald-600 transition-all group dark:text-gray-300">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="ml-3">Geolocalización</span>
                    </a>
                </li>
                <li>
                    <a href="/login" class="flex items-center p-3 text-emerald-600 rounded-xl hover:bg-emerald-50 transition-all group font-semibold">
                        <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="ml-3">Iniciar Sesión</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main class="p-4 sm:ml-72 min-h-screen pt-20 sm:pt-4">
        <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-2xl dark:bg-gray-800 dark:border-gray-700">
            
            @section('contenido')
            <div class="space-y-8">
                <div class="relative p-10 overflow-hidden bg-slate-900 rounded-3xl shadow-2xl">
                    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between">
                        <div class="text-center md:text-left">
                            <h1 class="text-4xl font-extrabold text-white tracking-tight">Bienvenidos al panel de <span class="text-blue-400">Los Sopranos Library</span></h1>
                            <p class="mt-4 text-slate-300 text-lg max-w-xl">Donde el conocimiento es poder y la lealtad es la primera página de cada libro.</p>
                        </div>
                        <div class="mt-8 md:mt-0">
                            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Library Image" class="w-48 h-48 rounded-2xl object-cover shadow-2xl border-4 border-slate-800 rotate-3 hover:rotate-0 transition-transform duration-300">
                        </div>
                    </div>
                    <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-blue-600 rounded-full opacity-10 blur-3xl"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2 p-8 bg-gradient-to-br from-gray-800 to-slate-900 rounded-3xl border border-gray-700 shadow-lg flex flex-col justify-center">
                        <svg class="w-10 h-10 text-blue-500 mb-4 opacity-50" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H16.017C14.9124 8 14.017 7.10457 14.017 6V5C14.017 3.89543 14.9124 3 16.017 3H19.017C21.2261 3 23.017 4.79086 23.017 7V15C23.017 18.866 19.883 22 16.017 22H14.017V21ZM0.0170898 21L0.0170898 18C0.0170898 16.8954 0.912519 16 2.01709 16H5.01709C5.56937 16 6.01709 15.5523 6.01709 15V9C6.01709 8.44772 5.56937 8 5.01709 8H2.01709C0.912519 8 0.0170898 7.10457 0.0170898 6V5C0.0170898 3.89543 0.912519 3 2.01709 3H5.01709C7.22623 3 9.01709 4.79086 9.01709 7V15C9.01709 18.866 5.8831 22 2.01709 22H0.0170898V21Z"/></svg>
                        <p class="text-2xl italic text-gray-100 font-light leading-relaxed">
                            "Un hombre que no lee libros, no tiene ventaja sobre el hombre que no sabe leer."
                        </p>
                        <span class="mt-4 text-blue-400 font-bold uppercase tracking-widest text-sm">— Mark Twain (y la gerencia)</span>
                    </div>

                    <div class="p-8 bg-white dark:bg-gray-800 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                            <span class="w-2 h-6 bg-blue-600 rounded-full mr-3"></span>
                            Protocolo
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-full flex items-center justify-center text-xs font-bold mr-3">1</div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Verificar stock antes de registrar préstamos.</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-full flex items-center justify-center text-xs font-bold mr-3">2</div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Mantener la base de datos libre de inconsistencias.</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-full flex items-center justify-center text-xs font-bold mr-3">3</div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Todo cliente debe estar registrado con su geolocalización.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @show

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.2.1/dist/flowbite.min.js"></script>
</body>
</html>