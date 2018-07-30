navigator.geolocation.getCurrentPosition(success, error);

        function success(position) {

            var GEOCODING = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + position.coords.latitude + '%2C' + position.coords.longitude + '&language=en';

            $.getJSON(GEOCODING).done(function(location) {


                $('#ad_location_m').val('erda');
                $('#ad_location_coords_lat_m').val(position.coords.latitude);
                $('#ad_location_coords_lng_m').val(position.coords.longitude);
                $('#ad_see_location_m').val(location.results[0].address_components[2].long_name);

                
                //$('#user_location').html('<i class="fa fa-map-marker" style="padding-right: 10px;"></i>'+location.results[0].address_components[2].long_name);

            })

        }

        function error(err) {
            $("#geolocationmodal").modal({
                show: true
            });

            $.getJSON("http://ip-api.com/json/", function (data) {
                var lat = data.lat;
                var lng = data.lon;
                var city = data.city;
                var ip = data.ip;
                $('#ad_location_m').val(city);
                $('#ad_location_coords_lng_m').val(lng);
                $('#ad_location_coords_lat_m').val(lat);
                $('#ad_see_location_m').val('da');

                $('#user_location').html('<i class="fa fa-map-marker" style="padding-right: 10px;"></i>'+city);

                
                
            });
            
        }