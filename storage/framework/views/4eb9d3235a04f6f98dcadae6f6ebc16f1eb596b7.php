<!DOCTYPE html>
<html>
<head>
	<title>AJAX BEGY</title>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

<script type="text/javascript">
	function getporuka()
	{
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: 'POST',
			url: '<?php echo e(route('postbegy')); ?>',
			success: function(data)
			{
				$('#begy').html(data.msg)
			}
		});
	}

	setInterval(function(){
		getporuka()
	}, 5000);
</script>
<div id="begy">Begy nije peder</div>

</body>
</html>