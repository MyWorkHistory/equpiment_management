@extends('layouts.app')

@section('content')
 

<div class="bg-login">
	<!-- wrapper -->
	<div class="">
		<div class="section-authentication-login d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-12 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="card-body p-md-5">
									<div class="text-center">
										<img src="{{asset('assets/images/logo.svg')}}" width="60%" alt="">										 
									</div>
									 
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group mt-4">
                                            <label>Email Address</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Enter your email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                        </div>
                                        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password" placeholder="Enter your password" />
                                        </div>
                                    
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-row">
                                            <div class="form-group col">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customSwitch1">Remember Me</label>
                                                </div>
                                            </div>
                                        
                                            
                                            @if (Route::has('password.request'))
                                            <div class="form-group col text-right"> <a href="{{ route('password.request') }}"><i class='bx bxs-key mr-2'></i>Forget Password?</a>
                                            </div> 
                                            @endif
                                            
                                        </div>
                                        <div class="btn-group mt-3 w-100">
                                            <button type="submit" class="btn btn-danger btn-block">Log In</button>
                                            <button type="submit" class="btn btn-danger"><i class="lni lni-arrow-right"></i>
                                            </button>
                                        </div>
                                        <hr>
                                        <!-- <div class="text-center">
                                            <p class="mb-0">Don't have an account? <a href="{{route('register')}}">Sign up</a>
                                            </p>
                                        </div> -->
                                    </form>
								</div>
							</div>
							<div class="col-lg-6">
								<img src="{{asset('assets/images/login-images/login-frent-img.webp')}}" class="card-img login-img"  style="height:660px;width:100%" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</div>
@endsection
