 <!--odabiremo glavni kod u master.blade.php datoteci -->

<!-- odabiremo sekciju odredjenu u glavnom kodu -->

<?php $__env->startSection('title'); ?> 

  ZoneFunds

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="modal fade m-0" id="create_ad_mobile" style="height:100%; width:100%; background-color: #2d89e5" role="dialog" aria-labelledby="create_ad_modalLabel" aria-hidden="true">
      <div class="modal-dialog bg-color-niceblue" role="document">
        <div class="modal-content bg-color-niceblue border-r-15" style="border-color:#2d89e5">
          <div class="modal-header hidden-md-down" style="background-color: #fff; color:#fff; border-top-right-radius:15px; border-top-left-radius: 15px;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity:1;">
              <span aria-hidden="true" style="color:#2d89e5;">&times;</span>
            </button>
            <h1 class="modal-title text-xs-center hidden-md-down display-5" id="create_ad_modalLabel" style="color: #2d89e5;"><span class="fa fa-edit fa-1x" style="color: #2d89e5;" ></span>&nbsp; Create an ad</h1>
          </div>
          <div class="modal-body">
            <div class="form-group" style="">
              <form action="<?php echo e(route('ad.create')); ?>" method="post" enctype="multipart/form-data">

                <div class="mb-3 input_focus_change">
                  <label for="ad_title" class="bg-color-niceblue" style="padding-left:6px; color:#fff">Ad Title</label>
                  <input type="text" class="form-control input_focus_change color-niceblue" name="ad_title" placeholder="Ad Title" value="<?php echo e(Request::old('ad_title')); ?>">
                </div>

                <div class="mb-3">
                  <label for="ad_body" style="padding-left:6px; color: #2d89e5;">Ad Description</label>
                  <textarea  class="form-control input_focus_change" id="textarea_create" rows="5" name="ad_body" placeholder="Popraviti ću bilo koji problem sa računalom ili laptopom, software i hardware."><?php echo e(Request::old('ad_body')); ?></textarea>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-addon borderless_input"><i class="fa fa-phone fa-fw"></i></span>
                    <input class="form-control input_focus_change" type="number" name="ad_contact" placeholder="111-222-434-2" value="<?php echo e(Request::old('ad_contact')); ?>">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-addon borderless_input"><i class="fa fa-money fa-fw"></i></span>
                    <input class="form-control input_focus_change" type="number" name="ad_price" placeholder="100" value="<?php echo e(Request::old('ad_price')); ?>">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-addon borderless_input"><i class="fa fa-map-marker fa-fw"></i></span>
                    <input class="form-control" id="ad_location" type="hidden" name="ad_location">
                    <input class="form-control" id="ad_location_coords_lat" type="hidden" name="ad_location_coords_lat">
                    <input class="form-control" id="ad_location_coords_lng" type="hidden" name="ad_location_coords_lng">
                    <input class="form-control input_focus_change" id="ad_see_location" type="text" disabled>
                  </div>

                <div class="input-group mb-3">
                    <span class="input-group-addon borderless_input"><i class="fa fa-photo fa-fw"></i></span>
                    <input class="form-control borderless_input" type="file" name="ad_image" placeholder="Prenesi fotografiju">
                  </div>

                <button type="submit" class="form-control btn btn-primary btn-lg mt-2" style="border-radius:15px;">Publish</button>
                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <!--<?php 
      var_dump($errors);
    ?>-->


    




<!--
    <a data-toggle="modal" data-target="#zonemapmodal">
      <div class ="zonemapmobile hidden-lg-up" style="background-color:#2d89e5;">
        <div class="nav-item" style="left: 14.6px; bottom:-11.5px; position: relative;">
          <span class="fa fa-globe fa-3x" style="color:#fff" id="newpost"></span>
        </div>
      </div>
    </a>
