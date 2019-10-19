// Instantiate a map and platform object:
var platform = new H.service.Platform({
    'apikey': 'OQH9XqyfyzI5cfl8w5Lm9iDBLoF1OU0tYzRFqge0dIY'
});
// Retrieve the target element for the map:
var targetElement = document.getElementById('mapContainer');

// Get default map types from the platform object:
var defaultLayers = platform.createDefaultLayers();

// Instantiate the map:
var map = new H.Map(
    document.getElementById('mapContainer'),
    defaultLayers.vector.normal.map,
    {
        zoom: 10,
        center: { lat: 14.649530, lng: 120.967880 }
    });

// Create the parameters for the geocoding request:
var geocodingParams = {
    searchText: 'Project 4 Block 49 Lot 10 Bagong Silangan Caloocan City Philippines'
};

// Define a callback function to process the geocoding response:
var onResult = function (result) {
    var locations = result.Response.View[0].Result,
        position,
        marker;
    // Add a marker for each location found
    for (i = 0; i < locations.length; i++) {
        position = {
            lat: locations[i].Location.DisplayPosition.Latitude,
            lng: locations[i].Location.DisplayPosition.Longitude
        };
        marker = new H.map.Marker(position);
        map.addObject(marker);
    }
};

// Get an instance of the geocoding service:
var geocoder = platform.getGeocodingService();

// Call the geocode method with the geocoding parameters,
// the callback and an error callback function (called if a
// communication error occurs):
geocoder.geocode(geocodingParams, onResult, function (e) {
    alert(e);
});
