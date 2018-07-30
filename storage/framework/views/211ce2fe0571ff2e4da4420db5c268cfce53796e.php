<?php $__env->startSection('content'); ?>



  <div class="container">
<div id="createmodal" class="overlay_update text-xs-center">
    <form id="createad_form" action="<?php echo e(route('ad.update', $ad_id = $ad_update->id)); ?>"  method="POST" enctype="multipart/form-data" class="form-control bg-color-niceblue" style="border-style:none;">
        
          <div class="row">
            <div class="col-lg-4 offset-lg-4">
       
        <div id="image">
            <div class="fileUpload btn">
            <span class="fa fa-photo fa-2x"  style="color:#Fff;" id="uploadphoto"></span>
            <input type="file" class="upload form-control" id="uploadinput" name="ad_image" accept="image/*" />
        </div>
        </div>

        <div id="location" style="display:none;" class="ad_create">
            <input type="hidden" class="mb-1 ad_create" name="ad_location_coords_lat" value="<?php echo e($lat); ?>"/>
            <input type="hidden" class="mb-1 ad_create" name="ad_location_coords_lng" value="<?php echo e($lng); ?>"/>
            <input type="hidden" class="mb-1 ad_create" name="ad_location" value="<?php echo e($city); ?>"/>
        </div>
        <div id="final_update" class="">
          <div >
            <input type="text" id="final_title" class="mb-1 ad_create form-control" style="background-color:#2d89e5;" name="ad_title" placeholder="Naslov oglasa" value="<?php echo e($ad_update->ad_title); ?>"/>
          </div>
          <div>
            <textarea type="text" id="final_body" class="mb-1 ad_textarea form-control" style="background-color:#2d89e5;" name="ad_body" placeholder="Opis oglasa"><?php echo e($ad_update->ad_body); ?></textarea>
          </div>
          <div>
              <input type="number" id="final_contact" class="mb-1 ad_create form-control" style="background-color:#2d89e5;" name="ad_contact" placeholder="Kontakt" value="<?php echo e($ad_update->ad_contact); ?>"/>
          </div>
          <div >
              <input type="number" id="final_price" class="mb-1 ad_create form-control" style="background-color:#2d89e5;" name="ad_price" placeholder="Cijena" value="<?php echo e($ad_update->ad_price); ?>"/>
          </div>
          <div>
            <div class="fileUpload btn form-inline" style="background-color: #2d89e5;">
            <span class="fa fa-photo fa-2x mr-1"  style="color:#Fff;" id="uploadphoto"></span><p class="form-control"><?php echo e($ad_update->ad_image); ?></p>
            <input type="file" class="upload form-control" id="uploadinput" name="ad_image" value="<?php echo e($ad_update->ad_image); ?>" accept="image/*" />
        </div>
        </div>

        <a style="" ><button type="submit" id="next" style="cursor:pointer; outline: none;border-radius: 50%; border-color:#fff; border-style:solid; border-width:3px;width: 50px; height: 50px;  background-color: #2d89e5;" class="rotate_half"><i class="fa fa-check" style="color:#fff; "></i></button></a>


        <a style="" clas><button type="button" id="close_update" style="cursor:pointer; outline: none;border-radius: 50%; border-color:#fff; border-style:solid; border-width:3px;width: 50px; height: 50px;  background-color: #2d89e5;" class="rotate_half"><i class="fa fa-times" style="color:#fff; "></i></button></a>

         <a style="" href="<?php echo e(route('ad.delete', $ad_update->id)); ?>"" clas><button type="button" id="" style="cursor:pointer; outline: none;border-radius: 50%; border-color:#fff; border-style:solid; border-width:3px;width: 50px; height: 50px;  background-color: #2d89e5;" class="rotate_half"><i class="fa fa-trash" style="color:#fff; "></i></button></a>

        <?php echo e(csrf_field()); ?>


        </div>
        </div>
        
    </form>
    </div>
</div>








        
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
    $('.overlay_update').hide();
    $('.overlay_update').css({ opacity: 1 },1500);
    $('.overlay_update').css('visibility', 'visible');
    $('.overlay_update').slideDown(700);
    
    $('#close_update').click(function(){
      console.log('clicked');
      $('.overlay_update').slideUp();

      setTimeout(function()
      {
        window.location.replace('<?php echo e(route("home")); ?>');
      },500);
      
    });

    $('#updatead').modal({
      show:true
    });

    $('#updatead').on('hidden.bs.modal', function(e){
      window.location.href = "<?php echo e(route('home')); ?>"
    });


    $('#feed').hide();
    $('#feed').fadeIn(1000);
    $(document).ready();

    
  </script>

   
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>