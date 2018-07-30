    <!--NORMAL NAVBAR -->
    <div id="navbar_main" class="nav navbar navbar-light bg-faded hidden-md-down">
      <div class="container">
        <div class="row">
            <a class="navbar-brand float-xs-left" href="<?php echo e(route('home')); ?>" >
              <img src="img/zonefundsheaderreverseall.png" width="180px" class="opacity_on_hover d-inline-block align-top" alt="">
            </a>

            <div class="navbar-brand float-xs-left" style="padding-top:15px;  border-color: #2d89e5 ">
              <form class="form-inline" method="get" id="search">
                <div class="form-group opacity_on_hover">
                  <div class="input-group">
                    <input type="text" class="form-control" name="ad_search" placeholder="Search" id="search_top" value="<?php echo e($ad_search); ?>">
                    <a  onclick="document.getElementById('search').submit();" class="input-group-addon" style="border-color: #2d89e5; border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;">
                      <i class="fa fa-search borderless_input rotate"></i>
                    </a>
                  </div>
                </div>
                <select name="ad_sort" class="borderless form-control opacity_on_hover" id="sort_options" onchange="form.submit()">

             <option value="recent" <?php echo e($ad_sort = 'recent' ? 'selected' : ''); ?> class="">Recent</option>
             <option value="high" <?php echo e($ad_sort = 'high' ? 'selected' : ''); ?> class="">Price: Highest</option>
             <option value="low" <?php echo e($ad_sort = 'low' ? 'selected' : ''); ?> class="">Price: Lowest</option>
           </select>
              </form>
            </div>

            

          <?php if(Auth::check()): ?>
            <ul class="nav navbar-nav navbar-brand float-xs-right" style="padding-top: 15px;" id="zonefunds-navbar">
              <li class="nav-item color-niceblue">
                <i class="fa fa-bell" style="margin-top:13px;">
                </i>
              </li>

              <li class="nav-item color-niceblue" style="margin-top:5px;">
                |
              </li>
              <li class="nav-item dropdown color-niceblue">
                <a class="nav-link dropdown-toggle opacity_on_hover" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle fa-fw color-niceblue" aria-hidden="true"></i>
                  <span id="username_ajax"><?php echo e($user->username); ?></span>
                </a>
                <div class="border-r-15 dropdown-menu dropdown-menu-right modal-fade" id="dropdown_account" style="box-shadow: 0 1px 3px rgba(0,0,0,.2);">
                  <a class="dropdown-item color-niceblue" href="<?php echo e(route('account')); ?>" style="color: #2d89e5;"><i class="fa fa-user fa-fw" aria-hidden="true"></i>My Profile</a>
                  <a class="dropdown-item color-niceblue" href="<?php echo e(route('account.settings')); ?>" style="color: #2d89e5;"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>Account Settings</a>
                  <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" style="color:#2d89e5;"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Logout</a>
                </div>
              </li>
            </ul>
          <?php else: ?>

            <div class="nav navbar-nav navbar-brand float-xs-right" style="padding-top:8px;">
              <form class="form form-inline">
                <button type="button" class="form-control btn" id="no_auth_btn_register" data-toggle="modal" data-target="#loginmodal">Log In</button>


                <button type="button" id="registerbutton" class="form-control btn btn-primary" data-toggle="modal" data-target="#registermodal">Create An Account</button>
              </form>
            </div>

          <?php endif; ?>

          </div>
        </div>
      </div>
    <!-- ////NORMAL NAVBAR-->




    <!--PHONE NAVBAR (CENTERED HEADER) -->
    <nav id="navbar_down" class="navbar navbar-fixed-top hidden-lg-up mb-3">
          <i class="fa fa-search fa-2x float-xs-right search_button_mobile rotate" style="color:#fff"></i>

          <i class="fa fa-bars fa-2x float-xs-left phone_settings" id="settings_mobile" style="color:#fff"></i>
                  
    </nav>
    





    <nav id="navbar_down" class="navbar navbar-fixed-top hidden-lg-up mobile_search" style="top:40px;">
          <form method="get" id="search">
                <div class="form-group opacity_on_hover">
                    <input type="text" class="form-control" name="ad_search" placeholder="Search" id="search_mobile" value="<?php echo e($ad_search); ?>">
                    </a>
                </div>
              </form>
                  
    </nav>









    <nav id="navbar_down" class="navbar navbar-fixed-top hidden-lg-up phone_settings_options" style="top:40px;">
          <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                        <a href="<?php echo e(route('home')); ?>">
                            <button class="form-control btn btn-primary border-r-0"><i class="fa fa-home fa-fw mr-1" aria-hidden="true"></i>Home</button>
                        </a>

                        <hr style="background-color: #fff">

                        <a href="<?php echo e(route('account')); ?>">
                            <button class="form-control btn btn-primary border-r-0"><i class="fa fa-user fa-fw mr-1" aria-hidden="true"></i>My Profile</button>
                        </a>

                        <hr style="background-color: #fff">

                        <a href="<?php echo e(route('account.settings')); ?>">
                            <button class="form-control btn btn-primary border-r-0"><i class="fa fa-cogs fa-fw mr-1" aria-hidden="true"></i>Account Settings</button>
                        </a>


                        <hr style="background-color: #fff">

                       <a href="<?php echo e(route('logout')); ?>"> <button class="form-control btn btn-primary border-r-0"><i class="fa fa-sign-out fa-fw mr-1" aria-hidden="true"></i>Logout</button> 
                       </a>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
                  
    </nav>
    <!--////PHONE NAVBAR (CENTERED HEADER) -->