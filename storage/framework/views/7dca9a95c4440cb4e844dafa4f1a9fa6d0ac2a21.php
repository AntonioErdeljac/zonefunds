    <!--NORMAL NAVBAR -->
    <div id="navbar_main" class="nav navbar navbar-light bg-faded hidden-md-down <?php echo e(Auth::check() ? '' : 'mb-3'); ?>">
      <div class="container">
        <div class="row">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>" >
              <img src="img/zonefundsheaderreverseall.png" width="180px" class="d-inline-block align-top" alt="">
            </a>

            <div class="navbar-brand float-xs-left" style="padding-top:15px;  border-color: #2d89e5 ">
              <form class="form-inline" method="get" id="search">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" name="ad_search" placeholder="Search" id="search_top" value="<?php echo e($ad_search); ?>">
                    <a  onclick="document.getElementById('search').submit();" class="input-group-addon" style="border-color: #2d89e5; border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;">
                      <i class="fa fa-search" id="newpost" style="border-color: #2d89e5; color:#2d89e5; border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;"></i>
                    </a>
                  </div>
                </div>
                <select name="ad_sort" class="form-control" onchange="form.submit()">
             <option value="recent">Recent</option>
             <option value="high">High</option>
             <option value="low">Low</option>
           </select>
              </form>
            </div>

            

          <?php if(Auth::check()): ?>
            <ul class="nav navbar-nav navbar-brand float-xs-right" style="padding-top: 20px;">
              <li class="nav-item dropdown" style="color:#2d89e5;">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#2d89e5;"><i class="fa fa-user-circle fa-fw" aria-hidden="true" style="color:#2d89e5;"></i>
                  <?php echo e($user->username); ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right modal-fade" id="dropdown_account" style="border-radius:0px; box-shadow: 0 1px 3px rgba(0,0,0,.2);">
                  <a class="dropdown-item" href="#" style="color:#2d89e5;"><i class="fa fa-user fa-fw" aria-hidden="true"></i>My Profile</a>
                  <a class="dropdown-item" href="#" style="color:#2d89e5;"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>Account Settings</a>
                  <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" style="color:#2d89e5;"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Logout</a>
                </div>
              </li>
            </ul>
          <?php else: ?>

            <div class="float-xs-right" style="padding-top:8px;">
            <form class="form form-inline">
              <button type="button" class="form-control btn btn-primary" id="no_auth_btn" data-toggle="modal" style="border-radius: 15px;" data-target="#loginmodal"><b>Log In</b></button>
              <button type="button" id="no_auth_btn_register" class="form-control btn btn-primary" data-toggle="modal" style="border-radius: 15px;" data-target="#registermodal"><b>Create An Account</b></button>
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
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>" style="left: 50%; position: relative; transform: translateX(-50%);">
          <img src="img/zonefundsheaderreverseall.png" width="250px" class="d-inline-block" alt="">
        </a>
        <form class="form-inline" method="get" id="search">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" name="ad_search" placeholder="Search" id="search_top" value="<?php echo e($ad_search); ?>">
                    <a  onclick="document.getElementById('search').submit();" class="input-group-addon" style="border-color: #2d89e5; border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;">
                      <i class="fa fa-search" id="newpost" style="border-color: #2d89e5; color:#2d89e5; border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;"></i>
                    </a>
                  </div>
                </div>
                <select name="ad_sort" class="form-control" onchange="form.submit()">
             <option value="recent">Recent</option>
             <option value="high">High</option>
             <option value="low">Low</option>
           </select>
              </form>
      </div>
    </div>
    <!--////PHONE NAVBAR (CENTERED HEADER) -->