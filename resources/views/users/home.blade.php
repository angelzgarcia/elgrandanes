
<x-layouts.user-layout>
    <div class="home-container">

        <div class="options-list">
            <a href="{{ route('upcoming-events.index') }}">
                <div class="upcoming-events-container">
                    <div class="option-name">
                        Próximos eventos
                    </div>
                </div>
            </a>
            <a href="{{ route('menu') }}">
                <div class="menu-option-container">
                    <div class="option-name">
                        Menú
                    </div>
                </div>
            </a>
            <a href="{{ route('previous-events.index') }}">
                <div class="videos-container">
                    <div class="option-name">
                        Eventos Pasados
                    </div>
                </div>
            </a>
        </div>

        <section class="reviews-section-container">

        </section>

        <div class="location">
            <h3>Encuentranos en</h3>
            <div id="map"></div>
            <p class="address capitalize">
                Calle flor esquina 4ta avenida, col Benito Juarez, Nezahualcóyotl, Mexico
            </p>
        </div>

    </div>

    {{-- gogle maps --}}
    <script>
        function initMap() {
            const location = { lat: 19.4023150, lng: -98.9934600 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 16,
                center: location,
                styles: [
                    {
                        "elementType": "geometry",
                        "stylers": [
                        {
                            "color": "#242f3e"
                        }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [
                        {
                            "color": "#746855"
                        }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [
                        {
                            "color": "#242f3e"
                        }
                        ]
                    },
                    {
                        "featureType": "administrative.locality",
                        "elementType": "labels.text.fill",
                        "stylers": [
                        {
                            "color": "#d59563"
                        }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [
                        {
                            "color": "#d59563"
                        }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [
                        {
                            "color": "#263c3f"
                        }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "labels.text.fill",
                        "stylers": [
                        {
                            "color": "#6b9a76"
                        }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [
                        {
                            "color": "#38414e"
                        }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry.stroke",
                        "stylers": [
                        {
                            "color": "#212a37"
                        }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels.text.fill",
                        "stylers": [
                        {
                            "color": "#9ca5b3"
                        }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [
                        {
                            "color": "#746855"
                        }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [
                        {
                            "color": "#1f2835"
                        }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "labels.text.fill",
                        "stylers": [
                        {
                            "color": "#f3d19c"
                        }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [
                        {
                            "color": "#2f3948"
                        }
                        ]
                    },
                    {
                        "featureType": "transit.station",
                        "elementType": "labels.text.fill",
                        "stylers": [
                        {
                            "color": "#d59563"
                        }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                        {
                            "color": "#17263c"
                        }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [
                        {
                            "color": "#515c6d"
                        }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                        {
                            "color": "#17263c"
                        }
                        ]
                    }
                ]
            });

            const marker = new google.maps.Marker({
                position: location,
                map: map,
                title: "Mi ubicación personalizada",
                icon: {
                    // url:'https://mapmarker.io/api/v3/font-awesome/v6/icon?icon=fa-solid+fa-compact-disc&size=50&hoffset=0&voffset=-1',
                    // url:'https://mapmarker.io/api/v3/font-awesome/v6/icon?icon=fa-solid+fa-headphones&size=50&color=111&hoffset=0&voffset=-1&label=&labelAnimation=blink&labelAnimationDuration=1s&lc=0495ff',
                    url:'https://mapmarker.io/api/v3/font-awesome/v6/pin?icon=fa-solid+fa-volume-high&size=50&color=fff&hoffset=0&voffset=-1&label=&labelAnimation=blink&labelAnimationDuration=1s&lc=e69915',
                    anchor: new google.maps.Point(25, 50),
                },
            });
        }

        window.onload = initMap;
    </script>
</x-layouts.user-layout>

