class Map {
    constructor() {
        this.initMap();
    }

    initMap() {
        this.carte = document.querySelector("#map");
        var lat = parseFloat(this.carte.getAttribute("data-lat"));
        var lng = parseFloat(this.carte.getAttribute("data-lng"));

        this.map = new google.maps.Map(document.querySelector("#map"), {
            center: {
                lat: lat,
                lng: lng
            },
            zoom: 12
        });

        this.initMarker(lat, lng);
    }

    initMarker(latitude, longitude) {
        var latLng = {lat: latitude, lng: longitude};

        this.marker = new google.maps.Marker({
            position: latLng,
            map: this.map 
        });
    }
    
}

addEventListener("load", () => {
    new Map()
});