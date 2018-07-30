@extends('master') <!--odabiremo glavni kod u master.blade.php datoteci -->

<!-- odabiremo sekciju odredjenu u glavnom kodu -->

@section('title') 

  ZoneFunds

@endsection


@section('content')




    @if (Auth::check()) <!-- provjeravamo dali stranicu preko mobitela pregledava authentificirani korisnik ili gost, te biramo opcije -->

    <!-- NEW POST ZA MOBITELE -->
    <a style="" data-toggle="modal" data-target="#create_ad_modal"> <!-- koristimo bootstrap sa ugrađenim javascriptom za modale bez preusmjaravanja -->
    <div class ="phonepost hidden-lg-up" style="background-color:#2d89e5">
      <div class="nav-item" style="right: -14px; bottom:-12px; position: relative;">
        <span class="fa fa-pencil fa-3x" style="color: #fff" id="newpost"></span>
      </div>
    </div>
    </a>
    <!-- ////NEW POST ZA MOBITELE -->





    <!-- SETTINGS ZA MOBITELE -->
    <a data-toggle="modal" data-target="#phoneusermodal">
      <div class ="phonesettings hidden-lg-up" style="background-color:#2d89e5">
        <div class="nav-item" style="left: 18px; top:10px; position: relative;">
          <span class="fa fa-user fa-3x" style="color: #fff" id="newpost"></span>
        </div>
      </div>
    </a>
    <!-- ///SETTINGS ZA MOBITELE -->

    @else

    <a data-toggle="modal" data-target="#registermodal">
    <div class ="phonesettings hidden-lg-up" style="background-color:#2d89e5">
      <div class="nav-item" style="left: 14px; bottom:-19px; position: relative;">
        <img src="img/create_account.png" id="newpost" width="40px"></a>
      </div>
    </div>
    </a>



    <a data-toggle="modal" data-target="#loginmodal">
    <div class ="phonepost hidden-lg-up" style="background-color:#2d89e5">
      <div class="nav-item" style="right: -16px; bottom:-14px; position: relative;">
        <img src="img/log_in.png" id="newpost" width="40px">
      </div>
    </div>
    </a>


    @endif



    <!--NORMAL POST/MESSAGES/SORT -->
    @if (Auth::check())
    <div class="container">
      <div class="row">
        <div class="col-lg-1 hidden-md-down">
          <div class="nav navbar navbar-light mb-3 navbar-brand" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">
            <a class="nav-link p-0" data-toggle="modal" data-target="#create_ad_modal">
            <div class="nav-item p-0">
              <span class="fa fa-edit fa-2x" style="color: #fff; padding-left:10px; padding-top: 5px; padding-bottom: 5px;" id="newpost"></span>
            </div>
            </a>
          </div>
        </div>



        <!--<div class="col-lg-1 offset-lg-10 hidden-md-down">
          <div class="nav navbar navbar-light mr-2 mb-3 navbar-brand" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">
            <a class="nav-link p-0" data-toggle="modal" data-target=" ">
              <div class="p-0">
                <span class="fa fa-bell fa-2x" style="color: #fff" id="newpost"></span>
              </div>
            </a>
          </div>
        </div>-->


      </div>
    </div>

    @endif
           
    <!--/////NORMAL POST/MESSAGES/SORT -->

    




