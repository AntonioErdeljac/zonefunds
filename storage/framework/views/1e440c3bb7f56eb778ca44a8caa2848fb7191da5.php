<?php $__env->startSection('odabrani_ad'); ?>

  


<!-- MODAL ZA ODABRANI AD -->
  
    <div class="modal fade" id="selectedad"  aria-hidden="true" style="background-color: rgba(0,0,0,.6);">
      <div class="modal-dialog modal-md" id="slidedown" role="document">
        <!--<div class="container">
          <div class="row">      
        <div class="col-lg-6">-->
          <div class="card" style="box-shadow: none; border-style:none;" >
            <img class="card-img-top img-fluid" src="image/<?php echo e($ad_select->ad_image); ?>" style="border-top-right-radius: 5px; border-top-left-radius: 5px;">
          <div class="card-block" style="color:#2d89e5;">
            <h4><?php echo e($ad_select->ad_title); ?></h4>
            
            <p style="color: #6cace9"><i><?php echo e($ad_select->created_at->diffForHumans()); ?></i></p>
            <p class="card-text pt-1"><?php echo e($ad_select->ad_body); ?></p>
          </div>

          <div class="list-group" style="border-radius: 0px;">
            <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="callto:<?php echo e($ad_select->ad_contact); ?>"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->ad_contact); ?></a>
            <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->ad_price); ?></a>
            <a class="list-group-item" style="<?php echo e(Auth::check() ? 'border-radius:0px;' : 'border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;'); ?> text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#" id="map_show"><div id="ad_map" style="height:300px;border-radius:0px; border-width:0px; border-style: solid;"></div></a>
            <?php if(Auth::check()): ?>
              <?php if(Auth::user() == $ad_select->user): ?>
                <a href="<?php echo e(route('ad.show_update', $ad_select->id)); ?>" id="update" class="list-group-item text-xs-center no_decoration">Edit</a>
                <a href="<?php echo e(route('ad.delete', $ad_id = $ad_select->id)); ?>" id="delete" class="list-group-item text-xs-center no_decoration" href="#">Delete</a>
              <?php else: ?>
                  <a class="list-group-item" style="border-radius: 5px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i><i>&nbsp; Posted by <?php echo e($ad_select->user['username']); ?></i></a>
              <?php endif; ?>
            <?php endif; ?>

          </div>
        </div>
      </div>

      <!--<div class="col-lg-6">
          <div class="card" style="box-shadow: none; border-style:none;">
            <div class="card-block" style="color:#2d89e5;">
            <div id="ad_map" style="height:600px;"></div>
          </div>
        </div>
      </div>-->

  </div>

  

      <!--//MODAL ZA ODABRANI AD -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfg0wQRLzA6BW_PiUDrq-Ab8KbBRU2Gqo&callback=initMap">
  </script>
  <script type="text/javascript">
    //$("#registermodal").modal({
      //<?php if($errors->any()): ?>
        //show:true
      //<?php else: ?>
        //show:false
      //<?php endif; ?>
    //}); 

    $(document).ready(function()
      {
        $('#selectedad').hide();
        $('#selectedad').fadeIn();
        $('#selectedad').modal({
          show:true
        });

        $('#selectedad').on('hidden.bs.modal', function(e){
          window.location.href = "<?php echo e(route('home')); ?>"
        });

        $('#selectedad').on('shown.bs.modal', function(){
          var currentCenter_selected = map.getCenter();  // Get current center before resizing
          google.maps.event.trigger(map, "resize");
          map.setCenter(currentCenter_selected); // Re-set previous center
        });
      });

    

    var map;

    var lat = <?php echo e($ad_select->ad_location_coords_lat); ?>;
    var lng = <?php echo e($ad_select->ad_location_coords_lng); ?>;
    

    console.log(lat, lng);
    function initMap()
    {
      var position = new google.maps.LatLng(lat,lng);
      map = new google.maps.Map(document.getElementById('ad_map'), {
        zoom:14,
        center: position

        });

      var marker_icon = {
        url: '/img/marker.png',
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(35, 35)
      };

      oznaka = new google.maps.Marker({
        position: position,
        icon: marker_icon,
        map: map

      });
      map.setCenter(oznaka.getPosition());
    }

    



    
  </script>

   
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>