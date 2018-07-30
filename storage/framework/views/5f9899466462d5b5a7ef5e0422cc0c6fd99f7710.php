<?php $__env->startSection('odabrani_ad'); ?>

<!-- MODAL ZA ODABRANI AD -->
  <div class="container">
    <div class="row">
      
    <div class="modal fade" id="selectedad"  aria-hidden="true" style="background-color: rgba(0,0,0,.2)">
      <div class="modal-dialog" role="document">  
        <div class="col-lg-6">    
          <div class="card" style="box-shadow: none; border-style:none;">
            <img class="card-img-top img-fluid" src="image/<?php echo e($ad_select->ad_image); ?>" style="border-top-right-radius:15px; border-top-left-radius: 15px;">
          <div class="card-block" style="color:#2d89e5;">
            <h4><?php echo e($ad_select->ad_title); ?></h4>
            <p class="card-text"><?php echo e($ad_select->ad_body); ?></p>
          </div>

          <div class="list-group" style="border-radius: 0px;">
            <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="callto:<?php echo e($ad_select->ad_contact); ?>"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->ad_contact); ?></a>
            <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->ad_price); ?></a>
            <a class="list-group-item" style="<?php echo e(Auth::check() ? 'border-radius:0px;' : 'border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;'); ?> text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; <?php echo e($ad_select->ad_location); ?></a>
            <?php if(Auth::check()): ?>
              <?php if(Auth::user() == $ad_select->user): ?>
                <a href="<?php echo e(route('ad.delete', $ad_id = $ad_select->id)); ?>" id="delete" class="list-group-item text-xs-center no_decoration" href="#">Delete</a>
              <?php else: ?>
                  <a class="list-group-item" style="border-radius: 15px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i><i>&nbsp; Posted by <?php echo e($ad_select->user['username']); ?></i></a>
              <?php endif; ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
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

    $('#selectedad').on('hidden.bs.modal', function(e){
      window.location.href = "<?php echo e(route('home')); ?>"
    });

    $('#feed').hide();
    $('#feed').fadeIn(1000);
    $(document).ready();
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>