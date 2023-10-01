@extends('layouts.master')
@section('title','التوزيع')
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
							<h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ توزيع</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
					<div class="col-lg-12">
						@error('quntite')
							<div class="alert alert-solid-warning mg-b-8" role="alert">
								<button aria-label="Close" class="close" data-dismiss="alert" type="button">
									<span aria-hidden="true">&times;</span>
								</button>
								<strong>{{ $message }}</strong>
							</div>
						@enderror
						@if (session('success'))
						<div class="alert alert-solid-success mg-b-8" role="alert">
							<button aria-label="Close" class="close" data-dismiss="alert" type="button">
								<span aria-hidden="true">&times;</span>
							</button>
							<strong>{{session('success')}}</strong>
						</div>
						@endif
						@if (session('error'))
						<div class="alert alert-solid-danger mg-b-8" role="alert">
							<button aria-label="Close" class="close" data-dismiss="alert" type="button">
								<span aria-hidden="true">&times;</span>
							</button>
							<strong> {{session('error')}}</strong>
						</div>
						@endif
					</div>
					<!-- col -->
					<div class="col-lg-12">
						<div class="card mg-b-20">
							<div class="card-body d-flex justify-content-center align-items-center p-3">
								<div class="main-content-label mb-1">معلومات التوزيع</div>
								<div class="mr-auto"><a class="d-block tx-20" data-placement="top" data-toggle="tooltip" title="Add New User" href="#"><i class="si si-plus text-muted"></i></a></div>
							</div>
						</div>
					</div>
					<!-- /col -->
					<div class="col-lg-12">
						<!-- row -->
						<div class="row row-sm">
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card">
									<div class="card-body">
										<div class="card-order">
											<h6 class="mb-2">السوق <b>{{$marche->code}}</b></h6>
											<h2 class="text-right "><i class="mdi mdi-cube icon-size float-left text-success text-success-shadow"></i><span>   {{ $marche->articles->sum('QuntiteActual') }} </span></h2>
											<p class="mb-0">نسبة المتبقية<span class="float-left">{{ $p }}%</span></p>
										</div>
									</div>
								</div>
							</div><!-- COL END -->
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card ">
									<div class="card-body">
										<div class="card-widget">
											<h6 class="mb-2">المنتج <b> {{ $article->nom }} </b></h6>
											<h2 class="text-right"><i class="fa fa-cart-plus icon-size float-left text-danger text-danger-shadow"></i><span> {{ $article->QuntiteActual }} </span></h2>
											<p class="mb-0">ثمن المنتوج (للواحد)<span class="float-left"> {{ $article->prix }} درهم</span></p>
										</div>
									</div>
								</div>
							</div><!-- COL END -->
							@isset($db)
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
									<div class="card">
										<div class="card-body">
											<div class="card-widget">
												<h6 class="mb-2"><b>{{ $db_call->db->Désignation_ar }}</b></h6>
												<h2 class="text-right"><i class="icon-size mdi mdi-poll-box   float-left text-warning text-warning-shadow"></i><span> {{ $db_call->quntite_total }} / {{ $db_call->quntite }} </span></h2>
												<p class="mb-0">نسبة المتبقية<span class="float-left">{{ $pdb }}%</span></p>
											</div>
										</div>
									</div>
								</div><!-- COL END -->
							@endisset
							@isset($employers)
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
									<div class="card ">
										<div class="card-body">
											<div class="card-widget">
												<h6 class="mb-2">مؤسسة <b> {{ $eta_call->etablisement->nom }} </b></h6>
												<h2 class="text-right"><i class="mdi mdi-account-multiple icon-size float-left text-primary text-primary-shadow"></i><span> {{ $eta_call->quantiteTotal }} / {{ $eta_call->quantite }} </span></h2>
												<p class="mb-0">نسبة المتبقية<span class="float-left">{{ $peta }}%</span></p>
											</div>
										</div>
									</div>
								</div><!-- COL END -->
							@endisset
						</div>
						<!-- /row -->
					</div>
					<!-- col -->
					<div class="col-lg-12">
						<div class="card mg-b-20">
							<div class="card-body d-flex p-3">
								<div class="main-content-label mb-0 mg-t-8">لائحة التوزيع</div>
								<div class="mr-auto"><a class="d-block tx-20" data-placement="top" data-toggle="tooltip" title="Add New User" href="#"><i class="si si-plus text-muted"></i></a></div>
							</div>
						</div>
					</div>
					<!-- /col -->
					<div class="col-lg-12 mb-5">
						<div class="card">
							<div class="table-responsive border-top userlist-table p-3">
								@isset($dbs)
									<table class="table card-table table-hover table-vcenter text-nowrap mb-0 p-3">
										<thead>
											<tr>
												<th class="wd-lg-8p">ID</th>
												<th class="wd-lg-20p">اسم الجهة</th>
												<th class="wd-lg-20p"> اسم الجهة (عربية)</th>
												<th class="wd-lg-20p">الكمية</th>
												<th class="wd-lg-20p">اخر اضافة</th>
												<th class="wd-lg-20p">توزيع / تتبع</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($dbs as $key => $db)
												<tr>
													<th class="fw-bold"> {{ $key + 1 }} </th>
													<td> {{ $db->Désignation }} </td>
													<td> {{ $db->Désignation_ar }} </td>
													<td>
														<span class="label text-{{$db->quntite?'success':'warning'}} d-flex"><div class="dot-label bg-{{$db->quntite?'success':'warning'}} ml-1"></div> {{ $db->quntite??0 }} </span>
													</td>
													<td>
														<span class="label text-muted d-flex"><div class="dot-label bg-gray-300 ml-1"></div> {{ $db->date??'غير متوفر' }} </span>
														{{-- <span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>{{ $db->date }}</span> --}}
														{{-- <span class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div> Banned</span> --}}
														{{-- <span class="label text-warning d-flex"><div class="dot-label bg-warning ml-1"></div>Pending</span> --}}
													</td>
													<td>
														<button onclick="handleClick({{$db->id}},'{{$db->Désignation_ar}}')" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8" class="btn btn-danger modal-effect mx-2"><i class="fe fe-align-right"></i></button>
														<a href="{{ route('distribution.Db',['Db_id' => $db->id, 'article_id' => $db->article]) }}" class="btn btn-success"><i class="typcn typcn-arrow-back-outline"></i></a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
									<x-dotationModal :article="$article" />
								@endisset
								@isset($etablisements)
									<table class="table card-table table-hover table-vcenter text-nowrap mb-0 p-3">
										<thead>
											<tr>
												<th class="wd-lg-8p">ID</th>
												<th class="wd-lg-20p">رقم المؤسسة</th>
												<th class="wd-lg-20p">اسم المؤسسة</th>
												<th class="wd-lg-20p">قسم</th>
												<th class="wd-lg-20p">خدمة</th>
												<th class="wd-lg-20p">دورة</th>
												<th class="wd-lg-20p">الكمية</th>
												<th class="wd-lg-20p">اخر اضافة</th>
												<th class="wd-lg-20p">توزيع / تتبع</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($etablisements as $key => $etab)
												<tr>
													<th class="fw-bold"> {{ $key + 1 }} </th>
													<td> {{ $etab->Code_etab }} </td>
													<td> {{ $etab->nom }} </td>
													<td> {{ $etab->Division }} </td>
													<td> {{ $etab->Service }} </td>
													<td> {{ $etab->Cycle }} </td>
													<td>
														<span class="label text-{{$etab->quantite?'success':'warning'}} d-flex"><div class="dot-label bg-{{$etab->quantite?'success':'warning'}} ml-1"></div> {{ $etab->quantite??0 }} </span>
													</td>
													<td>
														<span class="label text-muted d-flex"><div class="dot-label bg-gray-300 ml-1"></div> {{ $etab->date??'غير متوفر' }} </span>
														{{-- <span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>{{ $db->date }}</span> --}}
														{{-- <span class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div> Banned</span> --}}
														{{-- <span class="label text-warning d-flex"><div class="dot-label bg-warning ml-1"></div>Pending</span> --}}
													</td>
													<td>
														<button onclick="handleClickEtablisement({{$etab->id}},'{{$etab->nom}}','{{$etab->article}}')" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8" class="btn btn-danger modal-effect mx-2"><i class="fe fe-align-right"></i></button>
														<a href="{{ route('distribution.employer',['etab_id' => $etab->id, 'article_id' => $etab->article]) }}" class="btn btn-success"><i class="typcn typcn-arrow-back-outline"></i></a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
									<x-dotationModal :article="$db" />
								@endisset
								@isset($employers)
									<form method="POST" action="{{route('distribution.store_employer')}}">
										@csrf
										<div class="form-row">
											<div class="col-md-6 ">
												<label for="inputState">رقم الموظف (PPR)</label> 
													<div class="input-group">
														<input type="hidden" name="etablisement" id="hidden" value="{{ $etablisement }}" />
														<input type="hidden" name="article_id" id="hidden" value="{{ $article->id }}" />
														<input type="hidden" name="id_employer" id="hidden" />
														<input name="employer" class="form-control" placeholder="بحت عن الموظف من خلال رقمه" type="text">
														<span class="input-group-btn">
															<button id="search" class="btn btn-primary" type="button">
																<span class="input-group-btn" id="searchIcon"><i
																		class="fa fa-search"></i></span>
																<div class="spinner-border text-light d-none" role="status"
																	style="width: 1rem;height: 1rem;"></div>
															</button>
														</span>
													</div> 
												<div class="text-danger mb-2 d-none" id="msg">
													لا يوجد اي موظف بهذا الرقم
												</div>
												<div class="text-danger mb-2 d-none" id="empty">
													ادخل الرقم اولا
												</div>
											</div>
											<div class="form-group col-md-6">
												<label for="inputState">الاسم الكامل<span class="text-danger">*</span></label>
												<input type="text" name="name" readonly name="" id="inputState"
													class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" />
												@error('name')
												<div class="invalid-feedback">
													{{$message}}
												</div>
												@enderror
											</div>
										</div> 
										<div class="form-row">
											<div class="form-group col-md-12">
												<label for="inputState">رقم المنتج (خاص)<span class="text-danger">*</span></label>
												<input type="text" name="article_unique_code" value="{{old('article')}}" placeholder="ادخل رقم الخاص به"
													class="form-control @error('article_unique_code') is-invalid @enderror" id="inputCity">
												@error('article_unique_code')
												<div class="invalid-feedback">
													{{$message}}
												</div>
												@enderror
											</div>
										</div>
											<button type="submit" class="btn btn-primary">توزيع</button>
									</form>
								@endisset
							</div>
						</div>
					</div>
					@isset($employers)
						<div class="col-lg-12 pb-5 mb-5">
							<div class="card">
								<div class="table-responsive border-top userlist-table p-3">
									<table class="table card-table table-hover table-vcenter text-nowrap mb-0 p-3">
										<thead>
											<tr>
												<th class="wd-lg-8p">ID</th>
												<th class="wd-lg-20p">رقم موظف (PPR)</th>
												<th class="wd-lg-20p">اسم الشخصي</th>
												<th class="wd-lg-20p">اسم العائلي</th>
												<th class="wd-lg-20p">رقم المنتج</th>
												<th class="wd-lg-20p">اخر تغيير</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($employers as $key => $employer)
												<tr>
													<th class="fw-bold"> {{ $key + 1 }} </th>
													<td> {{ $employer->ppr }} </td>
													<td> {{ $employer->prenom }} </td>
													<td> {{ $employer->nom }} </td>
													<td>
														<span class="label text-{{$employer->article_code?'success':'danger'}} d-flex"><div class="dot-label bg-{{$employer->article_code?'success':'danger'}} ml-1"></div> {{ $employer->article_code??"ليس متوفر" }} </span>
													</td>
													<td>
														<span class="label text-muted d-flex"><div class="dot-label bg-gray-300 ml-1"></div> {{ $employer->date??"ليس متوفر" }} </span>
														{{-- <span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>{{ $db->date }}</span> --}}
														{{-- <span class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div> Banned</span> --}}
														{{-- <span class="label text-warning d-flex"><div class="dot-label bg-warning ml-1"></div>Pending</span> --}}
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					@endisset
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
		function handleClick(id,name){
			$('.modal').find('input[name="id"]').val("");
			$('.modal').find('.name').html(name);
			$('.modal').find('input[name="id"]').val(id);
			$('.modal').find('#form').attr('action', '/distribution');	
		}
		function handleClickEtablisement(id,name,article){
			$('.modal').find('input[name="id"]').val("");
			$('.modal').find('.name').html(name);
			$('.modal').find('input[name="article_id"]').val(article);
			$('.modal').find('input[name="id"]').val(id);
			$('.modal').find('#form').attr('action', '/distribution/etablisement');	
		}
		$('#search').click(function (){
			var employer = $('input[name="employer"]').val();
			var loading = $('.spinner-border')
			var searchIcon = $('#searchIcon')
			var etablisement = $('input[name="etablisement"]').val()
			$('#msg').addClass('d-none')
			$('#empty').addClass('d-none')
			if(!employer) {
				$('#empty').removeClass('d-none')
				return
			}
			$('#msg').addClass('d-none')
			loading.addClass('d-none')
			searchIcon.removeClass('d-none')
			$("#search").attr("disabled", true)
			$.ajaxSetup({
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url : '{{ url("distribution/employer/find") }}',
				type : 'post',
				data : {
					code : employer,
					etablisement
				},
				success: function (res){
					var data = JSON.parse(res);
					if(data){
						$('input[name="name"]').val(`${data.nom} ${data.prenom}`);
						$('input[name="id_employer"]').val(data.id);
						console.log(data);
					} else {
						$('#msg').removeClass('d-none')
					}
					loading.addClass('d-none')
					searchIcon.removeClass('d-none')
					$("#search").attr("disabled", false)
				}
			})
		})
	</script>
@endsection