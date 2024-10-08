@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Comercios Georreferenciados</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Comercios Geo</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div>
                <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
                <div class="card">
                    <div class="card-body">
                        <div id="map" style="height: 500px; 100%;"></div>
                    </div>
                </div>

                <script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>
                <script>
                    const googleApiKey = "AIzaSyAyL3dQW5_PKAJLxYhs7EuzN3KGfbF7Ang";

                    mapboxgl.accessToken =
                        'pk.eyJ1IjoiYm9sc29uc2lzdGVtYXMiLCJhIjoiY2tpb3AzamM3MWYybzJ6dTYxZTR1cWJudCJ9.17kL4-zY3HQ16MGRHyuEkQ';
                    const map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/mapbox/streets-v12',
                        center: [-71.53, -41.9645], // Centra el mapa en El Bolsón
                        zoom: 14
                    });

                    map.on('load', function() {
                        const layers = map.getStyle().layers;
                        layers.forEach((layer) => {
                            if (layer.id.includes('poi') || layer.id.includes('place')) {
                                map.setLayoutProperty(layer.id, 'visibility', 'none'); // Oculta la capa
                            }
                        });
                    });

                    // Centrar el mapa en la ubicación
                    // map.flyTo({
                    //     center: [-71.53, -41.9645], // Centra el mapa en El Bolsón
                    //     zoom: 14
                    // });

                    const ubicaciones = @json($ubicaciones);

                    console.log(ubicaciones);

                    ubicaciones.forEach(record => {

                        let geocodeURL = `https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(record.direccion)}&key=${googleApiKey}`;

                        fetch(geocodeURL)
                        .then(response => response.json())
                        .then(georreferencia => {
                            if (georreferencia.results.length > 0) {
                                var localizacion = georreferencia.results[0].geometry.location;

                                // Crear el elemento HTML para el marcador con el ícono de FontAwesome
                                const el = document.createElement('div');

                                //Consulto por el Rubro y determino color del Icono
                                if (`${record.rubro}` == 'Inmobiliaria') {
                                    el.className = 'text-info font-weight-bold h4';
                                } else {
                                    el.className = 'text-danger font-weight-bold h4';
                                }

                                el.innerHTML = `${record.tipo}`; // Ícono de comercio
                                el.title = `${record.razon_social}\n${record.direccion}\n${record.rubro}`; // Tooltip con la información

                                const marker = new mapboxgl.Marker(el)
                                .setLngLat([localizacion.lng, localizacion.lat]) // Longitud, Latitud
                                .addTo(map);

                                // Crear el popup para cada comercio
                                const popup = new mapboxgl.Popup({ offset: 25 })
                                    .setHTML(`
                                    <h3>${record.razon_social}</h3>
                                    <p><strong>Dirección:</strong> ${record.direccion}</p>
                                    <p><strong>Rubro:</strong> ${record.rubro}</p>
                                    `);

                                    // Asociar el popup con el marcador
                                    marker.setPopup(popup);
                                }
                            }); //End Fetch
                        });

                </script>
            </div>
        </div>
    </section>
@endsection







