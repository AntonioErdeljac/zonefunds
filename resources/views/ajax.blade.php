<!DOCTYPE html>
<html>
<head>
	<title>AJAX</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
	
	function getMsg()
	{
		console.log('dada');
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: 'POST',
			url: '{{ route("postmsg") }}',
			success: function(data)
			{
				for(i=-1; i<=data.msg.length; i++)
				{
					$('#msgdiv').html(data.msg[i])
				}
				
				//$(.slideDown()
			}
		});
	}

	setInterval(function(){
		getMsg();
	}, 1000)

</script>

<p id="p"></p>
<div id="msgdiv">facebook</div>

</body>
</html>