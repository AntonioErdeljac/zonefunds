    <!--NORMAL NAVBAR -->
    <div id="navbar_main" class="nav navbar navbar-light bg-faded hidden-md-down <?php echo e(Auth::check() ? '' : 'mb-3'); ?>">
      <div class="container">
        <div class="row">
            <a class="navbar-brand float-xs-left" href="<?php echo e(route('home')); ?>" >
              <img src="img/zonefundsheaderreverseall.png" width="180px" class="d-inline-block align-top" alt="">
            </a>

            <div class="navbar-brand float-xs-left" style="padding-top:15px;  border-color: #2d89e5 ">
              <form class="form-inline" method="get" id="search">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" name="ad_search" placeholder="Search" id="search_top" value="<?php echo e($ad_search); ?>">
                    <a  onclick="document.getElementById('search').submit();" class="input-group-addon" style="border-color: #2d89e5; border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;">
                      <i class="fa fa-search borderless_input" id="newpost"></i>
                    </a>
                  </div>
                </div>
                <select name="ad_sort" class="borderless form-control" id="sort_options" onchange="form.submit()">
             <option value="recent" class="">Recent</option>
             <option value="high" class="">Price: Highest</option>
             <option value="low" class="">Price: Lowest</option>
           </select>
              </form>
            </div>

            

          <?php if(Auth::check()): ?>
            <ul class="nav navbar-nav navbar-brand float-xs-right" style="padding-top: 20px;">
              <li class="nav-item dropdown color-niceblue">
                <a class="nav-link dropdown-toggle" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle fa-fw color-niceblue" aria-hidden="true"></i>
                  <?php echo e($user->username); ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right modal-fade" id="dropdown_account" style="border-radius:0px; box-shadow: 0 1px 3px rgba(0,0,0,.2);">
                  <a class="dropdown-item color-niceblue" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i>My Profile</a>
                  <a class="dropdown-item color-niceblue" href="#"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>Account Settings</a>
                  <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" style="color:#2d89e5;"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Logout</a>
                </div>
              </li>
            </ul>
          <?php else: ?>

            <div class="nav navbar-nav navbar-brand float-xs-right" style="padding-top:8px;">
            <form class="form form-inline">
              <button type="button" class="form-control btn btn-primary" id="no_auth_btn_register" data-toggle="modal" data-target="#loginmodal">Log In</button>

              <span class="form-control borderless color-niceblue" style="padding-top:15px;"> | </span>

              <button type="button" id="no_auth_btn_register" class="form-control btn btn-primary" data-toggle="modal" data-target="#registermodal">Create An Account</button>
              </form>
            </div>

          <?php endif; ?>

          </div>
        </div>
      </div>
    <!-- ////NORMAL NAVBAR-->




    <!--PHONE NAVBAR (CENTERED HEADER) -->
    <div id="navbar_main" class="nav navbar navbar-light bg-faded hidden-lg-up">
      <div class="container">
        <div class="row">
          <form class="form-group" method="get" id="search">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" name="ad_search" placeholder="Search" id="search_top" value="<?php echo e($ad_search); ?>">
                      <a  onclick="document.getElementById('search').submit();" class="input-group-addon borderless_input">
                        <i class="fa fa-search borderless_input" id="newpost"></i>
                      </a>
                    </div>
                  </div>
                  <select name="ad_sort" class="borderless form-control" id="sort_options" value="test" onchange="form.submit()">
               <option value="recent">Recent</option>
               <option value="high">Price: Highest</option>
               <option value="low">Price: Lowest</option>
             </select>
                </form>
            </div>
      </div>
    </div>
    <!--////PHONE NAVBAR (CENTERED HEADER) -->