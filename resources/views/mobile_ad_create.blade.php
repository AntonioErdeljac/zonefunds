@extends('master')

@section('title')

	ZoneFunds - Create an Ad

@endsection

@section('content')


   @if (Auth::check())


    <!-- NEW POST ZA MOBITELE -->
    <a href="{{ route('home') }}"> <!-- koristimo bootstrap sa ugrađenim javascriptom za modale bez preusmjaravanja -->
    <div class ="phonepost hidden-md-up" style="background-color:#2d89e5; position:relative; z-index: 1000;">
      <div class="nav-item" style="right: -14px; bottom:-12px; position:relative; z-index:1000;">
        <span class="fa fa-undo fa-3x rotate" style="color: #f7f7f7"></span>
      </div>
    </div>
    </a>
    <!-- ////NEW POST ZA MOBITELE -->

  @endif


	<!--<div class="jumbotron jumbotron-fluid hidden-sm-down" style="background-color: #f7f7f7">
  		<div class="container text-xs-center mb-0 color-niceblue">
    		<h1 class="display-3" ><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i>Create an Ad</h1>
  		</div>
	</div>


    <div class="jumbotron jumbotron-fluid hidden-md-up" style="background-color: #f7f7f7">
      <div class="container text-xs-center mb-0 color-niceblue">
        <h2><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i>Create an Ad</h2>
      </div>
  </div>-->






    <div class="container mt-3" id="feed">
      <div class="row">
      
          <div class="col-lg-6 offset-lg-3 mb-3" style="background-color:#f7f7f7"> 


            <form action="{{ route('ad.create') }}" method="post" enctype="multipart/form-data">

                <div class="mb-3 input_focus_change">
                  <label for="ad_title" class="color-niceblue" style="padding-left:6px; color:{{ $errors->has('ad_title') ? 'red' : '#2d89e5'}}">Naslov oglasa</label>
                  <input type="text" class="form-control input_focus_change" style="background-color:#f7f7f7; {{ $errors->has('ad_title') ? 'border-color: red; color:red' : ''}}" name="ad_title" placeholder="Nudim popravak računala." value="{{ Request::old('ad_title') }}">
                </div>

                <div class="mb-3">
                  <label for="ad_body" style="padding-left:6px; color: {{ $errors->has('ad_body') ? 'red' : '#2d89e5'}};">Opis oglasa</label>
                  <textarea  style="background-color:#f7f7f7; {{ $errors->has('ad_body') ? 'border-color: red; color:red' : ''}}" class="form-control input_focus_change" style="" id="textarea_create" rows="5" name="ad_body" placeholder="Popraviti ću bilo koji problem sa računalom ili laptopom, software i hardware. (Minimalno 50 slova)">{{ Request::old('ad_body') }}</textarea>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-addon borderless_input" style="background-color:#f7f7f7; {{ $errors->has('ad_contact') ? 'border-color: red; color:red' : ''}}"><i class="fa fa-phone fa-fw"></i></span>
                    <input style="background-color:#f7f7f7; {{ $errors->has('ad_contact') ? 'border-color: red; color:red' : ''}}" class="form-control input_focus_change" type="number" name="ad_contact" placeholder="111-222-434-2" value="{{ Request::old('ad_contact') }}">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-addon borderless_input" style="background-color:#f7f7f7; {{ $errors->has('ad_price') ? 'border-color: red; color:red' : ''}}"><i class="fa fa-money fa-fw"></i></span>
                    <input style="background-color:#f7f7f7; {{ $errors->has('ad_price') ? 'border-color: red; color:red' : ''}}" class="form-control input_focus_change" type="number" name="ad_price" placeholder="100" value="{{ Request::old('ad_price') }}">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-addon borderless_input" style="background-color:#f7f7f7; {{ $errors->has('ad_location') ? 'border-color: red; color:red' : ''}}"><i class="fa fa-map-marker fa-fw"></i></span>
                    <input class="form-control" id="ad_location_m" type="hidden" name="ad_location">
                    <input class="form-control" id="ad_location_coords_lat_m" type="hidden" name="ad_location_coords_lat">
                    <input class="form-control" id="ad_location_coords_lng_m" type="hidden" name="ad_location_coords_lng">
                    <input style="background-color:#f7f7f7; {{ $errors->has('ad_location') ? 'border-color: red; color:red' : ''}}" class="form-control input_focus_change" id="ad_see_location_m" type="text" disabled>
                  </div>

                <div class="input-group mb-3">
                    <span class="input-group-addon borderless_input" style="background-color:#f7f7f7"><i class="fa fa-photo fa-fw"></i></span>
                    <input style="background-color:#f7f7f7" class="form-control borderless_input" type="file" name="ad_image" placeholder="Prenesi fotografiju">
                  </div>

                <button type="submit" class="form-control btn btn-primary btn-lg mt-2" style="border-radius:5px;">Objavi</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">


          </div>
      </form>
      </div>
      </div>
      </div>
      </div>
      </div>


        
@endsection
