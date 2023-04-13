@extends('layouts.master')
@section('title','المنتجات')
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--- Internal Select2 css-->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الجهات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المنتجات سوق {{ $marche->code }}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<!-- row -->
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="card  bg-primary-gradient">
							<div class="card-body">
								<div class="counter-status d-flex md-mb-0">
									<div class="counter-icon">
										<i class="icon icon-people"></i>
									</div>
									<div class="mr-auto">
										<h5 class="tx-13 tx-white-8 mb-3">السوق</h5>
										<h2 class=" mb-0 text-white" style="font-size: 13.5px"> {{ $marche->code  }} / <br> <small>{{ $marche->type }}</small> </h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card  bg-danger-gradient">
							<div class="card-body">
								<div class="counter-status d-flex md-mb-0">
									<div class="counter-icon text-warning">
										<i class="la la-pie-chart"></i>
									</div>
									<div class="mr-auto">
										<h5 class="tx-13 tx-white-8 mb-3">عدد المنتجات</h5>
										<h2 class="mb-0 text-white"><span class="counter">{{ $marche->articles->count() }}</span> <small>منتج</small></h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card  bg-success-gradient">
							<div class="card-body">
								<div class="counter-status d-flex md-mb-0">
									<div class="counter-icon text-primary">
										<i class="fe fe-credit-card"></i>
									</div>
									<div class="mr-auto">
										<h5 class="tx-13 tx-white-8 mb-3">التمن الاجمالية</h5>
										<h2 class="counter mb-0 text-white"> {{ $marche->articles->sum('prix') }} </h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card  bg-warning-gradient">
							<div class="card-body">
								<div class="counter-status d-flex md-mb-0">
									<div class="counter-icon text-success">
										<i class="fe fe-clipboard"></i>
									</div>
									<div class="mr-auto">
										<h5 class="tx-13 tx-white-8 mb-3">الكمية الاجمالية</h5>
										<h2 class="counter mb-0 text-white"> {{ $marche->articles->sum('QuntiteActual') }} </h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="mb-3">
									<form id="form" class="d-flex align-items-start align-items-center" action="{{ url("/article") }}" method="get">
										<div class="form-group">
											<select value="{{ $marche->code }}" class="form-control w-auto select2"  data-parsley-class-handler="#slWrapper"
												data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose one"
												required="" name="id" id="id">
												@foreach ($marches as $one)
													<option {{ $one->id==$marche->id ? 'selected' : ''  }} value="{{ $one->id }}"> {{ $one->code }} </option>
												@endforeach
											</select>
										</div>
										<div class="form-group mx-2">
											<button class="btn btn-primary" type="submit">بحث</button>
											<a class="btn btn-primary" href="{{ route('article.create') }}"> اضافة منتج</a>
										</div>
									</form>
								</div>
								<h1 class="card-title mg-b-0">قائمة المنتجات</h1>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap mb-5 pb-5" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">ترتيب</th>
												<th class="wd-15p border-bottom-0">رقم السوق</th>
												<th class="wd-15p border-bottom-0">اسم المنتحج</th>
												<th class="wd-20p border-bottom-0">نوعية المنتحج</th>
												<th class="wd-15p border-bottom-0">كمية الاجمالية</th>
												<th class="wd-10p border-bottom-0">كمية الحالية</th>
												<th class="wd-25p border-bottom-0">تمن (مجموع)</th>
												<th class="wd-25p border-bottom-0">تمن (للفرد)</th>
												<th class="wd-25p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($marche->articles as $key => $one)
												<tr>
													<th>{{ $key+1 }}</th>
													<td> {{ $one->marche->code }} </td>
													<td> {{ $one->nom }} </td>
													<td> {{ $one->configue }} </td>
													<td> {{ $one->QuntiteInit }} </td>
													<td> {{ $one->QuntiteActual }} </td>
													<td> {{ $one->prix }} </td>
													<td> {{ $one->prix }} </td>
													<td class="d-flex justify-content-center">
														<a data-id="{{ $one->id }}" data-name="{{ $one->nom }}" effect="effect-scale" data-toggle="modal" href="#delete" class="text-danger"><i class="la la-trash"></i></a> 
														<a data-effect="effect-scale" data-toggle="modal" href="#edit" class="text-success"><i class="la la-edit"></i></a> 
														<a href="{{ route('distribution',$one->id) }}" class="text-primary"><i class="typcn typcn-arrow-back-outline"></i></a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<x-deleteModal key="منتج" />
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script><!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<!--Internal Counters -->
<script src="{{URL::asset('assets/plugins/counters/waypoints.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/counters/counterup.min.js')}}"></script>
<!--Internal Time Counter -->
<script src="{{URL::asset('assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
<script src="{{URL::asset('assets/plugins/counters/counter.js')}}"></script>
<!--Internal  Select2 js -->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
{{-- data from table to modal edit --}}
<!--Internal  Parsley.min js -->
<script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<!-- Internal Form-validation js -->
<script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>
<script>
	$('#delete').on('show.bs.modal',function (event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var code = button.data('name')
		var modal = $(this)
		modal.find('.modal-body #code').text(code)
		modal.find('#form').attr('action', '/article/'+id)
	})
</script>
@endsection