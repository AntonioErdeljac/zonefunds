<!DOCTYPE html>
<html>
<head>
	<title>ZoneFunds</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/zonecustom.css">
</head>





<body class="bg-color-niceblue">
<div class="overlay">
  <img src="img/location_reverse.png" height="100px" id="imgforoverlay">
</div>

	<form method="post" action="<?php echo e(route('savesession')); ?>" id="blankform">
		<?php echo e(csrf_field()); ?>

		<input name="lat" type="hidden" id="session_location_coords_lat">
		<input name="lng" type="hidden" id="session_location_coords_lng">
        <input type="hidden" name="user_location" id="user_location">
        <input type="hidden" name="api_used" id="api_used">
	</form>









        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

	<script type="text/javascript">
     setTimeout(function()
          {
            $('.overlay').fadeOut(1000);
          }, 3000);

     setTimeout(function()
     {
        navigator.geolocation.getCurrentPosition(success, error);

        function success(position) {

            var GEOCODING = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + position.coords.latitude + '%2C' + position.coords.longitude + '&language=en';

            $.getJSON(GEOCODING).done(function(location) {


                //za sesiju korisnika
                $('#session_location_coords_lat').val(position.coords.latitude);
                $('#session_location_coords_lng').val(position.coords.longitude);
                $('#user_location').val(location.results[0].address_components[2].long_name);
                $('#api_used').val('ne');

                $('#blankform').submit();
                //kraj sesije korisnika
            })

        }

        function error(err) {
            $.getJSON("http://ip-api.com/json/", function (data) {
                var lat = data.lat;
                var lng = data.lon;
                var ip = data.ip;
                $('#session_location_coords_lat').val(lat);
                $('#session_location_coords_lng').val(lng);
                $('#user_location').val(data.city);
                $('#api_used').val('da');

                $('#blankform').submit();
            });
            
        }
     },4500);
		
	</script> 
</body>
</html>