<!--POCETAK MODALA ZA EDITANJE POSTOVA-->
    @if (Auth::check())
    <div class="modal fade" id="selectedad_edit" tabindex="-1" role="dialog" aria-labelledby="create_ad_modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #2d89e5; color:white;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color:white;">&times;</span>
            </button>
            <h4 class="modal-title" id="create_ad_modalLabel"><b><span class="fa fa-edit fa-1x" style="color: #fff" ></span>&nbsp; Create an ad</b></h4>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <form action="{{ route('ad.update', $ad_select->id) }}" method="PATCH" enctype="multipart/form-data">
                      <input type="text" class="form-control mb-1" name="ad_title" placeholder="Nudim popravak računala.">
                    <textarea class="form-control mb-1" rows="5" name="ad_body" placeholder="Popraviti ću bilo koji problem sa računalom ili laptopom, software i hardware."></textarea>
                      <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-phone fa-fw"></i></span>
                          <input class="form-control" type="text" name="ad_contact" placeholder="111-222-434-2" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>
                      </div>
                      <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-money fa-fw"></i></span>
                          <input class="form-control" type="text" name="ad_price" placeholder="100kn" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>
                      <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-map-marker fa-fw"></i></span>
                          <input class="form-control" type="text" name="ad_location" placeholder="Rijeka, Croatia" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>
                      <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-photo fa-fw"></i></span>
                          <input class="form-control" type="file" name="ad_image" placeholder="Prenesi fotografiju" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>
                  </div>
                </div>
              </div>
            </div>
          <div class="modal-footer">
            <button type="submit" class="form-control btn btn-primary border-r-0">Publish</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    @endif
    <!--/////MODAL ZA EDITANJE POSTOVA-->








    <!--POCETAK MODALA ZA STVARANJE POSTOVA-->
    @if (Auth::check())
    <div class="modal fade" id="create_ad_modal" tabindex="-1" role="dialog" aria-labelledby="create_ad_modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #2d89e5; color:white;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color:white;">&times;</span>
            </button>
            <h4 class="modal-title" id="create_ad_modalLabel"><b><span class="fa fa-edit fa-1x" style="color: #fff" ></span>&nbsp; Create an ad</b></h4>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <form action="{{ route('ad.create') }}" method="post" enctype="multipart/form-data">
                      <input type="text" class="form-control mb-1" name="ad_title" placeholder="Nudim popravak računala.">
                    <textarea class="form-control mb-1" rows="5" name="ad_body" placeholder="Popraviti ću bilo koji problem sa računalom ili laptopom, software i hardware."></textarea>
                      <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-phone fa-fw"></i></span>
                          <input class="form-control" type="text" name="ad_contact" placeholder="111-222-434-2" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>
                      </div>
                      <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-money fa-fw"></i></span>
                          <input class="form-control" type="text" name="ad_price" placeholder="100kn" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>
                      <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-map-marker fa-fw"></i></span>
                          <input class="form-control" type="text" name="ad_location" placeholder="Rijeka, Croatia" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>
                      <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-photo fa-fw"></i></span>
                          <input class="form-control" type="file" name="ad_image" placeholder="Prenesi fotografiju" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>
                  </div>
                </div>
              </div>
            </div>
          <div class="modal-footer">
            <button type="submit" class="form-control btn btn-primary border-r-0">Publish</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    @endif
    <!--/////MODAL ZA STVARANJE POSTOVA-->




    






<!-- MODAL ZA LOGIN -->
      <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #2d89e5; color:#fff;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: #fff;">&times;</span>
              </button>
              <h4 class="modal-title" id="create_ad_modalLabel"><b>Log In</b></h4>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <form action="{{route('signin')}}" method="post">

                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-user fa-fw"></i></span>
                          <input class="form-control" type="text" name="username" placeholder="John Doe" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>

                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-key fa-fw"></i></span>
                          <input class="form-control" type="password" name="password" placeholder="Password" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>

                        <button type="submit" class="form-control btn btn-primary border-r-0">Log In</button>

                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </div>
      </div>
     <!-- //MODAL ZA LOGIN -->











<!-- MODAL ZA PHONE KORISNIKA -->
      <div class="modal fade" id="phoneusermodal" tabindex="" role="" aria-labelledby="phoneusermodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #2d89e5; color:#fff;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
              </button>
              <h4 class="modal-title" id="create_ad_modalLabel"><b>Settings</b></h4>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                        <button class="form-control btn btn-primary border-r-0 mb-1 mt-1"><i class="fa fa-user fa-fw mr-1" aria-hidden="true"></i>My Profile</button>

                        <button class="form-control btn btn-primary border-r-0 mb-1"><i class="fa fa-user fa-fw mr-1" aria-hidden="true"></i>Account Settings</button>

                       <a href="{{ route('logout') }}"> <button class="form-control btn btn-primary border-r-0 mb-1"><i class="fa fa-user fa-fw mr-1" aria-hidden="true"></i>Logout</button> </a>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     <!-- //MODAL ZA PHONE KORISNIKA -->














<!-- MODAL ZA REGISTER -->
      <div class="modal fade" id="registermodal" tabindex="" role="" aria-labelledby="registermodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #2d89e5; color:#fff;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
              </button>
              <h4 class="modal-title" id="create_ad_modalLabel"><b>Create An Account</b></h4>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <form action="{{ route('signup') }}" method="post">
                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-user fa-fw"></i></span>
                          <input class="form-control" type="text" name="username" placeholder="John Doe" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>

                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-envelope fa-fw"></i></span>
                          <input class="form-control" type="text" name="email" placeholder="john.doe@example.com" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>

                        <div class="input-group mb-1">
                          <span class="input-group-addon" style="color:#2d89e5; border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;"><i class="fa fa-key fa-fw"></i></span>
                          <input class="form-control" type="password" name="password" placeholder="****" style="border-color:#2d89e5; border-left-style: hidden; border-top-style: hidden; border-right-style: hidden;">
                        </div>

                          <!--@if($errors->any())
                              <div style="background-color: #fff; padding:5px; color:#2d89e5; margin-bottom: 10px; text-align: center;">
                                  @foreach($errors->all() as $error)
                                      <p>{{ $error }}</p>
                                  @endforeach
                              </div>
                                  @endif-->

                        <button type="submit" class="form-control btn btn-primary border-r-0">Register</button> 

                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </div>
      </div>
     <!-- //MODAL ZA REGISTER -->











  
