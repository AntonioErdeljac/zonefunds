<?php $__env->startSection('title'); ?>

	ZoneFunds - <?php echo e($user->username); ?>'s Profile

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


   <?php if(Auth::check()): ?>


    <!-- NEW POST ZA MOBITELE -->

    <!-- ////NEW POST ZA MOBITELE -->

  <?php endif; ?>


	<div class="jumbotron jumbotron-fluid hidden-md-down" style="background-color: #f7f7f7">
  		<div class="container text-xs-center mb-0 color-niceblue">
    		<h1 class="display-3" ><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>Account Settings</h1>
  		</div>
	</div>


    <div class="jumbotron jumbotron-fluid hidden-lg-up" style="background-color: #f7f7f7">
      <div class="container text-xs-center mb-0 color-niceblue">
        <h2><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>Account Settings</h2>
      </div>
  </div>






    <div class="container" id="feed">
      <div class="row">
   
      <form action="<?php echo e(route('account.update')); ?>" method="post">
          <div class="col-lg-6 offset-lg-3 mb-3" style="background-color:#f7f7f7">

            <div class="input-group mb-3">
              <span class="input-group-addon input_form color-niceblue" style="background-color: #f7f7f7"><i class="fa fa-user fa-fw"></i></span>
              <input class="form-control input_focus_change" style="background-color:#f7f7f7" type="text" name="username" value="<?php echo e(Auth::user()->username); ?>">
            </div>

            <button type="submit" class="form-control btn btn-primary btn-lg mt-2 mb-3" style="border-radius:15px;">Update Account</button>

            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">


          </div>
      </form>

        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>