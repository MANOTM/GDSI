@extends('layouts.master2')
@section('css')
@if (app()->getLocale()=='en')
	<link rel="stylesheet" href="{{asset('assets/our-style/ltr.css')}}">
@endif
<link rel="stylesheet" href="{{ asset('assets/our-style/css.css') }}">
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('title')
{{ __('message.Login') }}
@endsection
@section('content')
		<div class="container-fluid text-align-end" >
			<div class="row no-gutter row-reverse">
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex">  <img src="{{URL::asset('assets/img/brand/ministry-logo-ar.png')}}" class="sign-favicon" style="width: 100%" alt="logo"> </div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h5 class="font-weight-semibold mb-4">{{__('message.Login')}}.</h5>
												<form method="POST" action="{{ route('login.store') }}">
                                                    @csrf                            
													@if(session('status'))
														<div class="form-group bg-danger-gradient text-light p-2">
																{{ session('status') }}
														</div>
													@endif
													<div class="form-group">
														<label>{{__('message.Email')}}</label> <input dir="{{app()->getLocale()=='en'?'ltr':''}}" class="form-control text-black @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{__('message.Saisir Email')}}" type="text">
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
													</div>
													<div class="form-group">
														<label>{{__('message.Password')}}</label> <input dir="{{app()->getLocale()=='en'?'ltr':''}}" class="form-control @error('password') is-invalid @enderror" name="password"   autocomplete="current-password" placeholder='{{__('message.SaisirPassword')}}' type="password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
													</div>
													<div class="form-check mg-b-8 flex-gap p_l0" >   
														<input class="mg-l-2" type="checkbox" name="remember" id="remember" checked >
														<label class="form-check-label" for="remember">  {{__('message.Remember_me')}}  </label>
													</div> 
													<button class="btn btn-main-primary btn-block">{{__('message.CONNEXION')}}</button>
												</form> 
											</div>
										</div>
										<div class="langue row-reverse	">
											<a href="{{route('convertLanguage','ar')}}" class="{{app()->getLocale()=='ar'?'active':''}}">{{__("message.Arabic")}}</a>
											<p>|</p>
											<a href="{{route('convertLanguage','en')}}" class="{{app()->getLocale()=='en'?'active':''}}">{{__('message.Français')}}</a>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
				
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex   my-bg">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<h1 class="my-title {{app()->getLocale()=='en'?'text-align-end':''}}">{{__('message.Welcom')}}<br>{{__('message.Privite')}}</h1>
							<img  src="{{URL::asset('assets/img/media/logina.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto illustration" alt="logo">
						</div>
					</div>
				</div>
			</div>
			
		</div>
@endsection
@section('js')
@endsection