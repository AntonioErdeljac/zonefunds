 <!--odabiremo glavni kod u master.blade.php datoteci -->

<!-- odabiremo sekciju odredjenu u glavnom kodu -->

<?php $__env->startSection('title'); ?> 

  ZoneFunds

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>




    <?php if(Auth::check()): ?> <!-- provjeravamo dali stranicu preko mobitela pregledava authentificirani korisnik ili gost, te biramo opcije -->

    <!-- NEW POST ZA MOBITELE -->
    <a style="" data-toggle="modal" data-target="#create_ad_modal"> <!-- koristimo bootstrap sa ugrađenim javascriptom za modale bez preusmjaravanja -->
    <div class ="phonepost hidden-lg-up">
      <div class="nav-item" style="right: -16px; bottom:-14px; position: relative;">
        <img src="img/newpost.png" id="newpost" width="40px">
      </div>
    </div>
    </a>
    <!-- ////NEW POST ZA MOBITELE -->





    <!-- SETTINGS ZA MOBITELE -->
    <div class ="phonesettings hidden-lg-up">
      <div class="nav-item" style="left: 15px; top:10px; position: relative;">
        <img src="img/user_logged_in.png" id="newpost" width="40px"></a>
      </div>
    </div>
    <!-- ///SETTINGS ZA MOBITELE -->

    <?php else: ?>

    <a data-toggle="modal" data-target="#registermodal">
    <div class ="phonesettings hidden-lg-up">
      <div class="nav-item" style="left: 14px; bottom:-19px; position: relative;">
        <img src="img/create_account.png" id="newpost" width="40px"></a>
      </div>
    </div>
    </a>



    <a data-toggle="modal" data-target="#loginmodal">
    <div class ="phonepost hidden-lg-up">
      <div class="nav-item" style="right: -16px; bottom:-14px; position: relative;">
        <img src="img/log_in.png" id="newpost" width="40px">
      </div>
    </div>
    </a>


    <?php endif; ?>








    <!--NORMAL NAVBAR -->
    <div id="navbar_main" class="nav navbar navbar-light bg-faded hidden-md-down <?php echo e(Auth::check() ? '' : 'mb-3'); ?>">
      <div class="container">
        <div class="row">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>" >
              <img src="img/zonefundsheaderreverseall.png" width="180px" class="d-inline-block align-top" alt="">
            </a>

            <div class="navbar-brand float-xs-left" style="padding-top:15px;  border-color: #199cc8 ">
              <form class="form-inline" method="get" id="search">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" name="ad_search" placeholder="Search" style="border-color: #199cc8; border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;">
                    <a  onclick="document.getElementById('search').submit();" class="input-group-addon" style="border-color: #199cc8; border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;">
                      <i class="fa fa-search" id="newpost" style="border-color: #199cc8; color:#199cc8; border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;"></i>
                    </a>
                  </div>
                </div>
              </form>
            </div>

          <?php if(Auth::check()): ?>
            <div class="navbar-brand float-xs-right m-0" style="padding-top:20px;">
            <form class="form form-inline">
                <button type="button" class="form-control btn btn-primary border-r-0" >User</button>
              <a  href="<?php echo e(route('logout')); ?>">
                <button type="button" class="form-control btn btn-primary border-r-0" >Logout</button>
              </a>
              </form>
            </div>
          <?php else: ?>

            <div class="navbar-brand float-xs-right m-0" style="padding-top:8px;">
            <form class="form form-inline">
              <button type="button" class="form-control btn btn-primary border-r-0" id="no_auth_btn" data-toggle="modal" data-target="#loginmodal">Log In</button>
              <button type="button" id="no_auth_btn" class="form-control btn btn-primary border-r-0" data-toggle="modal" data-target="#registermodal">Create An Account</button>
              </form>
            </div>

          <?php endif; ?>

          </div>
        </div>
      </div>
    <!-- ////NORMAL NAVBAR-->




    <!--PHONE NAVBAR (CENTERED HEADER) -->
    <div id="navbar_main" class="nav navbar navbar-light bg-faded hidden-lg-up mb-3">
      <div class="container">
        <a class="navbar-brand" href="#" style="left: 50%; position: relative; transform: translateX(-50%);">
          <img src="img/zonefundsheaderreverseall.png" width="250px" class="d-inline-block" alt="">
        </a>
      </div>
    </div>
    <!--////PHONE NAVBAR (CENTERED HEADER) -->





    <!--NORMAL POST/MESSAGES/SORT -->
    <?php if(Auth::check()): ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-1 hidden-md-down">
          <div class="nav navbar navbar-light mb-3" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">
                    <ul class="nav navbar-nav">
                      <li>
                        <a class="nav-link p-0" data-toggle="modal" data-target="#create_ad_modal">
                        <div class="nav-item p-0">
                          <span class="fa fa-pencil fa-2x" style="color: #fff" id="newpost"></span>
                        </div>
                        </a>
                      </li>
                    </ul>
                </div>
              </div>



        <div class="col-lg-1 float-xs-right hidden-md-down">
          <div class="nav navbar navbar-light mb-3" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">
                    <ul class="nav navbar-nav">
                      <li>
                        <a class="nav-link p-0" data-toggle="modal" data-target=" ">
                        <div class="nav-item p-0">
                        <span class="fa fa-bell fa-2x" style="color: #fff" id="newpost"></span>
                        </div>
                        </a>
                      </li>
                    </ul>
                </div>
              </div>


          </div>
        </div>

    <?php endif; ?>
           
    <!--/////NORMAL POST/MESSAGES/SORT -->

    



    <!--POCETAK MODALA ZA STVARANJE POSTOVA-->
    <?php if(Auth::check()): ?>
    <div class="modal fade" id="create_ad_modal" tabindex="-1" role="dialog" aria-labelledby="create_ad_modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #199cc8; color:white;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color:white;">&times;</span>
            </button>
            <h4 class="modal-title" id="create_ad_modalLabel">Create an ad</h4>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <form action="<?php echo e(route('ad.create')); ?>" method="post" enctype="multipart/form-data">
                      <input type="text" class="form-control mb-1" name="ad_title" placeholder="Nudim popravak računala.">
                    <textarea class="form-control mb-1" rows="5" name="ad_body" placeholder="Popraviti ću bilo koji problem sa računalom ili laptopom, software i hardware."></textarea>
                      <div class="input-group mb-1">
                          <span class="input-group-addon" style="color: #199cc8;"><i class="fa fa-phone fa-fw"></i></span>
                          <input class="form-control" type="text" name="ad_contact" placeholder="111-222-434-2">
                        </div>
                      </div>
                      <div class="input-group mb-1">
                          <span class="input-group-addon" style="color: #199cc8;"><i class="fa fa-money fa-fw"></i></span>
                          <input class="form-control" type="text" name="ad_price" placeholder="100kn">
                        </div>
                      <div class="input-group mb-1">
                          <span class="input-group-addon" style="color: #199cc8;"><i class="fa fa-map-marker fa-fw"></i></span>
                          <input class="form-control" type="text" name="ad_location" placeholder="Rijeka, Croatia">
                        </div>
                      <div class="input-group mb-1">
                          <span class="input-group-addon" style="color: #199cc8;"><i class="fa fa-photo fa-fw"></i></span>
                          <input class="form-control" type="file" name="ad_image" placeholder="Prenesi fotografiju">
                        </div>
                  </div>
                </div>
              </div>
            </div>
          <div class="modal-footer">
            <button type="submit" class="form-control btn btn-primary border-r-0">Publish</button>
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
      <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #199cc8; color:#fff;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: #fff;">&times;</span>
              </button>
              <h4 class="modal-title" id="create_ad_modalLabel">Log In</h4>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <form action="<?php echo e(route('signin')); ?>" method="post">

                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color: #199cc8;"><i class="fa fa-user fa-fw"></i></span>
                          <input class="form-control" type="text" name="username" placeholder="John Doe">
                        </div>

                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color: #199cc8;"><i class="fa fa-key fa-fw"></i></span>
                          <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>

                        <button type="submit" class="form-control btn btn-primary border-r-0">Log In</button>

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
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #199cc8; color:#fff;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
              </button>
              <h4 class="modal-title" id="create_ad_modalLabel">Create An Account</h4>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <form action="<?php echo e(route('signup')); ?>" method="post">
                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color: #199cc8;"><i class="fa fa-user fa-fw"></i></span>
                          <input class="form-control" type="text" name="username" placeholder="John Doe">
                        </div>

                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color: #199cc8;"><i class="fa fa-envelope fa-fw"></i></span>
                          <input class="form-control" type="text" name="email" placeholder="john.doe@example.com">
                        </div>

                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color: #199cc8;"><i class="fa fa-key fa-fw"></i></span>
                          <input class="form-control" type="password" name="password" placeholder="****">
                        </div>

                          <?php if($errors->any()): ?>
                              <div style="background-color: #fff; padding:5px; color:white; margin-bottom: 10px; text-align: center;">
                                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      <p><?php echo e($error); ?></p>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              </div>
                                  <?php endif; ?>

                        <button type="submit" class="form-control btn btn-primary border-r-0">Register</button> 

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











  






    <!--FEED-->
    <div class="container">

      <div class="row">
        <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <div class="col-lg-6 col-xl-4">
            <!--<a data-toggle="modal" data-target="#create_ad_modal2" style="text-decoration:none;">-->
              <div class="card">
                  <img class="card-img-top img-fluid" src="image/<?php echo e($ad->ad_image); ?>" style="border-radius:0px;">
                <div class="card-block">
                  <h4 class="card-title"><?php echo e($ad->ad_title); ?></h4>
                  <p class="card-text"><?php echo e($ad->ad_body); ?></p>
                </div>

                <div class="list-group" style="border-radius: 0px;">
                  <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#199cc8; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad->ad_contact); ?></a>
                  <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#199cc8; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad->ad_price); ?></a>
                  <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#199cc8; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad->ad_location); ?></a>
                  <?php if(Auth::check()): ?>
                    <?php if(Auth::user() == $ad->user): ?>
                      <a href="<?php echo e(route('ad.delete', $ad_id = $ad->id)); ?>">
                        <button type="submit" id="delete" class="form-control btn btn-primary border-r-0">Delete</button>
                      </a>
                    <?php else: ?>
                        <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#199cc8; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad->user['username']); ?></a>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>

              </div>
            <!--</a>-->
          </div>


          <div class="col-md-12 hidden-lg-up" style="background-color:#fff">

            <hr>

          </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

    </div>

    <!--/////KRAJ FEEEDA-->