-->





    <!--NORMAL POST & ZONE MAP -->

    <div class="container">
      <div class="row">


    <?php if(Auth::check()): ?>


    <!-- NEW POST ZA MOBITELE -->
    <a href="#" data-target="#create_ad_mobile" data-toggle="modal"> <!-- koristimo bootstrap sa ugrađenim javascriptom za modale bez preusmjaravanja -->
    <div class ="phonepost hidden-lg-up" style="background-color:#2d89e5">
      <div class="nav-item" style="right: -14px; bottom:-12px; position: relative;">
        <span class="fa fa-pencil fa-3x rotate" style="color: #fff"></span>
      </div>
    </div>
    </a>
    <!-- ////NEW POST ZA MOBITELE -->



        <div class="col-lg-1 hidden-md-down">
          <div class="nav navbar navbar-light mb-3 navbar-brand" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">
            <a class="nav-link p-0" data-toggle="modal" data-target="#create_ad_modal">
            <div class="nav-item p-0">
              <span class="fa fa-edit fa-2x rotate" style="color: #fff; padding-left:10px; padding-top: 5px; padding-bottom: 5px;"></span>
            </div>
            </a>
          </div>
        </div>

    
           
        <div class="col-lg-1 offset-lg-10 hidden-md-down">
          <div class="nav navbar navbar-light mr-2 mb-3 navbar-brand" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">
            <a class="nav-link p-0" data-toggle="modal" data-target="#zonemapmodal">
              <div class="p-0">
                <span class="fa fa-globe fa-2x rotate" style="color: #fff; padding-left:0px; padding-top: 5px; padding-bottom: 5px;"></span>
              </div>
            </a>
          </div>
        </div>

    <?php else: ?>


      <div class="col-lg-1 offset-lg-11 hidden-md-down">
          <div class="nav navbar navbar-light mr-2 mb-3 navbar-brand" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">
            <a class="nav-link p-0" data-toggle="modal" data-target="#zonemapmodal">
              <div class="p-0">
                <span class="fa fa-globe fa-2x rotate" style="color: #fff"></span>
              </div>
            </a>
          </div>
        </div>    

    <?php endif; ?>
    
      </div>
    </div>


    <!--/////NORMAL POST/MESSAGES/SORT -->

    



    




    






<!-- MODAL ZA LOGIN -->
      <div class="modal fade" style="border-radius: 5px;" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
        <div class="modal-dialog border-r-15" role="document">
          <div class="modal-content border-r-15">
            <div class="modal-header border-r-15" style="background-color: #fff; color:#2d89e5; border-bottom-style: hidden;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: #000;">&times;</span>
              </button>
              <img class="mx-auto d-block mb-1" height="100" src="img/location.png" />
              <h4 class="modal-title text-xs-center">Welcome back!</h4>
            </div>
            <div class="modal-body" style="border-radius: 5px;">
              <div cla
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <form action="<?php echo e(route('signin')); ?>" method="post">

                        <div class="input-group mb-1 input_form">
                          <span class="input-group-addon input_form color-niceblue"><i class="fa fa-envelope fa-fw"></i></span>
                          <input class="form-control input_form input_focus_change" type="text" name="email" placeholder="john.doe@example.com" value="<?php echo e(Request::old('email')); ?>">
                        </div>

                        <div class="input-group mb-1 input_form">
                          <span class="input-group-addon input_form color-niceblue"><i class="fa fa-key fa-fw"></i></span>
                          <input class="form-control input_form input_focus_change" type="password" name="password" placeholder="Password">
                        </div>

                        <button type="submit" class="form-control btn btn-primary border-r-15">Log In</button>

                        <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </div>
      </div>
     <!-- //MODAL ZA LOGIN -->











