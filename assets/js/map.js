if (document.getElementById('map')){
    mapboxgl.accessToken = 'pk.eyJ1IjoidGhlbWVzZmxhdCIsImEiOiJjbGt3NGxtYncwa2F2M21saHM3M21uM3h2In0.9NbzjykXil1nELxQ1V8rkA';
        const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/light-v11',
        center: [23.0624496,-109.69752613],
        zoom: 14
    });
    
    const geojson = {
        type: 'FeatureCollection',
        features: [
            {
            type: 'Feature',
            geometry: {
                type: 'Point',
                coordinates: [23.0624496,-109.6975261]
            }
            }
        ]
        };
    
        for (const feature of geojson.features) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';
    
        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map);
    }
}

if (document.getElementById('map1')) {
    mapboxgl.accessToken = 'pk.eyJ1IjoidGhlbWVzZmxhdCIsImEiOiJjbGt3NGxtYncwa2F2M21saHM3M21uM3h2In0.9NbzjykXil1nELxQ1V8rkA';
        const map1 = new mapboxgl.Map({
        container: 'map1',
        style: 'mapbox://styles/mapbox/light-v11',
        center: [23.0624496,-109.6975261],
        zoom: 14
    });
    
    const geojson1 = {
        type: 'FeatureCollection',
        features: [
            {
            type: 'Feature',
            geometry: {
                type: 'Point',
                coordinates: [23.0624496,-109.6975261]
            }
            }
        ]
        };
    
        for (const feature of geojson1.features) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';
    
        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map1);
    }
}

if (document.getElementById('map2')) {
    mapboxgl.accessToken = 'pk.eyJ1IjoidGhlbWVzZmxhdCIsImEiOiJjbGt3NGxtYncwa2F2M21saHM3M21uM3h2In0.9NbzjykXil1nELxQ1V8rkA';
        const map2 = new mapboxgl.Map({
        container: 'map2',
        style: 'mapbox://styles/mapbox/light-v11',
        center: [23.0624496,-109.6975261],
        zoom: 14
    });
    
    const geojson2 = {
        type: 'FeatureCollection',
        features: [
            {
            type: 'Feature',
            geometry: {
                type: 'Point',
                coordinates: [23.0624496,-109.6975261]
            }
            }
        ]
        };
    
        for (const feature of geojson2.features) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';
    
        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map2);
    }
}