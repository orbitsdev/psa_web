<div class="h-full">
    <div class="text-lg py-3">
        <h1 class=" tracking-wider text-gray-500 font-semibold">Map of General Santos City</h1>
    </div>
    <style>
        #map {
            height: 600px; /* Set a specific height for the map container */
            width: 100%; /* Set width to fill the available space */
        }
    </style>

    <div id="map" class=" border-2 border-gray-600 rounded-sm"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyBh1oNe0wqgv4NBQ3AjbxGYIh5mvl9YU&callback=initMap" async></script>
    <script>
        let map, activeInfoWindow, markers = [];

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 6.117278,
                    lng: 125.171583,
                },
                zoom: 15,
                styles: [
                    {
                        featureType: "poi",
                        stylers: [
                            { visibility: "off" } // Hide points of interest (landmarks, parks, etc.)
                        ],
                    },
                    // Add more styling options if needed
                ],

            });
                // Define the coordinates for the marker
                    const markerCoordinates = {
                    lat: 6.117278,
                    lng: 125.171583,
                };

                // Create a marker and set its position on the map
                const marker = new google.maps.Marker({
                    position: markerCoordinates,
                    map: map,
                    title: 'Marker Title' // Optional: Add a title to the marker
                });
        }
    </script>

</div>
