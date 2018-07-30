<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    /*
    request.done(function(response) {
      console.log(response);
    });/*/

    function getUsername()
    {
    	$.get('<?php echo e(route("ajaxtest")); ?>', function(data){
    		$('#username_ajax').text(data.username);
    	});
    }

    setInterval(function() {getUsername()}, 1000);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>