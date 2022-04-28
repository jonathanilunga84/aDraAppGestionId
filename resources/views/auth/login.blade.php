<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="{{asset('myStyles/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('myStyles/css/fontawesome-free-6.1.1-web/css/all.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('myStyles/css/mainStyle.css')}}" />
		<title>Login ADRA</title>
	</head>
	<body class="bg-light">
		<div id="login-mergin-top" class="container bg-dangerM">
			<div class="row">
				<div id="login-logo" class="col-sm-12 text-center bg-infoM">
					<img src="{{asset('myStyles/images/Logo adra.png')}}" />
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-sm-12 col-md-5 bg-warningM card pt-3 pb-3 ml-sm-2">
					<div class="row">
						<div class="col">
				            @error('email')
				                <div class="validate text-danger">{{$message}}</div>
				            @enderror
				        </div>
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<div class="input-group col-sm-12M col-md-6 col-lg-6 mb-3">
								<input type="text" name="email" id="email" class="form-control" placeholder="Username" value="{{old('email')}}" autofocus />
								<span class="input-group-text bg-adra" id="username-icon"><i class="fa-solid fa-user"></i></span>
							</div>
							<div class="col-sm-12 col-md-6 input-group mb-3">
								<input type="password" name="password" id="password" class="form-control" value="{{old('password')}}" placeholder="Mot de passe" />
								<span class="input-group-text bg-adra" id="password-icon"><i class="fa-solid fa-lock"></i></span>
							</div>
							<button class="btn bg-adra fw-bold form-control">Connexion</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<script src="{{asset('myStyles/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
	</body>
</html>