<!-- MODAL ZA REGISTER -->
      <div class="modal fade" id="registermodal" tabindex="" role="" aria-labelledby="registermodal" aria-hidden="true">
        <div class="modal-dialog" role="document" style="border-radius: 5px;">
          <div class="modal-content" style="border-radius: 5px;">
            <div class="modal-header" style="background-color: #fff; color:#2d89e5; border-bottom-style:hidden; border-radius: 5px;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:#000;">&times;</span>
              </button>
              <img class="mx-auto d-block mb-1" height="100" src="img/location.png" />
              <h4 class="modal-title text-xs-center" id="create_ad_modalLabel">Sign Up</h4>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <form action="<?php echo e(route('signup')); ?>" method="post">
                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-user fa-fw"></i></span>
                          <input class="form-control input_focus_change" type="text" name="username" placeholder="John Doe" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;" value="<?php echo e(Request::old('username')); ?>">
                        </div>

                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-envelope fa-fw"></i></span>
                          <input class="form-control input_focus_change" type="text" name="email" placeholder="john.doe@example.com" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;" value="<?php echo e(Request::old('email')); ?>">
                        </div>

                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-key fa-fw"></i></span>
                          <input class="form-control input_focus_change" type="password" name="password" placeholder="****" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>

                          <!--<?php if($errors->any()): ?>
                              <div style="background-color: #fff; padding:5px; color:#2d89e5; margin-bottom: 10px; text-align: center;">
                                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      <p><?php echo e($error); ?></p>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              </div>
                                  <?php endif; ?>-->

                        <button type="submit" class="form-control btn btn-primary border-r-0">Create An Account</button> 

                        <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </div>
      </div>
     <!-- //MODAL ZA REGISTER -->




































<?php echo $__env->yieldContent('odabrani_ad'); ?>



<?php echo $__env->yieldContent('update_ad'); ?>

  




        <?php if(count($ads) == 0): ?>
          <div class="container mt-3">
            <div class="row">
              <div class="col-lg-12" style="color:#5ca4f3;">
                <h1 class="display-5" >Sorry, no results have been found!</h1>
                </div>
                <p class="lead pl-1" style="color:#5ca4f3;">Please try the following:</p>
                <ul style="color:#5ca4f3;" class="pl-3">
                    <li>Check if your input is correct</li>
                    <li>Change the syntax of your input</li>
                    <li>Search for something similiar</li>
                </ul>
              </div>
            </div>
          </div>

        <?php else: ?>

    <!--FEED-->
    <div class="container" id="feed">
      <div class="row">


        

          <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

          

            

            <div class="col-xl-4 my-1" id="ad_card">
              <!--<a data-toggle="modal" data-target="#create_ad_modal2" style="text-decoration:none;">-->
                <a href="<?php echo e(route('ad.show', $ad->id)); ?>" style="text-decoration: none;">
                  <div class="card" style="border-style:none;">
                    <img class="card-img-top img-fluid" src="image/<?php echo e($ad->ad_image); ?>" style="border-top-right-radius:5px; border-top-left-radius: 5px;">

                    <div class="card-block">
                   <!-- <div style="position:absolute; right:0; padding-right:20px;">
                            <span class="fa fa-cog fa-2x"></span>
                      </div>-->
                      <h4 class="card-title linebreak"><?php echo e(str_limit($ad->ad_title, 24)); ?></h4>
                      
                      <p style="color: #6cace9"><i><?php echo e($ad->created_at->diffForHumans()); ?></i></p></span>
                      <p class="card-text pt-1 linebreak"><?php echo e(str_limit($ad->ad_body, 50)); ?></p>
                    </div>

                    <div class="list-group" style="border-radius: 0px;">
                      <a class="list-group-item" style="border-radius: 0px; text-decoration: none;  border-right-style:hidden; border-left-style: hidden;" href="callto:<?php echo e($ad->ad_contact); ?>"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad->ad_contact); ?></a>
                      <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad->ad_price); ?></a>
                      <a class="list-group-item" style="<?php echo e(Auth::check() ? 'border-radius:0px;' : 'border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;'); ?> text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad->ad_location); ?></a>
                      <?php if(Auth::check()): ?>
                        <?php if(Auth::user() == $ad->user): ?>
                        <div>
                        <a href="<?php echo e(route('ad.show', $ad->id)); ?>" id="ad_settings" class="list-group-item text-xs-center"><i class="fa fa-cog"></i></a>
                        </div>
                        <?php else: ?>
                            <a class="list-group-item" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-user" aria-hidden="true"></i><i>&nbsp; Posted by <?php echo e($ad->user['username']); ?></i></a>
                        <?php endif; ?>
                      <?php endif; ?>
                    </div>

                  </div>
              </a>
            </div>



            <div class="col-lg-12 hidden-lg-up" style="background-color:#f7f7f7">

              <hr>

            </div>



      <!-- MODAL ZA POTVRDU BRISANJA -->
            <div class="modal fade" id="confirmmodal" aria-hidden="true">
              <div class="modal-dialog" role="document" style="border-radius:0px; border-style:hidden;">
                <div class="modal-content" style="border-radius:0px; border-style:hidden;">
                  <div class="modal-body text-xs-center" style="border-radius:0px; border-style:hidden;">
                    <img src="img/delete_post.png" class="mx-auto d-block mb-1" height="100">
                    <h4 style="color: #ff4c4c;">Are you sure you want <br> to delete this ad?</h4>
                          <div class="form-group">
                            <a href="<?php echo e(route('ad.delete', ['ad_id' => $ad->id])); ?>">
                              <button id="delete" class="form-control btn btn-primary border-r-0 mb-1 mt-1">Yes</button>
                            </a>

                              <button id="delete" data-dismiss="modal" class="form-control btn btn-primary border-r-0">No</button>
                            </div>
                    </div>
                  </div>
                </div>
              </div>
           <!-- //MODAL ZA POTVRDU BRISANJA -->










            <!-- MODAL ZA ERRORE -->
            <div class="modal fade" id="errormodal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content border-r-15">
                  <div class="modal-body text-xs-center border-r-15">
                    <img src="img/delete_post.png" class="mx-auto d-block mb-1" height="100">
                    <h4 style="color: #ff4c4c;">Please try again by<br>providing the correct information</h4>
                          <div class="form-group mt-1">
                              <button id="delete" data-dismiss="modal" class="form-control btn btn-primary border-r-0">Ok</button>
                            </div>
                    </div>
                  </div>
                </div>
              </div>
           <!-- //MODAL ZA ERRORE -->











          <!-- MODAL ZA ZONE MAP -->
            <div class="modal fade" id="zonemapmodal" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content border-r-15">
                  <div class="modal-body text-xs-center border-r-15">
                    <div id="zonemap" style="height:600px;"></div>
                  </div>
                </div>
              </div>
            </div>
          <!-- //MODAL ZA ZONE MAP -->









          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


    </div>
  </div>

        <?php endif; ?>
    <!--/////KRAJ FEEEDA-->

    <div class="footer mt-3">


    </div>





             <!-- MODAL ZA GEOLOKACIJU -->
          <div class="modal fade" id="geolocationmodal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content border-r-15">
                <div class="modal-body text-xs-center border-r-15">
                  <img src="img/delete_post.png" class="mx-auto d-block mb-1" height="100">
                  <h4 style="color: #ff4c4c;">Please allow geolocation<br>in your browser</h4>
                        <div class="form-group mt-1">
                            <button id="delete" data-dismiss="modal" class="form-control btn btn-primary border-r-0">Ok</button>
                          </div>
                  </div>
                </div>
              </div>
            </div>
         <!-- //MODAL ZA GEOLOKACIJU -->


