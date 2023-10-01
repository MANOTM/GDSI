@extends('layouts.master')
@section('title','اضفة مؤسسة')
@section('css')
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">الاعدادت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/اضافة
				مستفيذ</span>
		</div>
	</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row ">
	<div class="col-md-12">
		<div class="card  box-shadow-0">

			<div class="card-header">
				@if (session('success'))
				<div class="alert alert-solid-success mg-b-8" role="alert">
					<button aria-label="Close" class="close" data-dismiss="alert" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
					<strong>{{session('success')}}</strong>
				</div>
				@endif
				@if (session('failed'))
				<div class="alert alert-solid-danger mg-b-8" role="alert">
					<button aria-label="Close" class="close" data-dismiss="alert" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
					<strong> {{session('failed')}}</strong>
				</div>
				@endif
				<h4 class="card-title mb-1">اضافة مستفيذ جديد</h4>
				<p class="mb-2"> الحقول الذي تحتوي على <span class="tx-danger">*</span> ضروريى
				</p>

			</div>

			<div class="card-body pt-0">
				<form method="POST" action="{{route('employer.store')}}">
					@csrf
					<div class="form-group">
						<label for="inputAddress">

							الاسم الاول<span class="text-danger">*</span></label>

						<input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"
							value="{{old('nom')}}" id="inputAddress" placeholder="الاسم...">
						@error('nom')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputCity"> الاسم الاخير<span class="text-danger">*</span></label>
							<input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror"
							value="{{old('prenom')}}" id="inputCity"
								placeholder="النسب...">
							@error('prenom')
							<div class="invalid-feedback">
								{{$message}}
							</div>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="inputState">رقم المستفيذ (PPR)<span class="text-danger">*</span></label>
							<input type="text" name="ppr" value="{{old('ppr')}}" placeholder="A283.."
								class="form-control @error('ppr') is-invalid @enderror" id="inputCity">
							@error('ppr')
							<div class="invalid-feedback">
								{{$message}}
							</div>
							@enderror
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 ">
							<label for="inputState">رقم المؤسسة</label> 
								<div class="input-group">
									<input class="form-control" id="codeE" placeholder="بحت عن مؤسسة..." type="text">
									<span class="input-group-btn">
										<button id="search" class="btn btn-primary" type="submit">
											<span class="input-group-btn" id="searchIcon"><i
													class="fa fa-search"></i></span>
											<div class="spinner-border text-light d-none" role="status"
												style="width: 1rem;height: 1rem;"></div>
										</button>
									</span>
								</div> 
							<div class="text-danger mb-2 d-none" id="msg">
								*لا توجد اي مؤسسة بهذا الرقم*
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="inputState">المؤسسة<span class="text-danger">*</span></label>
							<input type="text" name="etaN" readonly name="" id="inputState"
								class="form-control @error('etaN') is-invalid @enderror" value="{{old('etaN')}}" />
							<input type="hidden" name="etaC" readonly name="" id="inputState"
								class="form-control @error('etaC') is-invalid @enderror" value="{{old('etaC')}}" />
							@error('etaN')
							<div class="invalid-feedback">
								{{$message}}
							</div>
							@enderror
						</div>
					</div> 
						<button type="submit" class="btn btn-primary">اضافة مستفيذ</button>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="row ">
	<div class="col-md-12">
		<div class="card  box-shadow-0">
			<div class="card-header d-flex justify-content-between">
				<div>
					<h4 class="card-title mb-1"></h4>
					<p class="mb-2">او يمكنك رفع ملف <span class="text-danger">CSV </span>يحتوي على المستفذين</p>
				</div>
				<a href="{{asset('files/Employer.csv')}}" class="btn btn-primary">تحميل نسخة</a>
			</div>
			
			<div class="card-body pt-0">
				<form method="POST" action="{{route('import.employer')}}" enctype="multipart/form-data">
					@csrf
					<div class="row mb-4">
						<div class="col-sm-12">
							<input type="file" class="dropify" name="file"
								accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
								data-height="100" />
						</div>
					</div> 
					<button type="submit" class="btn btn-primary">اضافة مستفيذ</button>
				</form>
			</div>
		</div>
	</div>

</div>

<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<script>
	$('#search').on('click', function (e) {
		e.preventDefault();
		var loader = $('.spinner-border')
		var searchIcon = $('#searchIcon')
		//get val of input
		var code = $('#codeE').val();
		//test if empt
		if (!code) return
		//hide msg err if exist
		$('#msg').addClass('d-none')
		//
		$('input[name="etaN"]').val('')
		$('input[name="etaC"]').val('')
		//loading logic
		searchIcon.addClass('d-none')
		loader.removeClass('d-none')
		$("#search").attr("disabled", true)
        

		$.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		$.ajax
			({
				url: '/etablissement/find',
				data: { 
					code: code
				},
				type: 'post',
				success: function (result) {
					var data = JSON.parse(result);
					if (data) {
						$('input[name="etaN"]').val(data.nom)
						$('input[name="etaC"]').val(data.id)
					} else {
						$('#msg').removeClass('d-none')
					}
					searchIcon.removeClass('d-none')
					loader.addClass('d-none')
					$("#search").attr("disabled", false)
				}
			});
	}); 
</script>


@endsection