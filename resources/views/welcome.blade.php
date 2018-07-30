@extends('master')


@section('title')

    ZoneFunds - Login or Register

@endsection

@section('css')

    <link rel="stylesheet" href="css/custom.css"/>

    <link rel="stylesheet" href="css/zonefunds.css">

@endsection


@section('content')

<div class="layer">
</div>


    <div class="container" style="background:transparent;">

        <div class="row">

            <div class="col-md-8 offset-md-2 text-xs-center font-white mb-2">

                <img src="img/zonefundsheader.png" class="img-fluid" />
                <i class="h3 hidden-xs-down">Earning money has never been easier.</i>
                <i class="h6 hidden-sm-up">Earning money has never been easier.</i>

            </div>


        </div>


        <div class="row">

            <!--POCETAK LOG IN FORMA -->

            <div class="col-md-8 offset-md-2 col-lg-4 offset-lg-4">
                <div class="card" id="login">
                    <div class="card-block">
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

            <!-- KRAJ LOG IN FORMA -->




            <!-- POCETAK REGISTER FORMA -->

            <div class="col-md-8 offset-md-2 col-lg-4 offset-lg-4">
                <div class="card" id="register">
                  <div class="card-block">
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

            <!-- KRAJ REGISTER FORMA -->

        </div>

    </div>

@endsection()

