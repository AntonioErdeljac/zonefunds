<?php $__env->startSection('odabrani_ad'); ?>

<!-- MODAL ZA ODABRANI AD -->

      <div class="modal fade" id="selectedad"  aria-hidden="true">
        <div class="modal-dialog" role="document">      

          <div class="card" style="box-shadow: none;">
            <img class="card-img-top img-fluid" src="image/<?php echo e($ad_select->ad_image); ?>" style="border-radius:0px;">
          <div class="card-block" style="color:#2d89e5;">
            <h4><?php echo e($ad_select->ad_title); ?></h4>
            <p class="card-text"><?php echo e($ad_select->ad_body); ?></p>
          </div>

          <div class="list-group" style="border-radius: 0px;">
            <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="callto:<?php echo e($ad_select->ad_contact); ?>"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->ad_contact); ?></a>
            <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->ad_price); ?></a>
            <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->ad_location); ?></a>
            <?php if(Auth::check()): ?>
              <?php if(Auth::user() == $ad_select->user): ?>
                <a data-toggle="modal" data-target="#confirmmodal">
                  <button type="submit" id="delete" class="form-control btn btn-primary border-r-0">Delete</button>
                </a>
              <?php else: ?>
                  <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i><i>&nbsp; Posted by <?php echo e($ad_select->user['username']); ?></i></a>
              <?php endif; ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>

      <!--//MODAL ZA ODABRANI AD -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script type="text/javascript">
    //$("#registermodal").modal({
      //<?php if($errors->any()): ?>
        //show:true
      //<?php else: ?>
        //show:false
      //<?php endif; ?>
    //}); 

    $('#selectedad').modal({
      show:true
    });

    $('#feed').hide();
    $('#feed').fadeIn(1000);
    $(document).ready();
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>