@extends('master')


@section('title')

	ZoneFunds - Login or Register

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


			<div class="col-md-8 offset-md-2 col-lg-4 offset-lg-4">
				<div class="card" id="login">
					<div class="card-block">
						<form>
							  <div class="form-group input-group">
							  	<span class="input-group-addon" id="basic-addon1"><img src="img/user.png" height="18px" class=""></span>
							    <input type="text" class="form-control border-r-0" id="exampleInputName2" placeholder="John Doe" aria-describedby="basic-addon1">
							  </div>
							  <div class="form-group input-group">
							  	<span class="input-group-addon" id="basic-addon2"><img src="img/pas.png" height="17px" width="20" class=""></span>
							    <input type="password" class="form-control border-r-0" placeholder="****" aria-describedby="basic-addon2">
							  </div>
							  <button type="submit" class="form-control btn btn-primary border-r-0">Log In</button>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-8 offset-md-2 col-lg-4 offset-lg-4">
					<div class="card" id="register">
					  <div class="card-block">
					    <form>
						  <div class="form-group border-r-0">
						    <input type="text" class="form-control border-r-0" id="formGroupExampleInput" placeholder="John Doe">
						  </div>
						  <div class="form-group border-r-0">
						    <input type="text" class="form-control border-r-0" id="formGroupExampleInput2" placeholder="john.doe@example.com">
						  </div>
						  <div class="form-group border-r-0">
						    <input type="password" class="form-control border-r-0" id="formGroupExampleInput2" placeholder="****">
						  </div>
						  <a href="#" class="form-control btn btn-primary border-r-0">Register</a> 
						  </div>
						</form>
					  </div>
					</div>

				</div>

		</div>

	</div>

@endsection()

