 <!--odabiremo glavni kod u master.blade.php datoteci -->

<!-- odabiremo sekciju odredjenu u glavnom kodu -->

<?php $__env->startSection('title'); ?> 

  ZoneFunds

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!--<?php 
      var_dump($errors);
    ?>-->


    <?php if(Auth::check()): ?> <!-- provjeravamo dali stranicu preko mobitela pregledava authentificirani korisnik ili gost, te biramo opcije -->

    <!-- NEW POST ZA MOBITELE -->
    <a style="" data-toggle="modal" data-target="#create_ad_modal"> <!-- koristimo bootstrap sa ugrađenim javascriptom za modale bez preusmjaravanja -->
    <div class ="phonepost hidden-lg-up" style="background-color:#2d89e5">
      <div class="nav-item" style="right: -14px; bottom:-12px; position: relative;">
        <span class="fa fa-pencil fa-3x" style="color: #fff" id="newpost"></span>
      </div>
    </div>
    </a>
    <!-- ////NEW POST ZA MOBITELE -->





    <!-- SETTINGS ZA MOBITELE -->
    <a data-toggle="modal" data-target="#phoneusermodal">
      <div class ="phonesettings hidden-lg-up" style="background-color:#2d89e5">
        <div class="nav-item" style="left: 18px; top:10px; position: relative;">
          <span class="fa fa-user fa-3x" style="color: #fff" id="newpost"></span>
        </div>
      </div>
    </a>
    <!-- ///SETTINGS ZA MOBITELE -->

    <?php else: ?>

    <a data-toggle="modal" data-target="#registermodal">
    <div class ="phonesettings hidden-lg-up" style="background-color:#2d89e5">
      <div class="nav-item" style="left: 14px; bottom:-19px; position: relative;">
        <img src="img/create_account.png" id="newpost" width="40px"></a>
      </div>
    </div>
    </a>



    <a data-toggle="modal" data-target="#loginmodal">
    <div class ="phonepost hidden-lg-up" style="background-color:#2d89e5">
      <div class="nav-item" style="right: -16px; bottom:-14px; position: relative;">
        <img src="img/log_in.png" id="newpost" width="40px">
      </div>
    </div>
    </a>


    <?php endif; ?>



    <!--NORMAL POST/MESSAGES/SORT -->
    <?php if(Auth::check()): ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-1 hidden-md-down">
          <div class="nav navbar navbar-light mb-3 navbar-brand" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">
            <a class="nav-link p-0" data-toggle="modal" data-target="#create_ad_modal">
            <div class="nav-item p-0">
              <span class="fa fa-edit fa-2x" style="color: #fff; padding-left:10px; padding-top: 5px; padding-bottom: 5px;" id="newpost"></span>
            </div>
            </a>
          </div>
        </div>



        <!--<div class="col-lg-1 offset-lg-10 hidden-md-down">
          <div class="nav navbar navbar-light mr-2 mb-3 navbar-brand" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">
            <a class="nav-link p-0" data-toggle="modal" data-target=" ">
              <div class="p-0">
                <span class="fa fa-bell fa-2x" style="color: #fff" id="newpost"></span>
              </div>
            </a>
          </div>
        </div>-->


      </div>
    </div>

    <?php endif; ?>
           
    <!--/////NORMAL POST/MESSAGES/SORT -->

    



    <!--POCETAK MODALA ZA STVARANJE POSTOVA-->
    <?php if(Auth::check()): ?>
    <div class="modal fade" id="create_ad_modal" tabindex="-1" role="dialog" aria-labelledby="create_ad_modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content border-r-15">
          <div class="modal-header" style="background-color: #fff; color:white; border-top-right-radius:15px; border-top-left-radius: 15px;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color:#2d89e5;">&times;</span>
            </button>
            <h4 class="modal-title" id="create_ad_modalLabel"><b style="color: #2d89e5;"><span class="fa fa-edit fa-1x" style="color: #2d89e5;" ></span>&nbsp; Create an ad</b></h4>
          </div>
          <div class="modal-body">
                  <div class="form-group" style="">
                    <form action="<?php echo e(route('ad.create')); ?>" method="post" enctype="multipart/form-data">

                      <div class="mb-3">
                        <label for="ad_title" style="padding-left:6px; color: #2d89e5;">Ad Title:</label>
                        <input type="text" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;" class="form-control" name="ad_title" placeholder="Nudim popravak računala." value="<?php echo e(Request::old('ad_title')); ?>">
                      </div>

                      <div class="mb-3">
                        <label for="ad_body" style="padding-left:6px; color: #2d89e5;">Ad Description:</label>
                        <textarea  style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;" class="form-control" id="textarea_create" rows="5" name="ad_body" placeholder="Popraviti ću bilo koji problem sa računalom ili laptopom, software i hardware."><?php echo e(Request::old('ad_body')); ?></textarea>
                      </div>

                      <div class="input-group mb-3">
                          <span class="input-group-addon borderless_input"><i class="fa fa-phone fa-fw"></i></span>
                          <input class="form-control" type="number" name="ad_contact" placeholder="111-222-434-2" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;" value="<?php echo e(Request::old('ad_contact')); ?>">
                      </div>

                      <div class="input-group mb-3">
                          <span class="input-group-addon borderless_input"><i class="fa fa-money fa-fw"></i></span>
                          <input class="form-control" type="number" name="ad_price" placeholder="100" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;" value="<?php echo e(Request::old('ad_price')); ?>">
                        </div>

                        <div class="input-group mb-3">
                          <span class="input-group-addon borderless_input"><i class="fa fa-map-marker fa-fw"></i></span>
                          <input class="form-control" id="ad_location" type="hidden" name="ad_location" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                          <input class="form-control" id="ad_see_location" type="text" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;" disabled>
                        </div>

                      <div class="input-group mb-3">
                          <span class="input-group-addon borderless_input"><i class="fa fa-photo fa-fw"></i></span>
                          <input class="form-control borderless_input" type="file" name="ad_image" placeholder="Prenesi fotografiju">
                        </div>

            <button type="submit" class="form-control btn btn-primary mt-2" style="border-radius:15px;">Publish</button>
            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <?php endif; ?>
    <!--/////MODAL ZA STVARANJE POSTOVA-->




    






