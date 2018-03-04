/**
 * initMap
 *
 * GMAP init function, events
 * */
function initMap() {

    var coordinates = {
        lat: 40.17919,
        lng: 44.51701
    };

    //If selected coordinates (for example user saved place)
    if(document.getElementById('latitude').value !== '' && document.getElementById('latitude').value !== null)
        coordinates = {
            lat: parseFloat(document.getElementById('latitude').value),
            lng: parseFloat(document.getElementById('longitude').value)
        };
    var uluru = {lat: coordinates.lat, lng: coordinates.lng};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
    google.maps.event.addListener(map, "click", function (e) {

        //Coordinates of clicked location
        var latLng = e.latLng;
        document.getElementById('latitude').value = latLng.lat().toFixed(5);
        document.getElementById('longitude').value = latLng.lng().toFixed(5);
    });

    var geocoder = new google.maps.Geocoder();



    /**
     * Click on map event global function
     * */
    google.maps.event.addListener(map, 'click', function(event) {
        geocoder.geocode({
            'latLng': event.latLng
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var street = '';
                    var street_num = '';
                    var country = '';
                    var city = '';

                    //Take a place information from gmap
                    for( var i = 0; i < results[0]['address_components'].length; i++ ){
                        if(results[0]['address_components'][i]['types'].indexOf("country") > -1)
                            country = results[0]['address_components'][i]['long_name'];
                        else if(results[0]['address_components'][i]['types'].indexOf("locality") > -1)
                            city = results[0]['address_components'][i]['long_name'];
                        else if(results[0]['address_components'][i]['types'].indexOf("route") > -1)
                            street = results[0]['address_components'][i]['long_name'];
                        else if(results[0]['address_components'][i]['types'].indexOf("street_number") > -1){
                            street_num = results[0]['address_components'][i]['long_name'];
                        }

                        //assigning a value taken from Gmap API
                        //Address value can consist of a street + street num or only street number
                        document.getElementById('address').value = (street_num !== '') ? street + ', ' + street_num : street;
                        document.getElementById('country').value = country;
                        document.getElementById('city').value = city;
                    }
                }
            }
        });

        placeMarker(event.latLng);
    });


    /**
     * Change market position when click on map
     * */
    function placeMarker(location) {
        if (marker == undefined){
            marker = new google.maps.Marker({
                position: location,
                map: map,
                animation: google.maps.Animation.DROP,
            });
        }
        else{
            marker.setPosition(location);
        }
        map.setCenter(location);
    }

    /**
     * Changing market position on map by changing coordinates fields
     * */
    function changeMarkerPosition() {
        var lat = document.getElementById('latitude').value;
        var lng = document.getElementById('longitude').value;
        var latlng = new google.maps.LatLng(lat, lng);
        marker.setPosition(latlng);
    }
    document.getElementById('latitude').onkeyup = function() {
        changeMarkerPosition();
    };
    document.getElementById('longitude').onkeyup = function() {
        changeMarkerPosition();
    };
}
//End GMAP INIT



jQuery(document).ready(function(){

    //Add new place / update place form submit script
    var form = jQuery("#placeForm");
    var form_submit = jQuery("#placeFormSubmit");

    form_submit.on('click', function (e) {
       e.preventDefault();
       form.submit();
    });
});