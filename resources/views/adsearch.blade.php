@extends('master') <!--odabiremo glavni kod u master.blade.php datoteci -->

<!-- odabiremo sekciju odredjenu u glavnom kodu -->

@section('title') 

  ZoneFunds

@endsection


@section('content')




    @if (Auth::check()) <!-- provjeravamo dali stranicu preko mobitela pregledava authentificirani korisnik ili gost, te biramo opcije -->

    <!-- NEW POST ZA MOBITELE -->
    <a style="" data-toggle="modal" data-target="#create_ad_modal"> <!-- koristimo bootstrap sa ugrađenim javascriptom za modale bez preusmjaravanja -->
    <div class ="phonepost hidden-lg-up">
      <div class="nav-item" style="right: -16px; bottom:-14px; position: relative;">
        <img src="img/newpost.png" id="newpost" width="40px">
      </div>
    </div>
    </a>
    <!-- ////NEW POST ZA MOBITELE -->





    <!-- SETTINGS ZA MOBITELE -->
    <div class ="phonesettings hidden-lg-up">
      <div class="nav-item" style="left: 15px; top:10px; position: relative;">
        <img src="img/user_logged_in.png" id="newpost" width="40px"></a>
      </div>
    </div>
    <!-- ///SETTINGS ZA MOBITELE -->

    @else

    <a data-toggle="modal" data-target="#registermodal">
    <div class ="phonesettings hidden-lg-up">
      <div class="nav-item" style="left: 14px; bottom:-19px; position: relative;">
        <img src="img/create_account.png" id="newpost" width="40px"></a>
      </div>
    </div>
    </a>



    <a data-toggle="modal" data-target="#loginmodal">
    <div class ="phonepost hidden-lg-up">
      <div class="nav-item" style="right: -16px; bottom:-14px; position: relative;">
        <img src="img/log_in.png" id="newpost" width="40px">
      </div>
    </div>
    </a>


    @endif








    <!--NORMAL NAVBAR -->
    <div id="navbar_main" class="nav navbar navbar-light bg-faded hidden-md-down {{ Auth::check() ? '' : 'mb-3'}}">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="img/zonefundsheader.png" width="200px" class="d-inline-block align-top" alt="">
        </a>

        @if (Auth::check())
          <a href="{{ route('logout') }}">
            <div class="btn-group float-xs-right mt-1 ml-1">
              <img src="img/logout.png" id="newpost" height="30px;">
            </div>
          </a>
            <div class="float-xs-right ml-1 pt-1" style="color:white;">
              <p class="lead">{{ $user->username }}</p>
            </div>
            <div class="btn-group float-xs-right mt-1">
              <img src="img/user_logged_in.png" id="newpost" height="30px;">
            </div>

        @else

          <div class="navbar-brand float-xs-right pt-1 m-0">
          <form class="form form-inline">
            <button type="button" class="form-control btn btn-primary border-r-0" id="no_auth_btn"data-toggle="modal" data-target="#loginmodal">Log In</button>
            <button type="button" id="no_auth_btn" class="form-control btn btn-primary border-r-0" data-toggle="modal" data-target="#registermodal">Create An Account</button>
            </form>
          </div>

        @endif


        </div>
    </div>
    <!-- ////NORMAL NAVBAR-->




    <!--PHONE NAVBAR (CENTERED HEADER) -->
    <div id="navbar_main" class="nav navbar navbar-light bg-faded hidden-lg-up mb-3">
      <div class="container">
        <a class="navbar-brand" href="#" style="left: 50%; position: relative; transform: translateX(-50%);">
          <img src="img/zonefundsheader.png" width="250px" class="d-inline-block align-top" alt="">
        </a>
      </div>
    </div>
    <!--////PHONE NAVBAR (CENTERED HEADER) -->




    <!--NORMAL POST/MESSAGES/SORT -->
    @if (Auth::check())
    <div class="container">
      <div class="row">
        <div class="col-lg-1 hidden-md-down">
          <div class="nav navbar navbar-light mb-3" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">
                    <ul class="nav navbar-nav">
                      <li>
                        <a class="nav-link p-0" data-toggle="modal" data-target="#create_ad_modal">
                        <div class="nav-item p-0">
                        <img src="img/newpost_blue.png" class="img-fluid" height="40px" id="newpost">
                        </div>
                        </a>
                      </li>
                    </ul>
                </div>
              </div>


              <div class="col-lg-4 offset-lg-3 hidden-md-down">
                <div class="nav navbar navbar-light mb-3" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">
                  <ul class="nav navbar-nav">
                    <li>
                      <form action="{{ route('ad.search') }}" method="get">
                        <div class="nav-item p-0">
                        <input type="image" src="img/search.png" style="background-image: url('img/search.png'); height: 33px; border:0; display:block;" id="newpost">
                        </div>
                      </form>
                    </li>
                    <li>
                      <input class="ml-1" id="search" placeholder="Search">
                    </li>
                  </ul>
              </div>
            </div>



            <div class="col-lg-1 float-xs-right hidden-md-down">
          <div class="nav navbar navbar-light mb-3" id="navbar_small" style=" border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">
                    <ul class="nav navbar-nav">
                      <li>
                        <a class="nav-link p-0" data-toggle="modal" data-target=" ">
                        <div class="nav-item p-0">
                        <img src="img/notification.png" class="img-fluid" height="40px" id="newpost">
                        </div>
                        </a>
                      </li>
                    </ul>
                </div>
              </div>


          </div>
        </div>




      @endif
           
    <!--/////NORMAL POST/MESSAGES/SORT -->

    



    <!--POCETAK MODALA ZA STVARANJE POSTOVA-->
    @if (Auth::check())
    <div class="modal fade" id="create_ad_modal" tabindex="-1" role="dialog" aria-labelledby="create_ad_modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #2d89e5; color:white;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color:white;">&times;</span>
            </button>
            <h4 class="modal-title" id="create_ad_modalLabel">Create an ad</h4>
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
                        <span class="input-group-addon" id="sizing-addon2"><img src="img/contact.png" height="17px"></span>
                        <input type="text" class="form-control" name="ad_contact" placeholder="282128376" aria-describedby="sizing-addon2">
                      </div>
                      <div class="input-group mb-1">
                        <span class="input-group-addon" id="pricemodal"><img src="img/price.png" height="17px"></span>
                      <input type="text" class="form-control" name="ad_price" placeholder="100kn" aria-describedby="pricemodal">
                      </div>
                      <div class="input-group mb-1">
                        <span class="input-group-addon" id="pricemodal"><img src="img/location.png" height="17px"></span>
                      <input type="text" class="form-control" name="ad_location" placeholder="Rijeka, Croatia" aria-describedby="pricemodal">
                      </div>
                      <div class="input-group mb-1">
                        <span class="input-group-addon" id="pricemodal"><img src="img/photo.png" height="17px"></span>
                      <input type="file" class="form-control" name="ad_image" placeholder="Upload a picture" aria-describedby="pricemodal">
                      </div>
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

    @endif
    <!--/////MODAL ZA STVARANJE POSTOVA-->




    