<style type="text/css">
body{
  background-color: #f7f7f7;
}

.btn-user{
  background-color: none;
  color: #fff;
}

.form-control{
  border-radius:0px;
}

.input-group-addon{
  border-radius: 0px;
}

#delete{
  transition: .2s;
  background-color: #ff4c4c;
  border-color: #ff4c4c;
}


#delete:hover{
  background-color:#fff;
  color:#ff4c4c;
  border-color:#ff4c4c;

}

#delete:focus{
  background-color:#fff;
  color:#ff4c4c;
  border-color:#ff4c4c;

}

#no_auth_btn
{
  transition: .2s;
  background-color: #199cc8 ;
  border-radius:0px;
  border-color: #199cc8;
  color:#fff;
  margin-top:10px;
}

#no_auth_btn:hover
{
  background-color: #fff ;
  border-radius:0px;
  border-color: #199cc8;
  color:#199cc8;
}

#no_auth_btn:focus
{
  background-color: #fff ;
  border-radius:0px;
  border-color: #199cc8;
  color:#199cc8;
}

.btn-primary{
  transition: .2s;
  background-color: #199cc8 ;
  border-radius:0px;
  border-color: #199cc8;
  color: #fff;
}


.btn-primary:hover{
  background-color:#fff;
  color:#199cc8;
  border-color:#199cc8;

}

