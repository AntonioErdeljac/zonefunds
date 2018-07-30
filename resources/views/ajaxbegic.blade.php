<!DOCTYPE html>
<html>
<head>
	<title>AJAX BEGY</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
			url: '{{ route('postbegy') }}',
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