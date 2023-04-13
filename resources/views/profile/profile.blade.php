@extends('layouts.master')
@section('title','الحساب')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الحساب</span>
						</div>
					</div> 
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<!-- Col -->
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											@if (auth()->user()->avatar)
												<img alt="" id="profile" src="/avatars/{{auth()->user()->avatar}}">
											@else
												<img alt="" id="profile" src="{{URL::asset('assets/img/faces/user.png')}}">
											@endif
											<a class="fas fa-camera profile-edit" href="JavaScript:void(0);" id="fileClick"></a>
										</div>
										
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{auth()->user()->name}}</h5>
												<p class="main-profile-name-text">Admin</p>
											</div>
										</div>
										<h6>البريد الاكتروني</h6>
										<div class="main-profile-bio">
											{{auth()->user()->email}}
										</div> 
										<hr class="mg-y-30">   
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div> 
					</div>

					<!-- Col -->
					<div class="col-lg-8">
						<div class="card">
							@if (session('succes'))
									<div class="alert alert-solid-success mg-b-8" role="alert">
										<button aria-label="Close" class="close" data-dismiss="alert" type="button">
											<span aria-hidden="true">&times;</span>
										</button>
										<strong> {{session('succes')}}</strong>
									</div> 
								@endif
							<div class="card-body">
								<div class="mb-4 main-content-label">المعلومات الشخصية</div>
								<form class="form-horizontal" method="POST" action="{{route('profile.edit',auth()->user()->id)}}" enctype="multipart/form-data">  
									@csrf
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="mb-4 main-content-label">الاسم</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control"  name="name" value="{{auth()->user()->name}}">
											</div>
										</div>
									</div> 
										<input type="file" name="file" id="file" class="d-none">
									 
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="mb-4 main-content-label">البريد الاكتروني</label>
											</div>
											<div class="col-md-9">
												<input type="email" class="form-control"  name="email" value="{{auth()->user()->email}}">
											</div>
										</div>
									</div> 
									
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="mb-4 main-content-label"> كلمة المرور</label>
											</div>
											<div class="col-md-9">
												<input type="password" name="password" class="form-control @error('password') is-invalid @enderror"   value="">
												@error('password')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div> 
									
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="mb-4 main-content-label"> تاكيد كلمة المرور</label>
											</div>
											<div class="col-md-9">
												<input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"  value="">
											</div>
										</div>
									</div>  
									<hr class="mg-y-30">    
									 <button type="submit" class="btn btn-primary ">تعديل المعلومات</button>
									 
								</form>
							</div>
						</div>
					</div>
					<!-- /Col -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<script>
	const fileClick = document.getElementById('fileClick'),
		  file=document.getElementById('file'),
		  profile=document.getElementById('profile')

		  fileClick.addEventListener('click',()=>{
			file.click() 
		  })
	file.addEventListener('change', (e) =>{
    const file = e.target.files[0];

    let fileReader = new FileReader();
    fileReader.readAsDataURL(file);
    fileReader.onload = function (){
        profile.setAttribute('src', fileReader.result); 
    }
})
</script>
@endsection