<!-- MODAL ZA LOGIN -->
      <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #2d89e5; color:white;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: #fff;">&times;</span>
              </button>
              <h4 class="modal-title" id="create_ad_modalLabel">Log In</h4>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <form action="{{route('signin')}}" method="post">
                        <div class="form-group input-group">
                          <span class="input-group-addon" id="basic-addon1"><img src="img/user.png" height="18px" class=""></span>
                          <input type="text" class="form-control border-r-0" name="username" placeholder="John Doe" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group input-group">
                          <span class="input-group-addon" id="basic-addon2"><img src="img/pas.png" height="17px" width="20" class=""></span>
                          <input type="password" class="form-control border-r-0" name="password" placeholder="****" aria-describedby="basic-addon2">
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

















<!-- MODAL ZA REGISTER -->
      <div class="modal fade" id="registermodal" tabindex="" role="" aria-labelledby="registermodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #2d89e5; color:white;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
              </button>
              <h4 class="modal-title" id="create_ad_modalLabel">Create An Account</h4>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <form action="{{ route('signup') }}" method="post">
                        <div class="form-group border-r-0">
                          <input type="text" class="form-control border-r-0" name="username" placeholder="John Doe">
                        </div>
                        <div class="form-group border-r-0">
                          <input type="text" class="form-control border-r-0" name="email" placeholder="john.doe@example.com">
                        </div>
                        <div class="form-group border-r-0">
                          <input type="password" class="form-control border-r-0" name="password" placeholder="****">
                        </div>

                          @if($errors->any())
                              <div style="background-color: #2d89e5; padding:5px; color:white; margin-bottom: 10px; text-align: center;">
                                  @foreach($errors->all() as $error)
                                      <p>{{ $error }}</p>
                                  @endforeach
                              </div>
                                  @endif

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











  






    <!--FEED-->
    <div class="container">

      <div class="row">
        @foreach($ads as $ad)
          <div class="col-lg-6">
            <!--<a data-toggle="modal" data-target="#create_ad_modal2" style="text-decoration:none;">-->
              <div class="card">
                  <img class="card-img-top img-fluid" src="image/{{ $ad->ad_image }}" style="border-radius:0px;">
                <div class="card-block">
                  <h4 class="card-title">{{$ad->ad_title}}</h4>
                  <p class="card-text">{{$ad->ad_body}}</p>
                </div>
                <ul class="list-group list-group-flush" style="border-radius:0px;">
                  <div class="input-group" style="border-radius:0px; color: #2d89e5;">
                    <span style="border-radius:0px;" class="input-group-addon" id="basic-addon2"><img src="img/contact.png" style="border-radius:0px;" height="17px" width="20" class=""></span>
                    <li class="list-group-item" aria-describedby="basic-addon2" style="border-radius:0px;">{{$ad->ad_contact}}</li>
                  </div>
                  <div class="input-group" style="border-radius:0px;">
                  <span style="border-radius:0px;" class="input-group-addon" id="basic-addon2"><img src="img/price.png" style="border-radius:0px;" height="17px" width="20" class=""></span>
                    <li class="list-group-item" style="border-radius:0px; color: #2d89e5;"">{{$ad->ad_price}}</li>
                  </div>
                  <div class="input-group" style="border-radius:0px;">
                  <span style="border-radius:0px;" class="input-group-addon" id="basic-addon2"><img src="img/location.png" style="border-radius:0px;" height="20px" width="20" class=""></span>
                  <li class="list-group-item" style="border-radius:0px; color: #2d89e5;">{{$ad->ad_location}}</li>
                  </div>
                  @if (Auth::check())
                    @if (Auth::user() == $ad->user)
                      <a href="{{route('ad.delete', $ad_id = $ad->id)}}">
                        <button type="submit" id="delete" class="form-control btn btn-primary border-r-0">Delete</button>
                      </a>
                    @else
                        <li class="list-group-item text-muted" style="border-radius:0px; color: #2d89e5; padding:10px;"><i>Posted by {{$ad->user['username']}}</i></li>
                    @endif
                  @endif
                </ul>
              </div>
            <!--</a>-->
          </div>


          <div class="col-md-12 hidden-lg-up" style="background-color:#fff">

            <hr>

          </div>

        @endforeach

    </div>

    <!--/////KRAJ FEEEDA-->


