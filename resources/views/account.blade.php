@extends('master')

@section('title')

	ZoneFunds - {{ $user->username}}'s Profile

@endsection

@section('content')

  @if (Auth::check())


    <!-- NEW POST ZA MOBITELE -->
    <!-- ////NEW POST ZA MOBITELE -->

  @endif



	<div class="jumbotron jumbotron-fluid bg-color-niceblue hidden-md-down">
  		<div class="container text-xs-center mb-0">
    		<h1 class="display-3" style="color:#fff"><i class="fa fa-user-circle fa-fw" aria-hidden="true"></i>{{ $user->username }}</h1>
    		<hr style="background: #fff">
    		<p class="lead" style="color:#fff"><i class="fa fa-pencil pr-1"></i>{{ $ad_count_acc }} {{ $ad_text }}</p>
        <p class="lead" style="color:#fff"><i class="fa fa-money pr-1"></i>{{ $user_text}} <b>{{ $user_money }} HRK</b></p>
  		</div>
	</div>


  <div class="jumbotron jumbotron-fluid bg-color-niceblue hidden-lg-up">
      <div class="container text-xs-center mb-0">
        <h2 style="color:#fff"><i class="fa fa-user-circle fa-fw" aria-hidden="true"></i>{{ $user->username }}</h1>
        <hr style="background: #fff">
        <p class="lead" style="color:#fff">{{ $ad_count_acc }} {{ $ad_text }}</p>
        <p class="lead" style="color:#fff">{{ $user_text}} <b>{{ $user_money }} HRK</b></p>
      </div>
  </div>






	<!--FEED-->
    <div class="container" id="feed">
      <div class="row">

        @foreach($ads_by_user as $ad)

        

          <div class="col-lg-12 hidden-lg-up" style="background-color:#f7f7f7">

            <hr>

          </div>

          <div class="col-xl-4 my-1" id="ad_card">
            <!--<a data-toggle="modal" data-target="#create_ad_modal2" style="text-decoration:none;">-->
              <a href="{{ route('ad.show', $ad->id) }}" style="text-decoration: none;">
                <div class="card" style="border-style:none;">
                  <img class="card-img-top img-fluid" src="image/{{ $ad->ad_image }}" style="border-top-right-radius: 5px; border-top-left-radius: 5px;">

                  <div class="card-block">
                 <!-- <div style="position:absolute; right:0; padding-right:20px;">
                          <span class="fa fa-cog fa-2x"></span>
                    </div>-->
                    <h4 class="card-title linebreak">{{ str_limit($ad->ad_title, 24) }}</h4>
                    
                    <p style="color: #6cace9"><i>{{$ad->created_at->diffForHumans()}}</i></p></span>
                    <p class="card-text pt-1 linebreak">{{ str_limit($ad->ad_body, 50) }}</p>
                  </div>

                  <div class="list-group" style="border-radius: 0px;">
                    <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="callto:{{ $ad->ad_contact }}"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_contact }}</a>
                    <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_price }}</a>
                    <a class="list-group-item" style="{{ Auth::check() ? 'border-radius:0px;' : 'border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;'}} text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_location }}</a>
                      @if (Auth::user() == $ad->user)
                      <div>
                      	<a href="{{ route('ad.show_update', $ad->id) }}" id="ad_settings" class="list-group-item text-xs-center"><i class="fa fa-cog"></i></a>
                      </div>
                      @else
                          <a class="list-group-item" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-user" aria-hidden="true"></i><i>&nbsp; Posted by {{ $ad->user['username'] }}</i></a>
                      @endif
                  </div>

                </div>
            </a>
          </div>

        @endforeach

@endsection