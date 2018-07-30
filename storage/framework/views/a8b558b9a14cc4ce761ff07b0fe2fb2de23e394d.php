<?php $__env->startSection('title'); ?>

	ZoneFunds - <?php echo e($user->username); ?>'s Profile

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <?php if(Auth::check()): ?>


    <!-- NEW POST ZA MOBITELE -->
    <!-- ////NEW POST ZA MOBITELE -->

  <?php endif; ?>



	<div class="jumbotron jumbotron-fluid bg-color-niceblue hidden-md-down">
  		<div class="container text-xs-center mb-0">
    		<h1 class="display-3" style="color:#fff"><i class="fa fa-user-circle fa-fw" aria-hidden="true"></i><?php echo e($user->username); ?></h1>
    		<hr style="background: #fff">
    		<p class="lead" style="color:#fff"><i class="fa fa-pencil pr-1"></i><?php echo e($ad_count_acc); ?> <?php echo e($ad_text); ?></p>
        <p class="lead" style="color:#fff"><i class="fa fa-money pr-1"></i><?php echo e($user_text); ?> <b><?php echo e($user_money); ?> HRK</b></p>
  		</div>
	</div>


  <div class="jumbotron jumbotron-fluid bg-color-niceblue hidden-lg-up">
      <div class="container text-xs-center mb-0">
        <h2 style="color:#fff"><i class="fa fa-user-circle fa-fw" aria-hidden="true"></i><?php echo e($user->username); ?></h1>
        <hr style="background: #fff">
        <p class="lead" style="color:#fff"><?php echo e($ad_count_acc); ?> <?php echo e($ad_text); ?></p>
        <p class="lead" style="color:#fff"><?php echo e($user_text); ?> <b><?php echo e($user_money); ?> HRK</b></p>
      </div>
  </div>






	<!--FEED-->
    <div class="container" id="feed">
      <div class="row">

        <?php $__currentLoopData = $ads_by_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

        

          <div class="col-lg-12 hidden-lg-up" style="background-color:#f7f7f7">

            <hr>

          </div>

          <div class="col-xl-4 my-1" id="ad_card">
            <!--<a data-toggle="modal" data-target="#create_ad_modal2" style="text-decoration:none;">-->
              <a href="<?php echo e(route('ad.show', $ad->id)); ?>" style="text-decoration: none;">
                <div class="card" style="border-style:none;">
                  <img class="card-img-top img-fluid" src="image/<?php echo e($ad->ad_image); ?>" style="border-top-right-radius: 5px; border-top-left-radius: 5px;">

                  <div class="card-block">
                 <!-- <div style="position:absolute; right:0; padding-right:20px;">
                          <span class="fa fa-cog fa-2x"></span>
                    </div>-->
                    <h4 class="card-title linebreak"><?php echo e(str_limit($ad->ad_title, 24)); ?></h4>
                    
                    <p style="color: #6cace9"><i><?php echo e($ad->created_at->diffForHumans()); ?></i></p></span>
                    <p class="card-text pt-1 linebreak"><?php echo e(str_limit($ad->ad_body, 50)); ?></p>
                  </div>

                  <div class="list-group" style="border-radius: 0px;">
                    <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="callto:<?php echo e($ad->ad_contact); ?>"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad->ad_contact); ?></a>
                    <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad->ad_price); ?></a>
                    <a class="list-group-item" style="<?php echo e(Auth::check() ? 'border-radius:0px;' : 'border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;'); ?> text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad->ad_location); ?></a>
                      <?php if(Auth::user() == $ad->user): ?>
                      <div>
                      	<a href="<?php echo e(route('ad.show_update', $ad->id)); ?>" id="ad_settings" class="list-group-item text-xs-center"><i class="fa fa-cog"></i></a>
                      </div>
                      <?php else: ?>
                          <a class="list-group-item" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-user" aria-hidden="true"></i><i>&nbsp; Posted by <?php echo e($ad->user['username']); ?></i></a>
                      <?php endif; ?>
                  </div>

                </div>
            </a>
          </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>