<?php $__env->startSection('title'); ?>

	ZoneFunds - <?php echo e($ad_select->ad_title); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


   <?php if(Auth::check()): ?>


    <!-- NEW POST ZA MOBITELE -->
    <!-- ////NEW POST ZA MOBITELE -->

  <?php endif; ?>


    <div class="container mt-3">
      <div class="row">
        <div class="<?php echo e($ad_select->ad_image != 'default.jpg' ? 'col-lg-4' : 'col-lg-6'); ?>">
          <div class="card">
            <div class="card-block"  style="color: #2d89e5">
              <h4 class="card-title linebreak"><?php echo e($ad_select->ad_title); ?></h4>
              <hr>
              <p style="color: #6cace9"><?php echo e($ad_select->created_at->diffForHumans()); ?></p>
              <p class="pt-1 linebreak"><?php echo e($ad_select->ad_body); ?></p>
              
              <hr>

              <a class="" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="callto:<?php echo e($ad_select->ad_contact); ?>"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->ad_contact); ?></a>
              <hr>
              <p class="" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->ad_price); ?> HRK</p>
              <hr>
              <!--<p class="" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->ad_location); ?></p>
              <hr>-->
                <a class="" style="border-radius: 5px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i><?php echo e($ad_select->user['username']); ?></a>

                <?php if(Auth::user() == $ad_select->user): ?>
                <hr>

                <a id="ad_settings" class="form-control text-xs-center" style="" href="#"><i class="fa fa-cog fa-fw pr-1" aria-hidden="true"></i>Uredi</a>
                <hr>
                <a id="ad_complete" class="form-control text-xs-center" style="" href="#"><i class="fa fa-check fa-fw pr-1" aria-hidden="true"></i>Označi kao dovršeno</a>
                <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="col-lg-6 hidden-md-up">
          <hr>
        </div>

        <div class="<?php echo e($ad_select->ad_image != 'default.jpg' ? 'col-lg-4' : 'col-lg-6'); ?>" style="color:#2d89e5">


          <div class="card" style="margin-bottom:100px; color:#2d89e5;">
            <div class="card-block">
              <h4 class="card-title">Lokacija</h4>
              <hr>
              <span class="" style="<?php echo e(Auth::check() ? 'border-radius:0px;' : 'border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;'); ?> text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#" id="map_show"><div id="ad_map" style="height:300px;border-radius:0px; border-width:0px; border-style: solid;"></div></span>
            </div>
          </div>

        </div>

        <div class="<?php echo e($ad_select->ad_image != 'default.jpg' ? 'col-lg-4' : 'col-lg-6'); ?>">
                  <?php if($ad_select->ad_image != 'default.jpg'): ?>

          
            <div class="card" style="color: #2d89e5;">
              <div class="card-block">
                <h4 class="card-title">Slika</h4>
                <hr>
                <img class="img-fluid" src="image/<?php echo e($ad_select->ad_image); ?>" style="border-top-right-radius: 5px; border-top-left-radius: 5px;">
              </div>
            </div>
          </div>
              <hr>

        <?php endif; ?>
        </div>
      </div>
    </div>


     <div class="container">
<div id="createmodal" class="overlay_update text-xs-center">
    <form id="createad_form" action="<?php echo e(route('ad.update', $ad_id = $ad_select->id)); ?>"  method="POST" enctype="multipart/form-data" class="form-control bg-color-niceblue" style="border-style:none;">
        
          <div class="row">
            <div class="col-lg-4 offset-lg-4">
       
        <div id="image">
            <div class="fileUpload btn">
            <span class="fa fa-photo fa-2x"  style="color:#Fff;" id="uploadphoto"></span>
            <input type="file" class="upload form-control" id="uploadinput" name="ad_image" accept="image/*" />
        </div>
        </div>

        <div id="location" style="display:none;" class="ad_create">
            <input type="hidden" class="mb-1 ad_create" name="ad_location_coords_lat" value="<?php echo e($lat); ?>"/>
            <input type="hidden" class="mb-1 ad_create" name="ad_location_coords_lng" value="<?php echo e($lng); ?>"/>
            <input type="hidden" class="mb-1 ad_create" name="ad_location" value="<?php echo e($city); ?>"/>
        </div>
        <div id="final_update" class="">
          <div >
            <input type="text" id="final_title" class="mb-1 ad_create form-control" style="background-color:#2d89e5;" name="ad_title" placeholder="Naslov oglasa" value="<?php echo e($ad_select->ad_title); ?>"/>
          </div>
          <div>
            <textarea type="text" id="final_body" class="mb-1 ad_textarea form-control" style="background-color:#2d89e5;" name="ad_body" placeholder="Opis oglasa"><?php echo e($ad_select->ad_body); ?></textarea>
          </div>
          <div>
              <input type="number" id="final_contact" class="mb-1 ad_create form-control" style="background-color:#2d89e5;" name="ad_contact" placeholder="Kontakt" value="<?php echo e($ad_select->ad_contact); ?>"/>
          </div>
          <div >
              <input type="number" id="final_price" class="mb-1 ad_create form-control" style="background-color:#2d89e5;" name="ad_price" placeholder="Cijena" value="<?php echo e($ad_select->ad_price); ?>"/>
          </div>
          <div>
            <div class="fileUpload btn form-inline" style="background-color: #2d89e5;">
            <span class="fa fa-photo fa-2x mr-1"  style="color:#Fff;" id="uploadphoto_update"></span>
            <input type="file" class="upload form-control" id="uploadinput_update" name="ad_image" accept="image/*" />
        </div>
        </div>

        <a style="" ><button type="submit" id="next" style="cursor:pointer; outline: none;border-radius: 50%; border-color:#fff; border-style:solid; border-width:3px;width: 50px; height: 50px;  background-color: #2d89e5;" class="rotate_half"><i class="fa fa-check" style="color:#fff; "></i></button></a>


        <a style="" clas><button type="button" id="close_update" style="cursor:pointer; outline: none;border-radius: 50%; border-color:#fff; border-style:solid; border-width:3px;width: 50px; height: 50px;  background-color: #2d89e5;" class="rotate_half"><i class="fa fa-times" style="color:#fff; "></i></button></a>

         <a style="" href="<?php echo e(route('ad.delete', $ad_select->id)); ?>"" clas><button type="button" id="" style="cursor:pointer; outline: none;border-radius: 50%; border-color:#fff; border-style:solid; border-width:3px;width: 50px; height: 50px;  background-color: #2d89e5;" class="rotate_half"><i class="fa fa-trash" style="color:#fff; "></i></button></a>

        <?php echo e(csrf_field()); ?>


        </div>
        </div>
        
    </form>
    </div>