<style type="text/css">
body{
  background-color: #f7f7f7;
}

.btn-user{
  background-color: none;
  color: #2d89e5;
}

.form-control{
  border-radius:0px;
}

.input-group-addon{
  border-radius: 0px;
}

#delete{
  transition: .2s;
  background-color: #ff4c4c;
  border-color: #ff4c4c;
}


#delete:hover{
  background-color:#fff;
  color:#ff4c4c;
  border-color:#ff4c4c;

}

#delete:focus{
  background-color:#fff;
  color:#ff4c4c;
  border-color:#ff4c4c;

}

#no_auth_btn
{
  transition: .2s;
  background-color: #fff ;
  border-radius:0px;
  border-color: none;
  color:#2d89e5;
}

#no_auth_btn:hover
{
  background-color: #2d89e5 ;
  border-radius:0px;
  border-color: #fff;
  color:#fff;
}

#no_auth_btn:focus
{
  background-color: #2d89e5 ;
  border-radius:0px;
  border-color: #fff;
  color:#fff;
}

.btn-primary{
  transition: .2s;
  background-color: #2d89e5 ;
  border-radius:0px;
  border-color: none;
}


.btn-primary:hover{
  background-color:#fff;
  color:#2d89e5;
  border-color:#2d89e5;

}

.btn-primary:focus{
  background-color:#fff;
  color:#2d89e5;
  border-color:#2d89e5;

}


a{
  text-decoration:none;
  cursor: pointer;
}

.phonepost{
  width: 70px; 
  height: 70px; 
  background: #2d89e5; 
  -moz-border-radius: 50px; 
  -webkit-border-radius: 50px; 
  border-radius: 50px;
  position:fixed !important; 
  bottom: 0 !important;
  right: 0 !important;
  margin-right: 10px;
  margin-bottom: 10px !important;
  z-index: 1 !important; 
  box-shadow: 0 1px 3px rgba(0,0,0,.5);
}


.phonesettings{
  width: 70px; 
  height: 70px; 
  background: #2d89e5; 
  -moz-border-radius: 50px; 
  -webkit-border-radius: 50px; 
  border-radius: 50px;
  position:fixed !important; 
  bottom: 0 !important;
  left: 0 !important;
  margin-left: 10px;
  margin-bottom: 10px !important;
  z-index: 1 !important; 
  box-shadow: 0 1px 3px rgba(0,0,0,.5);
}


#newpost{
  transition: .9s;
}

#newpost:hover{
  -webkit-transform: rotate(360deg);
          transform: rotate(360deg);

}


.input-group-addon{
  background-color: #fff;
  border-left-style: hidden;
}



.input-group{
  border-radius:0px;
}

.list-group-item
{
    border-radius:0px;
}

.btn-primary{
  transition: .2s;
}

.btn-primary:hover{
  background-color:#fff;
  color:#2d89e5;
  border-color:#2d89e5;

}

.btn-primary:focus{
  background-color:#fff;
  color:#2d89e5;
  border-color:#2d89e5;

}

#test{
  border-radius:0px;
  width:200px;
}

.card{
  box-shadow: 0 1px 3px rgba(0,0,0,.2);
  transition: .2s;
  border-radius: 0px;
}

.card:hover{
  cursor: pointer;
}

#navbar_main{
  background-color: #2d89e5;
  box-shadow: 0 1px 3px rgba(0,0,0,.2);
  border-radius: 0px;
}

#navbar_small{
  background-color: #fff;
  box-shadow: 0 1px 3px rgba(0,0,0,.2);
}

  #sidebar{
    height:100vh;
    width:200px;

  }

#search{
  width: 80%; 
  border-color: #2d89e5; 
  border-style: solid;
  border-top-style: hidden; 
  border-left-style: hidden;
  border-right-style: hidden;
}

</style>


@endsection