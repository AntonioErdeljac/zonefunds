@extends('master') <!--odabiremo glavni kod u master.blade.php datoteci -->

<!-- odabiremo sekciju odredjenu u glavnom kodu -->

@section('title') 

  ZoneFunds

@endsection


@section('content')

@if( Session::has('message') || Session::has('updated') || Session::has('ad_completed'))
  
<table style="height: 100vh;" class="poruka text-xs-center">
  <tbody>
    <tr>
      <td class="align-middle"><button type="button" id="success_action" style="cursor:pointer; outline: none;border-radius: 50%; border-color:#fff; border-style:solid; border-width:3px;width: 50px; height: 50px;  background-color: #2d89e5;" class=""><i class="fa fa-check" style="color:#fff; "></i></button></td>
    </tr>
  </tbody>
</table>

@elseif (Session::has('logged_in'))

<table style="height: 100vh;" class="poruka text-xs-center">
  <tbody>
    <tr>
      <td class="align-middle"><button type="button" id="success_action" style="cursor:pointer; outline: none;border-radius: 50%; border-color:#fff; border-style:solid; border-width:3px;width: 50px; height: 50px;  background-color: #2d89e5;" class=""><i class="fa fa-unlock" style="color:#fff; "></i></button></td>
    </tr>
  </tbody>
</table>

@elseif (Session::has('logged_out'))

<table style="height: 100vh;" class="poruka text-xs-center">
  <tbody>
    <tr>
      <td class="align-middle"><button type="button" id="success_action" style="cursor:pointer; outline: none;border-radius: 50%; border-color:#fff; border-style:solid; border-width:3px;width: 50px; height: 50px;  background-color: #2d89e5;" class=""><i class="fa fa-lock" style="color:#fff; "></i></button></td>
    </tr>
  </tbody>
</table>

@elseif (Session::has('registered'))

<table style="height: 100vh;" class="poruka text-xs-center">
  <tbody>
    <tr>
      <td class="align-middle"><h1 class="display-5" style="color:#fff">Dobrodošli.</h1></td>
    </tr>
  </tbody>
</table>

@endif





<div id="overlay_zonemap" class="zonemapoverlay text-xs-center">
    
    <a > <!-- koristimo bootstrap sa ugrađenim javascriptom za modale bez preusmjaravanja -->
    <div class ="phonepost hidden-md-down" id="click_ad" style="background-color:#2d89e5">
      <div class="nav-item" style="right: 0px; bottom:-12px; position: relative;">
        <span class="fa fa-undo fa-3x rotate" style="color: #fff"></span>
      </div>
    </div>
    </a>
</div>


@yield('odabrani_ad')


    <!--<?php 
      var_dump($errors);
    ?>-->


    




<!--
    <a data-toggle="modal" data-target="#zonemapmodal">
      <div class ="zonemapmobile hidden-lg-up" style="background-color:#2d89e5;">
        <div class="nav-item" style="left: 14.6px; bottom:-11.5px; position: relative;">
          <span class="fa fa-globe fa-3x" style="color:#fff" id="newpost"></span>
        </div>
      </div>
    </a>
-->





    <!--NORMAL POST & ZONE MAP -->

    <div class="container">
      <div class="row">


    @if (Auth::check())


    <!-- NEW POST ZA MOBITELE -->

    <!-- ////NEW POST ZA MOBITELE -->



        <div class="col-lg-1 hidden-md-down">
          <div class="nav navbar navbar-light mb-3 navbar-brand" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">
            <a class="nav-link p-0">
            <div class="nav-item p-0" >
              <span class="fa fa-edit fa-2x rotate" id="click_ad" style="color: #fff; padding-left:10px; padding-top: 5px; padding-bottom: 5px;"></span>
            </div>
            </a>
          </div>
        </div>

    


        <div class="col-lg-2 offset-lg-4 hidden-md-down">
          <div class="" id="navbar_small" style=" background-color: {{$api == 'da' ? '#E54444;' : '#2d89e5;'}}; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">
            <a class="p-0" data-toggle="modal" data-target="#locationmodal">
              <div class="text-xs-center" style="color:#fff">
                <p class=""><i class="fa fa-map-marker" style="padding-right: 10px;"></i>{{ $city }} <span class="{{$api == 'da' ? 'fa fa-times' : 'fa fa-check'}}"</span> </p>
              </div>
            </a>
          </div>
        </div>





        <div class="col-lg-1 offset-lg-4 hidden-md-down">
          <div class="nav navbar navbar-light mb-3 navbar-brand" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">
            <a class="nav-link p-0" data-toggle="modal" data-target="#zonemapmodal">
              <div class="p-0">
                <span class="fa fa-globe fa-2x rotate" style="color: #fff; padding-left:0px; padding-top: 5px; padding-bottom: 5px;"></span>
              </div>
            </a>
          </div>
        </div>



        




    @else


        <div class="col-lg-2 offset-lg-5 hidden-md-down">
          <div class="" id="navbar_small" style=" background-color: {{$api == 'da' ? '#E54444;' : '#2d89e5;'}}; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">
            <a class="p-0" data-toggle="modal" data-target="#locationmodal">
              <div class="text-xs-center" style="color:#fff">
                <p class=""><i class="fa fa-map-marker" style="padding-right: 10px;"></i>{{ $city }} <span class="{{$api == 'da' ? 'fa fa-times' : 'fa fa-check'}}"</span> </p>
              </div>
            </a>
          </div>
        </div> 


      <div class="col-lg-1 offset-lg-4 hidden-md-down">
          <div class="nav navbar navbar-light mr-2 mb-3 navbar-brand" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">
            <a class="nav-link p-0" data-toggle="modal" data-target="#zonemapmodal">
              <div class="p-0">
                <span class="fa fa-globe fa-2x rotate" style="color: #fff"></span>
              </div>
            </a>
          </div>
        </div>   


        

    @endif
    
      </div>
    </div>


    <!--/////NORMAL POST/MESSAGES/SORT -->

    



    




    















































