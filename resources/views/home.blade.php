@extends('layouts.master')
@section('title','الرئيسية')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا بعودتك !</h2>
                </div>
            </div> 
        </div>
				<!-- /breadcrumb -->
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
				<div class="row row-sm">
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">كل المنتجات</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$allProduits}}</h4>
											<p class="mb-0 tx-12 text-white op-7">كل المنتجات لهذا العام</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-op-7"> +{{$lastAdd}}</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">المنتجات الموزعة</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $produitsDis }}</h4>
											<p class="mb-0 tx-12 text-white op-7">المنتجات الموزعة لهذه السنة</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7"> -{{ $lastDis }}</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-success-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">المنتجات المتاحة</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$produitsFree}} </h4>
											<p class="mb-0 tx-12 text-white op-7">المنتجات المتاحة لهذه السنة</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7"> {{$lastAdd}}+</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white"> الاسواق </h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $macrheCount }}</h4>
											<p class="mb-0 tx-12 text-white op-7">الاسواق المضافة هذا العام</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7 "> +{{$macrheCountYaer}}</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
				</div>
				<!-- row closed -->


				<!-- row opened -->
				<div class="row row-sm row-deck">
					<div class="col-md-12 col-lg-6  col-xl-4">
						<div class="card">
							<div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-10">النسبة المتبقية من المنتجات</h4>
								</div>
							</div>
							<div class="card-body">
								<ul class="sales-session mb-0">
									@foreach ($dbs as $key=>$db)
										
									<li>
										<div class="d-flex justify-content-between">
											<h6>{{$key +1}}. {{$db->Désignation_ar}} </h6>
											<p class="font-weight-semibold mb-2">{{ $db->db_call->sum('quntite') }} <span class="text-muted font-weight-normal">
												@php
													$part =$db->db_call->sum('quntite');
													$whole =$db->db_call->sum('quntite_total') == 0 ? 1 :$db->db_call->sum('quntite_total');
													$por = ($part / $whole) * 100;
													echo "(".number_format($por, 2)." %)";
												@endphp	
											</span></p>
										</div>
										<div class="progress  ht-5">
											<div aria-valuemax="100" aria-valuemin="0" style="width: {{$por}}%" aria-valuenow="0" class="progress-bar  bg-{{ $classes[$key] }}" role="progressbar"></div>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-8 col-xl-8">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between mb-1">
								<h4 class="card-title mb-1">أخر توزيع للمدريات</h4>
							</div>
							<p class="tx-12 tx-gray-500 mb-4"> 
								أخر عطاء للمدريات مع التاريخ الكمية المعطات .
								 </p>
							<div class="table-responsive country-table">
								<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
									<thead>
										<tr>
											<th class="wd-lg-25p">المديرية</th>
											<th class="wd-lg-25p tx-right">اخر اضافة</th>
											<th class="wd-lg-25p tx-right">الكمية</th> 
										</tr>
									</thead>
									<tbody>  
                                        @foreach ($dbs as $db)
                                            
								 		<tr>
											<td>{{ $db->Désignation_ar }}</td>
											<td class="tx-right tx-medium tx-inverse">{{ $db->db_call->last() ? $db->db_call->last()->created_at->format('d M Y') : '-'}}</td>
											<td class="tx-right tx-medium tx-inverse">{{ $db->db_call->last()->quntite_total ?? '0' }}</td> 
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

				<div class="card mg-b-20" id="tabs-style3">
					<div class="card-body"> 
						<div class="text-wrap">
							<div class="example"> 
								<form action="{{route('search')}}" method="get">
									@csrf
								 <div class="row">
									<div class="col col-lg-6">
									 <label for="inputState">بحت عن سوق عن طريق <span class="text-danger">رقمه</span></label> 
										<div class="input-group">
											<input class="form-control @error('code') is-invalid @enderror"  placeholder="بحت عن سوق..." name="code" value="{{old('code')}}" type="text">
											<span class="input-group-btn">
												<button id="search" class="btn btn-primary" type="submit" >
													<span class="input-group-btn" id="searchIcon"><i
															class="fa fa-search"></i></span>
													 
												</button>
											</span>
											@error('code')
											<div class="invalid-feedback">
													{{$message}}
												</div>
											@enderror
										</div>  
										
									</div>	
									<div class="col-lg-3" >
										<label for="exampleFormControlSelect1">من تاريخ</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fas fa-calendar-alt"></i>
												</div>
											</div><input class="form-control fc-datepicker @error('start_at') is-invalid @enderror" name="start_at"
												value="{{old('start_at')}}" placeholder="YYYY-MM-DD" type="text">
												@error('start_at')
												<div class="invalid-feedback">
													{{$message}}
												</div>
												@enderror
										</div><!-- input-group -->
									</div>
									<div class="col-lg-3" id="end_at">
										<label for="exampleFormControlSelect1">الي تاريخ</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fas fa-calendar-alt"></i>
												</div>
											</div><input class="form-control fc-datepicker @error('end_at') is-invalid @enderror" name="end_at"
												name="end_at" placeholder="YYYY-MM-DD" type="text" dir="rtl">
												@error('end_at')
												<div class="invalid-feedback">
													{{$message}}
												</div>
												@enderror
										</div>
										 <!-- input-group -->
									</div>
									
								</div><br>
							</form>
							</div> 
								 <br>
							@if(session('dbs'))
		
								<div class="panel panel-primary tabs-style-3 result"> 
									<div class="tab-menu-heading">
										<div class="tabs-menu ">
											<!-- Tabs -->
											<ul class="nav panel-tabs">
												<li class=""><a href="#tab11" class="active" data-toggle="tab"><i class="fa fa-cube"></i> المديريات	</a></li>
												<li><a href="#tab12" data-toggle="tab"><i class="fa fa-tasks"></i>  المؤسسات</a></li>
												<li><a href="#tab13" data-toggle="tab"><i class="si si-people"></i> المستفذين</a></li> 
											</ul>
										</div>
									</div>
									<div class="panel-body tabs-menu-body">
										<div class="tab-content">
		
											<div class="tab-pane active" id="tab11">
												<div class="col-xl-12">
													<div class="card">
														<div class="card-header pb-0">
															<div class="d-flex justify-content-between">
																<h4 class="card-title mg-b-0">السوق رقم {{session('code')}}</h4> 
															</div>
															<p class="tx-12 tx-gray-500 mb-2">كل المديريات المستفيذة من هذا السوق</p>
														</div>
														<div class="card-body">
															<div class="table-responsive">
																<table class="table table-hover mb-0 text-md-nowrap">
																	@if (!session('dbs')->isEmpty())
																		<thead> 
																			<tr>
																				<th>#</th>
																				<th>المديرية</th>
																				<th>المنتج</th> 
																				<th>نوع المنتج</th>
																				<th>الكمية</th>
																			</tr> 
																		</thead>
		
																	@else
																		<br>
																		<div class="text-center text-danger">
																			لاتوجد اي مؤسسات مستفيدة من هذا السوق
																		</div>
																		<br> 
																		@endif
																	<tbody>
																		@foreach (session('dbs') as $key=> $db)
																		<tr>
																			<th scope="row">{{ $key+1 }}</th>
																			<td>{{ $db->db->Désignation_ar }}</td>
																			<td>{{ $db->article->nom }}</td>
																			<td>{{ $db->article->configue }}</td>
																			<td>{{ $db->quntite }} </td>
																		</tr>
																			
																		@endforeach 
														
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
		
											<div class="tab-pane" id="tab12">
												<div class="col-xl-12">
													<div class="card"> 
														<div class="card-header pb-0">
															<div class="d-flex justify-content-between">
																<h4 class="card-title mg-b-0">السوق رقم 4839</h4>
																<i class="mdi mdi-dots-horizontal text-gray"></i>
															</div>
															<p class="tx-12 tx-gray-500 mb-2">كل المؤسسات المستفيذة من هذا السوق</p>
														</div>
														<div class="card-body">
															<div class="table-responsive">
																<table class="table table-hover mb-0 text-md-nowrap">
																	@if (!session('etablissemets')->isEmpty())
																		<thead>
																			<tr>
																				<th>#</th>
																				<th>المؤسسة</th>
																				<th>المديرية</th>
																				<th>المنتج</th>
																				<th>الكمية</th>
																			</tr>
																		</thead>
																	@else
																		<br>
																		<div class="text-center text-danger">
																			لاتوجد اي مؤسسات مستفيدة من هذا السوق
																		</div>
																		<br>
																	@endif
																	<tbody>
																		@foreach (session('etablissemets') as $key=> $etab)
																		<tr>
																			<th scope="row">{{ $key+1 }}</th>
																			<td>{{ $etab->etablisement->nom }}</td>
																			<td>{{ $etab->etablisement->db->Désignation_ar }}</td>
																			<td>{{ $etab->article->nom }}</td>
																			<td>{{ $etab->quantite }} </td>
																		</tr> 
																		@endforeach  
																	</tbody>
																</table>
															</div>
														</div> 
													</div>
												</div>
											</div>
		
		
											<div class="tab-pane" id="tab13">
												<div class="col-xl-12">
													<div class="card">
														<div class="card-header pb-0">
															<div class="d-flex justify-content-between">
																<h4 class="card-title mg-b-0">السوق رقم 4839</h4>
																<i class="mdi mdi-dots-horizontal text-gray"></i>
															</div>
															<p class="tx-12 tx-gray-500 mb-2">كل الاشخاص المستفيذة من هذا السوق</p>
														</div>
														<div class="card-body">
															<div class="table-responsive">
																<table class="table table-hover mb-0 text-md-nowrap">
																	@if (!session('employers')->isEmpty())
																		<thead>
																			<tr>
																				<th>#</th>
																				<th>اسم المستفيذ</th>
																				<th>رقم (PPR)</th>
																				<th>المنتج</th>
																				<th>رقم المنتج</th>
																			</tr>
																		</thead>
																		@else
																			<br>
																			<div class="text-center text-danger">
																				لا يوجد اي مستفيذ من هذا السوق <b> <a href="" class="text-danger">اضافة مستفدين</a></b> 
																			</div>
																			<br>
																		@endif
																	<tbody>
																		@foreach (session('employers') as $key=> $emp)
																		<tr>
																			<th scope="row">{{ $key+1 }}</th>
																			<td>{{ $emp->employer->nom . ' ' .$emp->employer->prenom}}</td>
																			<td>{{ $emp->employer->ppr }}</td>
																			<td>{{ $etab->article->nom }} </td>
																			<td>{{ $emp->article_code }}</td>
																		</tr> 
																		@endforeach  
																	</tbody>
																</table>
															</div>
														</div> 
													</div>
												</div>
											</div> 
										</div>
									</div>
								</div>
						
							@endif
							</div> 
						</div>
						<!-- row closed -->
					</div>
					<!-- Container closed -->
				</div>
			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>

<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>	
@endsection