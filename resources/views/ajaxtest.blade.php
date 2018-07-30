@extends('master')
@section('scripts')
<script type="text/javascript">
    /*
    request.done(function(response) {
      console.log(response);
    });/*/

    function getUsername()
    {
    	$.get('{{ route("ajaxtest") }}', function(data){
    		$('#username_ajax').text(data.username);
    	});
    }

    setInterval(function() {getUsername()}, 1000);
</script>
@endsection