@yield('update_ad')

  




        @if(count($ads) == 0)
          <div class="container mt-3">
            <div class="row">
              <div class="col-lg-12" style="color:#5ca4f3;">
                <!--<h1 class="display-5" >Sorry, no results have been found!</h1>
                </div>
                <p class="lead pl-1" style="color:#5ca4f3;">Please try the following:</p>
                <ul style="color:#5ca4f3;" class="pl-3">
                    <li>Check if your input is correct</li>
                    <li>Change the syntax of your input</li>
                    <li>Search for something similiar</li>
                </ul>-->
                <h1 class="display-5">Oprostite, nema rezultata vaše pretrage!</h1>
                </div>
                <p class="lead pl-1" style="color:#5ca4f3;">Molimo pokušajte sljedeće: </p>
                <ul style="color:#5ca4f3;" class="pl-3">
                    <li>Provjerite jeste li točno napisali pretragu</li>
                    <li>Promjenite sintaksu pretrage</li>
                    <li>Pretražite nešto slično</li>
                    <li class="hidden-md-down">Provjerite jeste li dopustili geolokaciju u vašem pregledniku</li>
                    <li class="hidden-lg-up">Provjerite jeste li uključili GPS</li>
                </ul>
              </div>
            </div>

        @else

    <!--FEED-->
    <div class="container" id="feed">
      <div class="row">


        

          @foreach($ads as $ad)

          

            
          <a href="{{ route('ad.show', $ad->id) }}" style="text-decoration: none;">
            <div class="col-lg-4 my-2" id="ad_card">
              <!--<a data-toggle="modal" data-target="#create_ad_modal2" style="text-decoration:none;">-->
                
                  <div class="card" style="border-style:none;">
                    <img class="card-img-top img-fluid" src="image/{{ $ad->ad_image }}" style="border-top-right-radius:5px; border-top-left-radius: 5px;">

                    <div class="card-block">
                    <h5 class="card-title linebreak">{{str_limit($ad->ad_title, 25)}}</h5>
              <hr>
              <p style="color: #6cace9">{{$ad->created_at->diffForHumans()}}</p>
              <p class="pt-1 linebreak">{{ str_limit($ad->ad_body, 50)}}</p>
              
              <hr>

              <p class="" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="callto:{{ $ad->ad_contact }}"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_contact }}</p>
              <hr>
              <p class="" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_price }} HRK</p>
              <hr>
              <p class="" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_location }}</p>
              <hr>
                <p class=" mb-0" style="border-radius: 5px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" ><i class="fa fa-user fa-fw" aria-hidden="true"></i><span style="margin-left:10px;">{{ $ad->user['username'] }}</span></p>
                    </div>

                  </div>
              
            </div>
            </a>



            <div class="col-lg-12 hidden-lg-up" style="background-color:#f7f7f7">

              <hr>

            </div>



      <!-- MODAL ZA POTVRDU BRISANJA -->
            <div class="modal fade" id="confirmmodal" aria-hidden="true">
              <div class="modal-dialog" role="document" style="border-radius:0px; border-style:hidden;">
                <div class="modal-content" style="border-radius:0px; border-style:hidden;">
                  <div class="modal-body text-xs-center" style="border-radius:0px; border-style:hidden;">
                    <img src="img/delete_post.png" class="mx-auto d-block mb-1" height="100">
                    <h4 style="color: #ff4c4c;">Are you sure you want <br> to delete this ad?</h4>
                          <div class="form-group">
                            <a href="{{ route('ad.delete', ['ad_id' => $ad->id]) }}">
                              <button id="delete" class="form-control btn btn-primary border-r-0 mb-1 mt-1">Yes</button>
                            </a>

                              <button id="delete" data-dismiss="modal" class="form-control btn btn-primary border-r-0">No</button>
                            </div>
                    </div>
                  </div>
                </div>
              </div>
           <!-- //MODAL ZA POTVRDU BRISANJA -->






















          <!-- MODAL ZA ZONE MAP -->
            <div class="modal fade" id="zonemapmodal" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content border-r-15">
                  <div class="modal-body text-xs-center border-r-15 color-niceblue">
                    <h4><span class="fa fa-globe"></span>&nbsp;Zone Map</h4>
                    <hr>
                    <div id="zonemap" style="height:70vh;"></div>
                  </div>
                </div>
              </div>
            </div>
          <!-- //MODAL ZA ZONE MAP -->
















          @endforeach


    </div>
  </div>

        @endif
    <!--/////KRAJ FEEEDA-->

    <div class="footer mt-3">


    </div>





             <!-- MODAL ZA GEOLOKACIJU 
          <div class="modal fade" id="geolocationmodal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content border-r-15">
                <div class="modal-body text-xs-center border-r-15">
                  <img src="img/delete_post.png" class="mx-auto d-block mb-1" height="100">
                  <h4 style="color: #ff4c4c;">Please allow geolocation<br>in your browser</h4>
                        <div class="form-group mt-1">
                            <button id="delete" data-dismiss="modal" class="form-control btn btn-primary border-r-0">Ok</button>
                          </div>
                  </div>
                </div>
              </div>
            </div>
         <!-- //MODAL ZA GEOLOKACIJU -->

