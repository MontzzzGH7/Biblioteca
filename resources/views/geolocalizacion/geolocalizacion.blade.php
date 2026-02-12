@extends('layouts.app')

@section('Biblioteca', 'Geolocalización')

@section('contenido')

{{-- Leaflet CSS --}}
<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>

{{-- Leaflet JS --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Ubicación del usuario</h2>

    <button id="btnLocation"
        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
        Obtener ubicación
    </button>

    <div id="resultado" class="mt-4 text-sm text-gray-700"></div>

    {{-- Contenedor del mapa --}}
<div id="map" class="mt-4 rounded" style="height: 500px;"></div>
</div>

<script>
    const apiKey = "{{ env('VITE_OPENCAGE_KEY') }}";
    let map;

    console.log('JS cargado correctamente');

    document.getElementById('btnLocation').addEventListener('click', () => {
        console.log('Botón presionado');

        if (!navigator.geolocation) {
            alert('La geolocalización no es soportada por este navegador');
            return;
        }

        navigator.geolocation.getCurrentPosition(success, error);
    });

    function success(position) {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;

        console.log('Coordenadas:', lat, lng);

        fetch(`https://api.opencagedata.com/geocode/v1/json?q=${lat}+${lng}&key=${apiKey}`)
            .then(res => res.json())
            .then(data => {
                console.log('JSON recibido:', data);

                const location = data.results[0].components;

                document.getElementById('resultado').innerHTML = `
                    <p><strong>País:</strong> ${location.country}</p>
                    <p><strong>Estado:</strong> ${location.state}</p>
                    <p><strong>Ciudad:</strong> ${location.city ?? location.town ?? 'No disponible'}</p>
                    <p><strong>Latitud:</strong> ${lat}</p>
                    <p><strong>Longitud:</strong> ${lng}</p>
                `;

                //  MAPA 
                if (map) {
                    map.remove();
                }

                map = L.map('map').setView([lat, lng], 15);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map);

                L.marker([lat, lng])
                    .addTo(map)
                    .bindPopup('Ubicación actual del usuario')
                    .openPopup();
            })
            .catch(err => {
                console.error(err);
                alert('Error al consultar la API');
            });
    }

    function error() {
        alert('No se pudo obtener la ubicación. Verifica los permisos del navegador.');
    }
</script>

@endsection
