    <audio id="notif_sound" src="sounds\notif.mp3" type="audio/mp3"></audio>
       <!--NORMAL NAVBAR -->
    <nav id="loadnav" class="nav bg-color-niceblue navbar-fixed-top hidden-md-down" style="background-color:#2d89e5; height:2px;">

      </nav>
    <!-- ////NORMAL NAVBAR-->


    <!--NORMAL NAVBAR -->
    <div id="navbar_main" class="nav navbar navbar-light bg-faded hidden-md-down">
      <div class="container">
        <div class="row">
            <a class="navbar-brand float-xs-left" href="<?php echo e(route('home')); ?>" >
              <img src="img/zonefundsheaderreverseall.png" width="180px" class="opacity_on_hover d-inline-block align-top" alt="">
            </a>

            <div class="navbar-brand float-xs-left" style="padding-top:15px;  border-color: #2d89e5 ">
              <form class="form-inline" method="get" action="<?php echo e(route('home')); ?>" id="search">
                <div class="form-group opacity_on_hover">
                  <div class="input-group">
                    <input type="text" class="form-control" name="ad_search" placeholder="Pretraži" id="search_top" value="<?php echo e($ad_search); ?>">
                    <a  onclick="document.getElementById('search').submit();">
                    </a>
                  </div>
                </div>
                <select name="ad_sort" class=" form-control opacity_on_hover" id="sort_options" onchange="form.submit()">

             <option value="recent" <?php echo e($ad_sort == 'recent' ? 'selected' : ''); ?> class="">Najnovije</option>
             <option value="high" <?php echo e($ad_sort == 'high' ? 'selected' : ''); ?> class="">Cijena: Najviša</option>
             <option value="low" <?php echo e($ad_sort == 'low' ? 'selected' : ''); ?> class="">Cijena: Najniža</option>
           </select>
              </form>
            </div>

            

          <?php if(Auth::check()): ?>
            <ul class="nav navbar-nav navbar-brand float-xs-right" style="padding-top: 15px;" id="zonefunds-navbar">
              <li class="nav-item dropdown color-niceblue" id="dropdown-nav">
                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o" id="notifikacije" style="margin-top:13px;"><span id="badge" class=""></span>
                </i></a>
                <div class="border-r-15 dropdown-menu dropdown-menu-right" id="dropdown_nav" style="box-shadow: 0 1px 3px rgba(0,0,0,.2);">
                  <a class="dropdown-item color-niceblue" style="color: #2d89e5;" id="notif_show">Nema Obavijesti</a>
                </div>
              </li>


              <li class="nav-item dropdown color-niceblue" id="dropdown-user">
                <a style="color:#2d89e5;" class="nav-link dropdown-toggle opacity_on_hover"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle fa-fw color-niceblue" aria-hidden="true" id="dropdown-user"></i>
                  <span class="color-niceblue"><?php echo e($user->username); ?></span>
                </a>
                <div class="border-r-15 dropdown-menu dropdown-menu-right" id="dropdown_account" style="box-shadow: 0 1px 3px rgba(0,0,0,.2);">
                  <a class="dropdown-item color-niceblue" href="<?php echo e(route('account')); ?>" style="color: #2d89e5;"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Moj Profil</a>
                  <a class="dropdown-item color-niceblue" href="<?php echo e(route('account.settings')); ?>" style="color: #2d89e5;"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>Postavke Računa</a>
                  <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" style="color:#2d89e5;"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Odjava</a>
                </div>
              </li>
            </ul>
          <?php else: ?>

            <div class="nav navbar-nav navbar-brand float-xs-right" style="padding-top:8px;">
              <form class="form form-inline">
                <button type="button" class="form-control btn" id="no_auth_btn_register" data-toggle="modal" data-target="#loginmodal">Prijava</button>


                <button type="button" id="registerbutton" class="form-control btn btn-primary" data-toggle="modal" data-target="#registermodal">Registracija</button>
              </form>
            </div>

          <?php endif; ?>

          </div>
        </div>
      </div>
    <!-- ////NORMAL NAVBAR-->




    <!--PHONE NAVBAR (CENTERED HEADER) -->
    <nav id="navbar_down" class="navbar navbar-fixed-top hidden-lg-up mb-3" style="text-align: center;">

  
                <i class="fa fa-search fa-2x search_button_mobile float-xs-left" style="color:#2d89e5"></i>

                <ul class="nav nav-center">
                  <li><a data-toggle="modal" data-target="#locationmodal" ><i class="fa fa-map-marker fa-2x" style="color: <?php echo e($api == 'da' ? '#E54444;' : '#2d89e5;'); ?>"></i></a></li>
                </ul>

                <i class="fa fa-bars fa-2x phone_settings float-xs-right" id="settings_mobile" style="color:#2d89e5"></i>


        </nav>




            <nav id="navbar_down" class="navbar navbar-fixed-bottom hidden-lg-up" style="text-align: center;">

                <?php if(Auth::check()): ?>
                  <a href="<?php echo e(route('home')); ?>">
                    <i class="fa fa-bell-o fa-2x float-xs-left" id="notifikacije_m"><span id="badge_m" class=""></span></i>
                  </a>
                <?php else: ?>
                  <a data-toggle="modal" data-target="#loginmodal">
                    <i class="fa fa-user fa-2x phone_settings float-xs-left" id="settings_mobile" style="color:#2d89e5"></i>
                  </a>
                <?php endif; ?>


                <ul class="nav nav-center">
                  <?php if(Auth::check()): ?>
                    <i class="fa fa-pencil fa-2x" id="click_ad" style="color:#2d89e5"></i>
                  <?php else: ?>
                    <?php if(Request::url() != route('home')): ?>
                      <a href="<?php echo e(route('home')); ?>">
                        <i class="fa fa-arrow-circle-left fa-2x" id="click_ad" style="color:#2d89e5"></i>
                      </a>
                    <?php else: ?>
                      <a data-toggle="modal" data-target="#zonemapmodal">
                        <i class="fa fa-globe fa-2x" id="click_ad" style="color:#2d89e5"></i>
                      </a>
                    <?php endif; ?>
                  <?php endif; ?>
                </ul>

                <?php if(Auth::check()): ?>
                  <?php if(Request::url() != route('home')): ?>
                    <a href="<?php echo e(route('home')); ?>">
                        <i class="fa fa-arrow-circle-left float-xs-right fa-2x" id="click_ad" style="color:#2d89e5"></i>
                    </a>     
                  <?php else: ?>

                    <a data-toggle="modal" data-target="#zonemapmodal">
                      <i class="fa fa-globe fa-2x float-xs-right" id="" style="color:#2d89e5"></i>
                    </a>
                  <?php endif; ?>

                <?php else: ?>
                  <a data-toggle="modal" data-target="#registermodal">
                    <i class="fa fa-user-plus fa-2x float-xs-right" style="color:#2d89e5"></i>
                  </a>
                <?php endif; ?>


        </nav>
              
    





    <nav id="" class="navbar navbar-fixed-top hidden-lg-up mobile_search dropdown_mobile" style="top:45px; background-color: #f0f0f0">
          <form method="get" action="<?php echo e(route('home')); ?>" id="search">
                <div class="form-group " style="background-color: #f0f0f0">
                    <input type="text" class="form-control opacity_on_hover" name="ad_search" placeholder="Pretraži" id="search_mobile" value="<?php echo e($ad_search); ?>">
                    <select name="ad_sort" class="borderless form-control opacity_on_hover" id="sort_options" onchange="form.submit()" style="background-color: #f0f0f0; color: #2d89e5;">

             <option value="recent" <?php echo e($ad_sort == 'recent' ? 'selected' : ''); ?> class="">Najnovije</option>
             <option value="high" <?php echo e($ad_sort == 'high' ? 'selected' : ''); ?> class="">Cijena: Najviša</option>
             <option value="low" <?php echo e($ad_sort == 'low' ? 'selected' : ''); ?> class="">Cijena: Najniža</option>
           </select>
                </div>
              </form>
                  
    </nav>









    <nav id="" class="navbar navbar-fixed-top hidden-lg-up phone_settings_options opacity_0 dropdown_mobile" style="top:45px; background-color: #f0f0f0">
          <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                        <a href="<?php echo e(route('home')); ?>">
                            <button class="form-control btn btn-primary border-r-0"><i class="fa fa-home fa-fw mr-1" aria-hidden="true"></i>Početna</button>
                        </a>

                        <?php if(Auth::check()): ?>

                          <hr style="background-color: #fff">

                          <a href="<?php echo e(route('account')); ?>">
                              <button class="form-control btn btn-primary border-r-0"><i class="fa fa-user fa-fw mr-1" aria-hidden="true"></i>Moj Profil</button>
                          </a>

                          <hr style="background-color: #fff">

                          <a href="<?php echo e(route('account.settings')); ?>">
                              <button class="form-control btn btn-primary border-r-0"><i class="fa fa-cogs fa-fw mr-1" aria-hidden="true"></i>Postavke Računa</button>
                          </a>


                          <hr style="background-color: #fff">

                         <a href="<?php echo e(route('logout')); ?>"> <button class="form-control btn btn-primary border-r-0"><i class="fa fa-sign-out fa-fw mr-1" aria-hidden="true"></i>Odjava</button> 
                         </a>

                      <?php endif; ?>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
                  
    </nav>
    <!--////PHONE NAVBAR (CENTERED HEADER) -->