<input type="hidden" id="session_location_coords_lat" name="session_location_coords_lat">
<input type="hidden" id="session_location_coords_lng" name="session_location_coords_lng">



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfg0wQRLzA6BW_PiUDrq-Ab8KbBRU2Gqo&callback=ad_zonemap">
  </script>
  <script type="text/javascript">

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

      <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

        marker_<?php echo e($ad->id); ?> = new google.maps.Marker({
          position: {lat: <?php echo e($ad->ad_location_coords_lat); ?>, lng:<?php echo e($ad->ad_location_coords_lng); ?> },
          icon: marker_icon,
          map: map_zonemap
        });

      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    }

    $('#zonemapmodal').on('shown.bs.modal', function(){
      var currentCenter= map_zonemap.getCenter();  // Get current center before resizing
      google.maps.event.trigger(map_zonemap, "resize");
      map_zonemap.setCenter(currentCenter); // Re-set previous center
    });




    function getUsername()
    {
      $.get('<?php echo e(route("ajaxtest")); ?>', function(data){
        $('#username_ajax').text(data.username);
      });
    }

    setInterval(function() {getUsername()}, 1000);




    $("#errormodal").modal({
  <?php if($errors->any()): ?>
    show:true
  <?php else: ?>
    show:false
  <?php endif; ?>
}); 

  </script>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>