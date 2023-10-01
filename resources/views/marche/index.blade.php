@extends('layouts.master')
@section('title','الاسواق')
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header') 
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">سوق</h4>
			</div>
		</div> 
	</div> 
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<a  href="/marche/create" class="btn btn-primary btn-sm" style="font-size: 1rem">اضافة سوق +</a> 
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">ترتيب</th>
												<th class="wd-15p border-bottom-0">رقم</th>
												<th class="wd-15p border-bottom-0">النوع</th>
												<th class="wd-20p border-bottom-0">التاريخ</th>
												<th class="wd-15p border-bottom-0">السنة</th>
												<th class="wd-10p border-bottom-0">التمن</th>
												<th class="wd-25p border-bottom-0">الشركة</th>
												<th class="wd-25p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($marche as $key => $one)
												<tr>
													<th>{{ $key+1 }}</th>
													<td> {{ $one->code }} </td>
													<td> {{ $one->type }} </td>
													<td> {{ $one->date }} </td>
													<td> {{ $one->annee }} </td>
													<td> {{ $one->montant }} </td>
													<td> {{ $one->entreprise }} </td>
													<td class="d-flex justify-content-center">
														<a data-id="{{$one->id}}" data-code="{{$one->code}}" data-effect="effect-scale" data-toggle="modal" href="#delete" class="text-danger modal-effect"><i class="la la-trash"></i></a> 
														<a data-code="{{$one->code}}" data-entreprise="{{$one->entreprise}}" data-montant="{{$one->montant}}" data-annee="{{$one->annee}}" data-date="{{$one->date}}" data-type="{{$one->type}}" data-id="{{$one->id}}" data-effect="effect-scale modal-effect" data-toggle="modal" href="#edit" class="text-success"><i class="la la-edit"></i></a> 
														<a href="{{ url("/article?id=$one->id") }}" class="text-primary"><i class="typcn typcn-arrow-back-outline"></i></a>
													</td>
												</tr> 
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<x-deleteModal key="سوق" />
						<x-editMarche  :arr="$Arr" /> 
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
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
{{-- data from table to modal edit --}}
<script>
	$('#edit').on('show.bs.modal',function (event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var type = button.data('type')
		var code = button.data('code')
		var date = button.data('date')
		var annee = button.data('annee')
		var montant = button.data('montant')
		var entreprise = button.data('entreprise')
		var modal = $(this)
		modal.find('.modal-body #type').val(type)
		modal.find('.modal-body #date').val(date)
		modal.find('.modal-body #code').val(code)
		modal.find('.modal-body #annee').val(annee)
		modal.find('.modal-body #montant').val(montant)
		modal.find('.modal-body #entreprise').val(entreprise)
		modal.find('.modal-body #objet').val(entreprise)
		modal.find('#form').attr('action', '/marche/'+id)
	})
	$('#delete').on('show.bs.modal',function (event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var code = button.data('code')
		var modal = $(this)
		modal.find('.modal-body #code').text(code)
		modal.find('#form').attr('action', '/marche/'+id)
	})
</script>
@endsection