<!-- MODAL ZA ODABRANI AD -->
      <div class="modal fade" id="selectedad"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-header" style="background-color: #fff; color:#000;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:black;">&times;</span>
              </button>
            </div>
                          <!--<a data-toggle="modal" data-target="#create_ad_modal2" style="text-decoration:none;">-->
                        
                              <div class="card">
                                  <img class="card-img-top img-fluid" src="image/{{ $ad_select->ad_image }}" style="border-radius:0px;">
                                <div class="card-block">
                                  <h4 class="card-title">{{$ad_select->ad_title}}</h4>
                                  <p class="card-text">{{$ad_select->ad_body}}</p>
                                </div>

                                <div class="list-group" style="border-radius: 0px;">
                                  <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="callto:{{ $ad_select->ad_contact }}"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad_select->ad_contact }}</a>
                                  <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad_select->ad_price }}</a>
                                  <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad_select->ad_location }}</a>
                                  @if (Auth::check())
                                    @if (Auth::user() == $ad_select->user)
                                      <a href="{{route('ad.delete', $ad_id = $ad_select->id)}}">
                                        <button type="submit" id="delete" class="form-control btn btn-primary border-r-0">Delete</button>
                                      </a>
                                    @else
                                        <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i><i>&nbsp; Posted by {{ $ad_select->user['username'] }}</i></a>
                                    @endif
                                  @endif

                              </div>
                        </div>

                  </div>
                </div>

      <!--//MODAL ZA ODABRANI AD -->













<!--FEED-->
    <div class="container" id="feed">

      <div class="row">
        @foreach($ads as $ad)

          <div class="col-lg-12 hidden-lg-up" style="background-color:#f7f7f7">

            <hr>

          </div>

          <div class="col-xl-4 hidden-md-down">
            <!--<a data-toggle="modal" data-target="#create_ad_modal2" style="text-decoration:none;">-->
              <a href="{{ route('ad.show', $ad->id) }}" style="text-decoration: none;">
                <div class="card">
                    <img class="card-img-top img-fluid" src="image/{{ $ad->ad_image }}" style="border-radius:0px;">
                  <div class="card-block">
                    <h4 class="card-title">{{$ad->ad_title}}</h4>
                    <p class="card-text">{{$ad->ad_body}}</p>
                  </div>

                  <div class="list-group" style="border-radius: 0px;">
                    <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="callto:{{ $ad->ad_contact }}"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_contact }}</a>
                    <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_price }}</a>
                    <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_location }}</a>
                    @if (Auth::check())
                      @if (Auth::user() == $ad->user)
                        <a href="{{route('ad.delete', $ad_id = $ad->id)}}">
                          <button type="submit" id="delete" class="form-control btn btn-primary border-r-0">Delete</button>
                        </a>
                      @else
                          <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i><i>&nbsp; Posted by {{ $ad->user['username'] }}</i></a>
                      @endif
                    @endif
                  </div>

                </div>
            </a>
          </div>




          <div class="col-xl-4 hidden-lg-up">
            <!--<a data-toggle="modal" data-target="#create_ad_modal2" style="text-decoration:none;">-->
                <div class="card">
                    <img class="card-img-top img-fluid" src="image/{{ $ad->ad_image }}" style="border-radius:0px;">
                  <div class="card-block">
                    <h4 class="card-title">{{$ad->ad_title}}</h4>
                    <p class="card-text">{{$ad->ad_body}}</p>
                  </div>

                  <div class="list-group" style="border-radius: 0px;">
                    <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="callto:{{ $ad->ad_contact }}"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_contact }}</a>
                    <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_price }}</a>
                    <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; {{ $ad->ad_location }}</a>
                    @if (Auth::check())
                      @if (Auth::user() == $ad->user)
                        <a href="{{route('ad.delete', $ad_id = $ad->id)}}">
                          <button type="submit" id="delete" class="form-control btn btn-primary border-r-0">Delete</button>
                        </a>
                      @else
                          <a class="list-group-item" style="border-radius: 0px; text-decoration: none; color:#2d89e5; border-right-style:hidden; border-left-style: hidden;" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i><i>&nbsp; Posted by {{ $ad->user['username'] }}</i></a>
                      @endif
                    @endif
                  </div>

                </div>
          </div>


          

        @endforeach

    </div>
  </div>

    <!--/////KRAJ FEEEDA-->

    <div class="footer mt-3">


    </div>




@endsection

@section('scripts')
  <script type="text/javascript">
    //$("#registermodal").modal({
      //@if ($errors->any())
        //show:true
      //@else
        //show:false
      //@endif
    //}); 

    $('#selectedad_edit').modal({
      show:true
    });

    $('#feed').hide();
    $('#feed').fadeIn(1000);
    $(document).ready();
  </script>
@endsection