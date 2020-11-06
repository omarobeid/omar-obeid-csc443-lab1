let map;


function initMap(zoom) {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8,
    });
}


//see coordinates
document.getElementById("btn1").addEventListener("click", () => {
    let lat = document.getElementById("lat").value;
    let lng = document.getElementById("lng").value;

    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: lat, lng: lng },
        zoom: 15,
    });

});

//get my location

        

