@extends('layouts.master')
@section('title','اضافة منتوج')
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
							<h4 class="content-title mb-0 my-auto">اضافات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة منتوج</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="card  box-shadow-0 ">
							<div class="card-header">
								<h1 class="card-title mb-1">املا هذه استمارة لاضافة منتج</h1>
							</div>
							<div class="card-body pt-0">
								<form class="ourContainer" action="{{ route('article.store') }}" method="post">
									@csrf
									<div class="row mt-4">
										<div class="form-group col-md-6">
											<label for="marche" class="fw-5">اختر السوق من هنا <span class="text-danger">*</span></label>
											<select class="form-control @error('marche_id') is-invalid @enderror" id="marche" name="marche_id">
												<option value="" hidden>---اختر السوق---</option>
												@foreach ($marches as $one)
													<option {{ old('marche_id') == $one->id ?  'selected' : '' }} value="{{ $one->id }}">{{ $one->code }} / {{ $one->type }}</option>
												@endforeach
											</select>
											@error('marche_id')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
										<div class="form-group col-md-6">
											<label for="nom" class="fw-5" >اختر نوع المنتوج من هنا <span class="text-danger">*</span>  </label>
											<select class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom">
												<option value="" hidden>---اختر منتج---</option>
												@foreach ($Arr as $aa)
													<option {{ old('nom') == $aa ?  'selected' : '' }} value="<?=$aa?>"><?=$aa?></option>
												@endforeach
											</select>
											@error('nom')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="row mt-2">
										<div class="form-group col-md-6">
											<label for="quntite" class="fw-5">الكمية <span class="text-danger">*</span></label>
											<input type="number" min="0" placeholder="ادخل الكمية هنا" id="quntite" class="form-control @error('QuntiteInit') is-invalid @enderror" name="QuntiteInit" value="{{ old('QuntiteInit') }}">
											@error('QuntiteInit')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
										<div class="form-group col-md-6">
											<label for="mon" class="fw-5">مبلغ المنتوج الواحد<span class="text-danger">*</span></label>
											<input type="number" min="0" placeholder="ادخل المبلغ هنا" id="prix" class="form-control @error('prix') is-invalid @enderror"
												name="prix" value="{{ old('prix') }}">
												@error('prix')
												<span class="text-danger">{{ $message }}</span>
												@enderror
										</div>
									</div>
									<div class="form-group mt-2">
										<label for="Configue" class="fw-5">نوع المنتوج او وصفه</label>
										<input type="text" class="form-control @error('configue') is-invalid @enderror"   id="configue" name="configue" value="{{ old('configue') }}"
											placeholder="ادخل نوع المنتوج او وصفه هنا">
											@error('configue')
											<span class="text-danger">{{ $message }}</span>
											@enderror
									</div>
									 
									<div class="form-group mt-2">
										<span>ان لم تجد السوق المراد البحث عنه في لائحة او كان فارغا <a href="{{ route('marche.create') }}">اضغط هنا</a> للاضافة</span>
									</div>
									<input type="submit" value="اضافة" class="btn btn-primary mt-2">
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
@endsection