<input type="hidden" id="session_location_coords_lat" name="session_location_coords_lat">
<input type="hidden" id="session_location_coords_lng" name="session_location_coords_lng">



@endsection

@section('scripts')
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfg0wQRLzA6BW_PiUDrq-Ab8KbBRU2Gqo&callback=ad_zonemap">
  </script>
  <script type="text/javascript">


  
  @if( Session::has('message') || Session::has('logged_in') || Session::has('logged_out') || Session::has('registered') || Session::has('updated') || Session::has('ad_completed'))

  var rotation = function()
  {
    $('#success_action').rotate({
      angle:0,
      animateTo: 360,
      callback: rotation
    });
  }

  rotation();

  setTimeout(function()
          {
            $('.poruka').fadeOut(1000);
          }, 2000);

  @endif

    var map_zonemap;
    function ad_zonemap()
    {
        map_zonemap = new google.maps.Map(document.getElementById('zonemap'), {
        center: {lat: 45.3430600, lng: 14.4091700},
        zoom:12
      });

      var marker_icon = {
        url: '/img/marker.png',
      };

      var marker_icon_user = {
        url: '/img/marker_user.png',
      };



      @foreach($ads as $ad)

        infowindow_{{$ad->id}} = new google.maps.InfoWindow({
        content:'<a href="{{ route("ad.show", $ad->id) }} style="text-decoration: none; !important"><div class="container><div class="row"><h4>{{ $ad->ad_title }}</h4><p style="color: #6cace9"><i>{{$ad->created_at->diffForHumans()}}</i></p></span><p class="card-text pt-1 linebreak mb-1">{{ str_limit($ad->ad_body, 23) }}</p></div><div class="list-group" style="border-radius: 0px;"><p class="list-group-item" style="border-radius: 0px; text-decoration: none;  border-right-style:hidden; border-left-style: hidden;" href="tel:{{ $ad->ad_contact }}"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_contact }}</p><p class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_price }}</p><p class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->user["username"] }}</p></a></div></div></div></div></div></div>'
        });

        marker_{{ $ad->id }} = new google.maps.Marker({
          position: {lat: {{ $ad->ad_location_coords_lat }}, lng:{{$ad->ad_location_coords_lng}} },
          icon: marker_icon,
          animation: google.maps.Animation.DROP,
          map: map_zonemap
        });
        marker_{{ $ad->id }}.addListener('click', function() {
          infowindow_{{ $ad->id }}.open(map_zonemap, marker_{{ $ad->id }});
        });

      @endforeach

      marker_user = new google.maps.Marker({
        position: {lat: {{ $lat }}, lng: {{ $lng }} },
        icon: marker_icon_user,
        animation: google.maps.Animation.BOUNCE,
        map: map_zonemap
      });

      infowindow_user = new google.maps.InfoWindow({
        content:'<a href="{{ route('account') }}"><div style="color: #E54444"><span class="fa fa-user fa-2x"></span><p class="lead">Vaša lokacija, <b>{{ Auth::check() ? Auth::user()->username  : "Korisnik"}}</b>.</p></div></a>'
        });

      marker_user.addListener('click', function() {
        infowindow_user.open(map_zonemap, marker_user);
      });
    }

    $('#zonemapmodal').on('shown.bs.modal', function(){
      var currentCenter= map_zonemap.getCenter();  // Get current center before resizing
      google.maps.event.trigger(map_zonemap, "resize");
      map_zonemap.setCenter(currentCenter); // Re-set previous center
    });






    $("#errormodal").modal({
  @if ($errors->any())
    show:true
    @foreach($errors as $error)
      $("#errormodal").html({{$error}});
    @endforeach
  @else
    show:false
  @endif
}); 

  </script>
  
@endsection