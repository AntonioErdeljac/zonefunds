<!DOCTYPE html>
<html>
<head>
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <!-- Latest compiled and minified CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/zonecustom.css">

    <?php echo $__env->yieldContent('css'); ?>

</head>
<body>

    <?php if(Auth::check()): ?> <!-- provjeravamo dali stranicu preko mobitela pregledava authentificirani korisnik ili gost, te biramo opcije -->



    <!-- SETTINGS ZA MOBITELE 
    <a data-toggle="modal" data-target="#phoneusermodal">
      <div class ="phonesettings hidden-lg-up" style="background-color:#2d89e5">
        <div class="nav-item" style="left: 18px; top:10px; position: relative;">
          <span class="fa fa-user fa-3x" style="color: #fff" id="newpost"></span>
        </div>
      </div>
    </a>
    -->

    <?php else: ?>

    <a data-toggle="modal" data-target="#registermodal">
      <div class ="phonesettings hidden-lg-up" style="background-color:#2d89e5">
        <div class="nav-item" style="left: 14px; bottom:-19px; position: relative;">
          <img src="img/create_account.png" class="rotate" width="40px"></a>
        </div>
      </div>
    </a>



    <a data-toggle="modal" data-target="#loginmodal">
      <div class ="phonepost hidden-lg-up" style="background-color:#2d89e5">
        <div class="nav-item" style="right: -16px; bottom:-14px; position: relative;">
          <img src="img/log_in.png" class="rotate" width="40px">
        </div>
      </div>
    </a>


    <?php endif; ?>








<!-- MODAL ZA PHONE KORISNIKA -->
      <div class="modal fade" id="phoneusermodal" tabindex="" role="" aria-labelledby="phoneusermodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content border-r-15">
            <div class="modal-header border_r_15_only_top" style="background-color: #fff; color:#2d89e5; border-top-left-radius: 15px; border-top-right-radius: 15px;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:#2d89e5;">&times;</span>
              </button>
              <h1 class="modal-title display-5 text-xs-center" id="create_ad_modalLabel"><span class="fa fa-cog fa-1x" style="color: #2d89e5;" ></span><b>&nbsp;Settings</b></h1>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                        <a href="<?php echo e(route('account')); ?>">
                            <button class="form-control btn btn-primary border-r-0 mb-1 mt-1"><i class="fa fa-user fa-fw mr-1" aria-hidden="true"></i>My Profile</button>
                        </a>

                        <a href="<?php echo e(route('account.settings')); ?>">
                            <button class="form-control btn btn-primary border-r-0 mb-1"><i class="fa fa-cogs fa-fw mr-1" aria-hidden="true"></i>Account Settings</button>
                        </a>

                       <a href="<?php echo e(route('logout')); ?>"> <button class="form-control btn btn-primary border-r-0 mb-1"><i class="fa fa-sign-out fa-fw mr-1" aria-hidden="true"></i>Logout</button> 
                       </a>
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
     <!-- //MODAL ZA PHONE KORISNIKA -->












<!--POCETAK MODALA ZA STVARANJE POSTOVA-->
    <?php if(Auth::check()): ?>
    <div class="modal fade" id="create_ad_modal" role="dialog" aria-labelledby="create_ad_modalLabel" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content border-r-15">
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
                  <label for="ad_title" class="color-niceblue" style="padding-left:6px;">Ad Title</label>
                  <input type="text" class="form-control input_focus_change" name="ad_title" placeholder="Nudim popravak računala." value="<?php echo e(Request::old('ad_title')); ?>">
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

    <?php endif; ?>
    <!--/////MODAL ZA STVARANJE POSTOVA-->











    <?php echo $__env->make('include.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('content'); ?>
    




  <!-- Latest compiled and minified JavaScript -->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
    <script src="/js/functions.js"></script>
    <script type="text/javascript" src="/js/location.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
    <script type="text/javascript">
      $('.mobile_search').hide();

    $('.search_button_mobile').on('click', function(){
      console.log('clicked')
      $('.mobile_search').slideToggle()
    });







    $('.phone_settings_options').hide();

    $('.phone_settings').on('click', function(){
      console.log('clicked')
      $('.phone_settings_options').slideToggle()
    });
    </script>
</body>
</html>