@extends('layouts.app')

@section('content')
<div class="bg-login">
    <div class="wrapper">
		<div class="section-authentication-login d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="card-body p-md-5">
									<div class="text-center">
                                        <img src="assets/images/logo.svg" width="60%" alt="">		
									</div>
 
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group mt-4">
                                            <label>Name</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-group mt-4">
                                            <label>Email Address</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-group mt-4">
                                            <label>Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group mt-4">
                                            <label>Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">I read and agree to Terms & Conditions</label>
                                            </div>
                                        </div>
                                        <div class="btn-group mt-3 w-100">
                                            <button type="submit" class="btn btn-danger btn-block">Register</button>
                                            <button type="submit" class="btn btn-danger"><i class="lni lni-arrow-right"></i>
                                            </button>
                                        </div>
                                        <hr/>
                                        <div class="text-center mt-4">
                                            <p class="mb-0">Already have an account? <a href="{{route('login')}}">Login</a>
                                            </p>
                                        </div>
 
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6">
								<img src="{{asset('assets/images/login-images/register-frent-img.jpg')}}" class="card-img login-img h-100" alt="...">
							</div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