.btn-primary:focus{
  background-color:#fff;
  color:#199cc8;
  border-color:#199cc8;

}


a{
  text-decoration:none;
  cursor: pointer;
}

.phonepost{
  width: 70px; 
  height: 70px; 
  background: #fff; 
  -moz-border-radius: 50px; 
  -webkit-border-radius: 50px; 
  border-radius: 50px;
  position:fixed !important; 
  bottom: 0 !important;
  right: 0 !important;
  margin-right: 10px;
  margin-bottom: 10px !important;
  z-index: 1 !important; 
  box-shadow: 0 1px 3px rgba(0,0,0,.5);
}


.phonesettings{
  width: 70px; 
  height: 70px; 
  background: #fff; 
  -moz-border-radius: 50px; 
  -webkit-border-radius: 50px; 
  border-radius: 50px;
  position:fixed !important; 
  bottom: 0 !important;
  left: 0 !important;
  margin-left: 10px;
  margin-bottom: 10px !important;
  z-index: 1 !important; 
  box-shadow: 0 1px 3px rgba(0,0,0,.5);
}


#newpost{
  transition: transform .9s;
}

#newpost:hover{
  -webkit-transform: rotate(360deg);
          transform: rotate(360deg);

}


.input-group-addon{
  background-color: #fff;
  border-left-style: hidden;
}



.input-group{
  border-radius:0px;
}

.list-group-item
{
    border-radius:0px;
}

#test{
  border-radius:0px;
  width:200px;
}

.card{
  box-shadow: 0 1px 3px rgba(0,0,0,.2);
  transition: .2s;
  border-radius: 0px;
}

.card:hover{
  cursor: pointer;
}

#navbar_main{
  background-color: #fff;
  box-shadow: 0 1px 3px rgba(0,0,0,.2);
  border-radius: 0px;
}

#navbar_small{
  background-color: #199cc8;
  box-shadow: 0 1px 3px rgba(0,0,0,.2);
}

  #sidebar{
    height:100vh;
    width:200px;

  }

#search_top{
  transition: .5s;
  width: 70%; 
  border-color: #199cc8; 
  border-style: solid;
  border-top-style: hidden; 
  border-left-style: hidden;
  border-right-style: hidden;
}

#search_top:focus{
  width: 100%; 
  border-color: #199cc8; 
  border-style: solid;
  border-top-style: hidden; 
  border-left-style: hidden;
  border-right-style: hidden;
}



</style>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script type="text/javascript">
    $("#registermodal").modal({
      <?php if($errors->any()): ?>
        show:true
      <?php else: ?>
        show:false
      <?php endif; ?>
    }); 
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>