</div>























 <div class="container">
<div id="completemodal" class="overlay_complete text-xs-center">
    <form id="createad_form" action="<?php echo e(route('ad.complete', $id = $ad_select->id)); ?>"  method="get" class="form-control bg-color-niceblue" style="border-style:none;">
        
          <div class="row">
            <div class="col-lg-4 offset-lg-4">
       
        <div id="final_complete" class="">
          <div >
            <label for="user_complete" class="mb-3" style="color:#fff;"><h1>Tko je dovršio oglas?</h1></label>
            <input type="text" id="final_title" class="mb-1 ad_create form-control" style="background-color:#2d89e5;" name="user_complete" placeholder="John Doe"/>
            <input type="hidden" value="<?php echo e($ad_select->id); ?>" name="ad_id">

          </div>
            <button type="submit" id="next_complete" style="cursor:pointer; outline: none;border-radius: 50%; border-color:#fff; border-style:solid; border-width:3px;width: 50px; height: 50px;  background-color: #2d89e5;" class="rotate_half"><i class="fa fa-check" style="color:#fff; "></i></button>


            <button type="button" id="close_complete" style="cursor:pointer; outline: none;border-radius: 50%; border-color:#fff; border-style:solid; border-width:3px;width: 50px; height: 50px;  background-color: #2d89e5;" class="rotate_half"><i class="fa fa-times" style="color:#fff; "></i></button>

        <?php echo e(csrf_field()); ?>


        </div>
        </div>
        
    </form>
    </div>
</div>


































        
<?php $__env->stopSection(); ?>









<?php $__env->startSection('scripts'); ?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfg0wQRLzA6BW_PiUDrq-Ab8KbBRU2Gqo&callback=initMap"></script>
<script type="text/javascript">
          $('#uploadinput_update').on('change',function(){
            $('#uploadphoto_update').removeClass('fa-photo').addClass('fa-check');
            console.log('dada');
    });


    $('.overlay_complete').hide();
    $('#ad_complete').click(function(){
      $('.overlay_complete').css({ opacity: 1 },1500);
      $('.overlay_complete').css('visibility', 'visible');
      $('.overlay_complete').slideDown(700);
    });

    $('#close_complete').click(function(){
      $('.overlay_complete').slideUp();
    });



    $('.overlay_update').hide();
    $('#ad_settings').click(function(){
      $('.overlay_update').css({ opacity: 1 },1500);
      $('.overlay_update').css('visibility', 'visible');
      $('.overlay_update').slideDown(700);

    });
    
    
    $('#close_update').click(function(){
      console.log('clicked');
      $('.overlay_update').slideUp();
      
    });

    $('#updatead').modal({
      show:true
    });

    $('#updatead').on('hidden.bs.modal', function(e){
      window.location.href = "<?php echo e(route('home')); ?>"
    });




    $('#feed').hide();
    $('#feed').fadeIn(1000);
    $(document).ready();

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
      };

      oznaka = new google.maps.Marker({
        position: position,
        icon: marker_icon,
        map: map

      });



      infowindow_<?php echo e($ad_select->id); ?> = new google.maps.InfoWindow({
        content:'<a href="<?php echo e(route("ad.show", $ad_select->id)); ?> style="text-decoration: none; !important"><div class="container><div class="row"><h5 class="linebreak"><?php echo e($ad_select->ad_title); ?></h5><p style="color: #6cace9"><i><?php echo e($ad_select->created_at->diffForHumans()); ?></i></p></span><p class="card-text pt-1 linebreak mb-1"><?php echo e(str_limit($ad_select->ad_body, 50)); ?></p></div><div class="list-group" style="border-radius: 0px;"><p class="list-group-item" style="border-radius: 0px; text-decoration: none;  border-right-style:hidden; border-left-style: hidden;" href="tel:<?php echo e($ad_select->ad_contact); ?>"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->ad_contact); ?></p><p class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->ad_price); ?></p><p class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->user["username"]); ?></p></a></div></div></div></div></div></div>'
        });


      oznaka.addListener('click', function(){
        infowindow_<?php echo e($ad_select->id); ?>.open(map, oznaka);
      })

      map.setCenter(oznaka.getPosition());
      var currentCenter_selected = map.getCenter();  // Get current center before resizing
          google.maps.event.trigger(map, "resize");
          map.setCenter(currentCenter_selected);
    }

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>