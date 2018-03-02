<script>
    function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
        google.maps.event.addListener(map, "click", function (e) {

            //lat and lng is available in e object
            var latLng = e.latLng;
            document.getElementById('latitude').value = latLng.lat().toFixed(5);
            document.getElementById('longitude').value = latLng.lng().toFixed(5);
        });

        var geocoder = new google.maps.Geocoder();

        google.maps.event.addListener(marker, 'click', function() {
            console.log(place);
        });

        google.maps.event.addListener(map, 'click', function(event) {
            geocoder.geocode({
                'latLng': event.latLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        for( var i = 0; i < results[0]['address_components'].length; i++ ){
                            if(results[0]['address_components'][i]['types'].indexOf("country") > -1)
                                document.getElementById('country').value = results[0]['address_components'][i]['long_name'];
                            else if(results[0]['address_components'][i]['types'].indexOf("locality") > -1)
                                document.getElementById('city').value = results[0]['address_components'][i]['long_name'];
                            else if(results[0]['address_components'][i]['types'].indexOf("route") > -1)
                                document.getElementById('address').value = results[0]['address_components'][i]['long_name'];
                            else if(results[0]['address_components'][i]['types'].indexOf("street_number") > -1){
                                document.getElementById('address').value = results[0]['address_components'][i]['long_name'];
                            }


                        }
                    }
                }
            });
        });

    }


</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD35SZltHdpZGVfBdnLMXawhuZHHtLFrmQ&callback=initMap">
</script>