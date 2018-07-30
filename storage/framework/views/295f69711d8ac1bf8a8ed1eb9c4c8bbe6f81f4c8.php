<!DOCTYPE html>
<html>
<head>
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <!-- Latest compiled and minified CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/zonecustom.css">

    <?php echo $__env->yieldContent('css'); ?>

</head>
<body>
    <?php echo $__env->make('include.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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




    <?php endif; ?>









                    <!-- MODAL ZA ZONE MAP -->
            <div class="modal fade" id="locationmodal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content border-r-15">
                  <div class="modal-body text-xs-center border-r-15 color-niceblue">
                    <h1 class="display-5">Vaša Lokacija:</h4>
                      <h2 class="display-5" style="<?php echo e($api == 'da' ? 'color:#E54444;' : ''); ?>"><i class="fa fa-map-marker" style="padding-right: 10px; <?php echo e($api == 'da' ? 'color:#E54444;' : ''); ?>"></i><?php echo e($city); ?></h2>
                    <hr>
                    <h5 style="color: #E54444;"><?php echo e($api == 'da' ? 'Molimo dopustite geolokaciju u vašem pregledniku' : ''); ?></h5>
                    <form action="<?php echo e(route('refreshsession')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <button type="submit" class="form-control btn btn-primary btn-lg mt-2" style="border-radius:5px;">Osvježi Lokaciju</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <!-- //MODAL ZA ZONE MAP -->





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













    <!--/////MODAL ZA STVARANJE POSTOVA-->








































<!-- MODAL ZA LOGIN -->
      <div class="modal fade" style="border-radius: 5px;" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
        <div class="modal-dialog border-r-15" role="document">
          <div class="modal-content border-r-15">
            <div class="modal-header border-r-15" style="background-color: #fff; color:#2d89e5; border-bottom-style: hidden;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: #000;">&times;</span>
              </button>
              <img class="mx-auto d-block mb-1" height="100" src="img/location.png" />
              <h4 class="modal-title text-xs-center">Dobrodošli Natrag!</h4>
            </div>
            <div class="modal-body" style="border-radius: 5px;">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <form action="<?php echo e(route('signin')); ?>" method="post">

                        <div class="input-group mb-1">
                          <input class="form-control input_form input_focus_change" type="text" name="email" placeholder="john.doe@example.com" value="<?php echo e(Request::old('email')); ?>">
                        </div>

                        <div class="input-group mb-1">
                          <input class="form-control input_form input_focus_change" type="password" name="password" placeholder="Password">
                        </div>

                        <button type="submit" class="form-control btn btn-primary border-r-15">Prijavite se</button>

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
              <h4 class="modal-title text-xs-center" id="create_ad_modalLabel">Pridružite se!</h4>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <form action="<?php echo e(route('signup')); ?>" method="post">
                        <div class="input-group mb-1">
                          
                          <input class="form-control input_focus_change" type="text" name="username" placeholder="John Doe" style="<?php echo e($errors->has('username') ? 'border-color: red; color:red;' : 'border-color: #f0f0f0; border-radius:5px; background-color:#f7f7f7;'); ?>" value="<?php echo e(Request::old('username')); ?>">
                        </div>

                        <div class="input-group mb-1">
                          <input class="form-control input_focus_change" type="text" name="email" placeholder="john.doe@example.com" style="<?php echo e($errors->has('email') ? 'border-color: red; color:red;' : 'border-color: #f0f0f0; border-radius:5px; background-color:#f7f7f7;'); ?>" value="<?php echo e(Request::old('email')); ?>">
                        </div>

                        <div class="input-group mb-1">
                      
                          <input class="form-control input_focus_change" type="password" name="password" placeholder="****" style="<?php echo e($errors->has('password') ? 'border-color: red; color:red;' : 'border-color: #f0f0f0; border-radius:5px; background-color:#f7f7f7;'); ?>">
                        </div>

                          <!--<?php if($errors->any()): ?>
                              <div style="background-color: #fff; padding:5px; color:#2d89e5; margin-bottom: 10px; text-align: center;">
                                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      <p><?php echo e($error); ?></p>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              </div>
                                  <?php endif; ?>-->

                        <button type="submit" class="form-control btn btn-primary border-r-0">Registrirajte se</button> 

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

















<div class="container">
<div id="createmodal" class="overlay text-xs-center">
    <form id="createad_form" action="<?php echo e(route('ad.create')); ?>"  method="POST" enctype="multipart/form-data" class="form-control bg-color-niceblue" style="border-style:none;">
        
          <div class="row">
            <div class="col-lg-4 offset-lg-4">
        <div id="title">
            <input type="text" class="mb-1 ad_create form-control" name="ad_title_d" style="background-color:#2d89e5;" placeholder="Naslov oglasa" />

        </div>
        
        <div id="body" class="">

            <textarea type="text" class="mb-1 ad_textarea form-control" name="ad_body_d" style="background-color:#2d89e5;" placeholder="Opis oglasa"></textarea>
        </div>
        <div id="contact" class="">
            <input type="number" class="mb-1 ad_create form-control" name="ad_contact_d" style="background-color:#2d89e5;" placeholder="Kontakt" />
        </div>
        <div id="price" class="">
            <input type="number" class="mb-1 ad_create form-control" name="ad_price_d" style="background-color:#2d89e5;" placeholder="Cijena" />
        </div>
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
        <div id="final" class="">
          <div >
            <input type="text" id="final_title" class="mb-1 ad_create form-control" style="background-color:#2d89e5;" name="ad_title" placeholder="Naslov oglasa"/>
          </div>
          <div>
            <textarea type="text" id="final_body" class="mb-1 ad_textarea form-control" style="background-color:#2d89e5;" name="ad_body" placeholder="Opis oglasa"></textarea>
          </div>
          <div>
              <input type="number" id="final_contact" class="mb-1 ad_create form-control" style="background-color:#2d89e5;" name="ad_contact" placeholder="Kontakt" />
          </div>
          <div >
              <input type="number" id="final_price" class="mb-1 ad_create form-control" style="background-color:#2d89e5;" name="ad_price" placeholder="Cijena" />
          </div>
        </div>

        <a style="" ><button type="button" id="next" style="cursor:pointer; outline: none;border-radius: 50%; border-color:#fff; border-style:solid; border-width:3px;width: 50px; height: 50px;  background-color: #2d89e5;" class="rotate_half"><i class="fa fa-check" style="color:#fff; "></i></button></a>


        <a style="" clas><button type="button" id="close" style="cursor:pointer; outline: none;border-radius: 50%; border-color:#fff; border-style:solid; border-width:3px;width: 50px; height: 50px;  background-color: #2d89e5;" class="rotate_half"><i class="fa fa-times" style="color:#fff; "></i></button></a>

        <?php echo e(csrf_field()); ?>


        </div>
        </div>
        
    </form>
    </div>
</div>


























	<?php echo $__env->yieldContent('content'); ?>
    

            <!-- MODAL ZA ERRORE -->
            <div class="modal fade" id="errormodal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content border-r-15">
                  <div class="modal-body text-xs-center border-r-15">
                    <img src="img/delete_post.png" class="mx-auto d-block mb-1" height="100">
                   
                    <h4 style="color: #ff4c4c;">Please try again by<br>providing the correct information</h4>
                     <?php if($errors->any()): ?>
                     <hr>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div style="color: #ff4c4c;">
                        <p><?php echo e($error); ?></p>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endif; ?>
                          <div class="form-group mt-1">
                              <button id="delete" data-dismiss="modal" class="form-control btn btn-primary border-r-0">Ok</button>
                            </div>
                    </div>
                  </div>
                </div>
              </div>
           <!-- //MODAL ZA ERRORE -->



  <!-- Latest compiled and minified JavaScript -->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
    <script src="/js/functions.js"></script>
    <script type="text/javascript" src="/js/location.js"></script>
    <script type="text/javascript" src="/js/jQueryRotate.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
    
    <script type="text/javascript">
      $(document).ready(function()
        {
          $('#uploadinput').on('change',function(){
            $('#uploadphoto').removeClass('fa-photo').addClass('fa-check');
          });

          $('.overlay').hide();

          $('.fa-edit').click(function()
          {
            $('.overlay').css({ opacity: 1 },1500);
            $('.overlay').css('visibility', 'visible');
            $('.overlay').slideDown(700);
          });

          $('.fa-pencil').click(function()
          {
            $('.overlay').css({ opacity: 1 },1500);
            $('.overlay').css('visibility', 'visible');
            $('.overlay').slideDown(700);
          });

          $('#close').click(function()
          {
            $('#createmodal').slideUp(700);
            //$('#createmodal').css({ opacity: 0 },1500);
            
          });

          $('#next').click(function()
          {
            
            if($('#title').is(':visible'))
            {
              $('#title').animate({width:'toggle'}, 500);
              setTimeout(function(){
              $('#body').fadeIn(800);
              },0);
            }
            else if($('#body').is(':visible'))
            {
              $('#body').animate({width:'toggle'}, 500);
              setTimeout(function(){
              $('#contact').fadeIn(720);
              },100);
            }
            else if($('#contact').is(':visible'))
            {
              $('#contact').animate({width:'toggle'}, 500);
              setTimeout(function(){
              $('#price').fadeIn(720);
              },100);
            }
            else if($('#price').is(':visible'))
            {
              $('#price').animate({width:'toggle'}, 500);
              setTimeout(function(){
              $('#image').fadeIn(720);
              },100);
            }
            else if($('#image').is(':visible'))
            {
              $('#final_title').val(document.forms["createad_form"]["ad_title_d"].value);
              $('#final_body').val(document.forms["createad_form"]["ad_body_d"].value);
              $('#final_contact').val(document.forms["createad_form"]["ad_contact_d"].value);
              $('#final_price').val(document.forms["createad_form"]["ad_price_d"].value);
              $('#image').animate({width:'toggle'}, 500);
              setTimeout(function(){
              $('#final').fadeIn(200);
              },100);
            }
      
            else if($('#final_title').val().length > 0 && $('#final_body').val().length > 0 && $('#final_contact').val().length > 0 && $('#final_price').val().length > 0)
          {
              $(this).fadeOut();
              $('#close').fadeOut();
              $('#final').fadeOut();
              $('#createad_form').submit();
          }

            /*setTimeout(function(){
                $('#price').fadeOut(200);
                $('#image').fadeIn(200);
                $('#close').fadeOut(200);
                setTimeout(function()
                {
                  $('#createad_form').submit();
                }, 1000);
              },1000);*/



            

            
          });
          
          <?php if(Auth::check()): ?>
            //$('#notifications_mobile').hide();
            console.log('<?php echo e($ad_count); ?>');
              function getNotifications()
              {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                  }
                });

                $.ajax({
                  type: 'POST',
                  url: '<?php echo e(route("postNotifications")); ?>',
                  success: function(data)

                  {
                    console.log(data.user_money);
                    console.log(<?php echo e($user_money); ?>);
                    if(<?php echo e($ad_count); ?> != data.notif || <?php echo e($user_money); ?> != data.user_money)
                    {
                      if(data.notif != <?php echo e($ad_count); ?>)
                      {
                        new_notifications = data.notif - <?php echo e($ad_count); ?>;
                      }
                      
                      if(data.user_money != <?php echo e($user_money); ?>)
                      {
                        console.log('tu smo');
                        new_notifications = new_notifications + 1;
                        console.log(new_notifications);
                      }
                      if(new_notifications > 0)
                      {
                        $('#notifikacije').removeClass('fa-bell-o').addClass('fa-bell')
                        $('#notifikacije_m').removeClass('fa-bell-o').addClass('fa-bell')
                        $('#badge').addClass('badge').html(new_notifications);
                        $('#badge_m').addClass('badge_m').html(new_notifications);
                        if(new_notifications == 1)
                        {
                          $('#notif_show').html('<a href="<?php echo e(route("home")); ?>">'+new_notifications+'&nbsp;Novi Oglas</a>');
                        }
                        else
                        {
                          $('#notif_show').html('<a href="<?php echo e(route("home")); ?>">'+new_notifications+'&nbsp;Nova Oglasa</a>');
                        }


                        

                        $('#notif_sound').get(0).play();
                        setTimeout(function()
                          {
                            $('#notif_sound').attr("src", "");
                          },3000)
                        
                        //$('#notifikacije').html(data.notif)
                        console.log(data.notif);
                      }
                      
                    }

                  }
                });
              }

              setInterval(function()
                {
                  getNotifications();
                }, 5000);
            <?php endif; ?>

          /*if($('#notifikacije').hasClass('fa-bell'))
          {
            $('#notifikacije').click(function(){location.href="<?php echo e(route('home')); ?>"});
          }*/

          $('.mobile_search').hide();
          $('#createad_mobile').hide();

          $('#start_mobilead_create').click(function(){
            $('#createad_mobile').height('100vh');
            $('#createad_mobile').width('100vw');
            $('#createad_mobile').slideToggle();
          });

          $('.search_button_mobile').on('click', function(){
            console.log('clicked')
            $('.phone_settings_options').slideUp();
            $('.mobile_search').slideToggle();
            $('.mobile_search').css('opacity','1');
          });

          $('.phone_settings_options').hide();

          $('.phone_settings').on('click', function(){
            console.log('clicked')
            $('.mobile_search').slideUp()
            $('.phone_settings_options').slideToggle()
            $('.phone_settings_options').css('opacity', '1');
          });

          $('#loadnav').hide();
          $('#loadnav').show();
          $('#loadnav').animate({width: '100%'});
          $('#loadnav').fadeOut(800);
          console.log('SESSION:'+$('#session_city').val(), 'LOKALNO:'+$('#ad_see_location_m').val());
          if($('#session_city').val() != $('#ad_see_location_m').val())
          {
            //window.location.replace("/welcome");
            
          }

         
        });
      
    </script>
</body>
</html>