var map_zonemap;
    function ad_zonemap()
    {
        map_zonemap = new google.maps.Map(document.getElementById('zonemap'), {
        center: {lat: 45.3430600, lng: 14.4091700},
        zoom:12
      });

      var marker_icon = {
        url: '/img/marker.png',
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(35, 35)
      };

      @foreach($ads as $ad)

        marker_{{ $ad->id }} = new google.maps.Marker({
          position: {lat: {{ $ad->ad_location_coords_lat }}, lng:{{$ad->ad_location_coords_lng}} },
          icon: marker_icon,
          map: map_zonemap
        });

      @endforeach
    }

    $('#zonemapmodal').on('shown.bs.modal', function(){
      var currentCenter = map_zonemap.getCenter();  // Get current center before resizing
  google.maps.event.trigger(map_zonemap, "resize");
  map_zonemap.setCenter(currentCenter); // Re-set previous center
    })