<!-- MODAL ZA LOGIN -->
      <div class="modal fade" style="border-radius:15px;" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
        <div class="modal-dialog border-r-15" role="document">
          <div class="modal-content border-r-15">
            <div class="modal-header border-r-15" style="background-color: #fff; color:#2d89e5; border-bottom-style: hidden;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: #000;">&times;</span>
              </button>
              <img class="mx-auto d-block mb-1" height="100" src="img/location.png" />
              <h4 class="modal-title text-xs-center">Welcome back!</h4>
            </div>
            <div class="modal-body" style="border-radius:15px;">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <form action="<?php echo e(route('signin')); ?>" method="post">

                        <div class="input-group mb-1 input_form">
                          <span class="input-group-addon input_form"><i class="fa fa-envelope fa-fw"></i></span>
                          <input class="form-control input_form" type="text" name="email" placeholder="john.doe@example.com" value="<?php echo e(Request::old('email')); ?>">
                        </div>

                        <div class="input-group mb-1 input_form">
                          <span class="input-group-addon input_form"><i class="fa fa-key fa-fw"></i></span>
                          <input class="form-control input_form" type="password" name="password" placeholder="Password">
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
        <div class="modal-dialog" role="document" style="border-radius: 15px;">
          <div class="modal-content" style="border-radius: 15px;">
            <div class="modal-header" style="background-color: #fff; color:#2d89e5; border-bottom-style:hidden; border-radius: 15px;">
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
                          <input class="form-control" type="text" name="username" placeholder="John Doe" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;" value="<?php echo e(Request::old('username')); ?>">
                        </div>

                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-envelope fa-fw"></i></span>
                          <input class="form-control" type="text" name="email" placeholder="john.doe@example.com" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;" value="<?php echo e(Request::old('email')); ?>">
                        </div>

                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-key fa-fw"></i></span>
                          <input class="form-control" type="password" name="password" placeholder="****" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
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










<!-- MODAL ZA PHONE KORISNIKA -->
      <div class="modal fade" id="phoneusermodal" tabindex="" role="" aria-labelledby="phoneusermodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #2d89e5; color:#fff;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
              </button>
              <h4 class="modal-title" id="create_ad_modalLabel"><b>Settings</b></h4>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                        <button class="form-control btn btn-primary border-r-0 mb-1 mt-1"><i class="fa fa-user fa-fw mr-1" aria-hidden="true"></i>My Profile</button>

                        <button class="form-control btn btn-primary border-r-0 mb-1"><i class="fa fa-cog fa-fw mr-1" aria-hidden="true"></i>Account Settings</button>

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

























<?php echo $__env->yieldContent('odabrani_ad'); ?>

  






    <!--FEED-->
    <div class="container" id="feed">
      <div class="row">

        <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

          <div class="col-lg-12 hidden-lg-up" style="background-color:#f7f7f7">

            <hr>

          </div>

          <div class="col-xl-4 my-1">
            <!--<a data-toggle="modal" data-target="#create_ad_modal2" style="text-decoration:none;">-->
              <a href="<?php echo e(route('ad.show', $ad->id)); ?>" style="text-decoration: none;">
                <div class="card" style="border-style:none;">
                    <img class="card-img-top img-fluid" src="image/<?php echo e($ad->ad_image); ?>" style="border-top-right-radius:15px; border-top-left-radius: 15px;">
                  <div class="card-block" style="border-style:none;">
                    <h4 class="card-title"><?php echo e(str_limit($ad->ad_title, 24)); ?></h4>
                    <p class="card-text"><?php echo e(str_limit($ad->ad_body, 50)); ?></p>
                  </div>

                  <div class="list-group" style="border-radius: 0px;">
                    <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="callto:<?php echo e($ad->ad_contact); ?>"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad->ad_contact); ?></a>
                    <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad->ad_price); ?></a>
                    <a class="list-group-item" style="<?php echo e(Auth::check() ? 'border-radius:0px;' : 'border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;'); ?> text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad->ad_location); ?></a>
                    <?php if(Auth::check()): ?>
                      <?php if(Auth::user() == $ad->user): ?>
                        <a href="<?php echo e(route('ad.delete', $ad_id = $ad->id)); ?>" id="delete" class="list-group-item text-xs-center no_decoration" href="#">Delete</a>
                      <?php else: ?>
                          <a class="list-group-item" style="border-radius: 15px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i><i>&nbsp; Posted by <?php echo e($ad->user['username']); ?></i></a>
                      <?php endif; ?>
                    <?php endif; ?>
                  </div>

                </div>
            </a>
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

    </div>
  </div>

    <!--/////KRAJ FEEEDA-->

    <div class="footer mt-3">


    </div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script type="text/javascript" src="/js/location.js"></script>
  <script type="text/javascript">

    $("#errormodal").modal({
      <?php if($errors->any()): ?>
        show:true
      <?php else: ?>
        show:false
      <?php endif; ?>
    }); 

   /* $('.delete').on('submit', function(){
      return confirm('Are you sure?');
    });*/
    $('#feed').hide();
    $('#feed').fadeIn(1000);
    $(document).ready();
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>