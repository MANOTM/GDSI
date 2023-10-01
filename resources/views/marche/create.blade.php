@extends('layouts.master')
@section('title', 'اضافة سوق')
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
                <h4 class="content-title mb-0 my-auto">اضافات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة سوق</span>
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
                    <h1 class="card-title mb-1">املا هذه استمارة لاضافة سوق</h1>
                </div>
                <div class="card-body pt-0">
                    <form class="p-3" action="{{ route('marche.store') }}" method="POST" data-parsley-validate="">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="fw-5">اختر نوع السوق 
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control select2 @error('type') is-invalid @enderror" data-parsley-class-handler="#slWrapper"
                                    data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose one" required
                                    id="name" name="type">
                                    <option value="" hidden>اختر نوع السوق</option>
                                    @foreach ($Arr as $aa)
                                        <option {{ old('type') == $aa ? 'selected' : '' }} value="<?= $aa ?>"><?= $aa ?></option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="code" class="fw-5"> رقم السوق <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" required placeholder="ادخل رقم السوق هنا"
                                    name="code" value="{{ old('code') }}" id="code">
                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-md-6">
                                <label for="date" class="fw-5">التاريخ <span class="text-danger">*</span></label>
                                <input type="date" value="{{ old('date') }}" required id="date" class="form-control @error('date') is-invalid @enderror" name="date">
                                @error('date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mon" class="fw-5">السنة <span class="text-danger">*</span></label>
                                <input type="number" placeholder="ادخل السنة هنا" min="2000"  required id="mon" class="form-control @error('annee') is-invalid @enderror"
                                    name="annee" value="{{ old('annee') }}">
                                    @error('annee')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-md-6">
                                <label for="mon" class="fw-5">المبلغ الاجمالي للسوق </label>
                                <input type="number" placeholder="ادخل المبلغ الاجمالي للسوق هنا" required id="mon"
                                    class="form-control @error('montant') is-invalid @enderror" name="montant" value="{{ old('montant') }}">
                                    @error('montant')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date" class="fw-5">اسم الشركة </label>
                                <input type="text" placeholder="ادخل اسم الشركة هنا" id="date" required class="form-control @error('entreprise') is-invalid @enderror"
                                    name="entreprise" value="{{ old('entreprise') }}">
                                    @error('entreprise')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="Configue" class="fw-5">وصف</label>
                            <input type="text" class="form-control @error('objet') is-invalid @enderror" id="Configue"  required name="objet" value="{{ old('objet') }}" placeholder="ادخل وصفك هنا">
                            @error('objet')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="obser" class="fw-5">ملاحظة</label>
                            <textarea name="message" value="{{ old('message') }}" class="form-control @error('message') is-invalid @enderror"   placeholder="ادخل ملاحظتك هنا" id="observation" rows="3"></textarea>
                            @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer d-flex justify-content-end">
                            <input type="submit" value="اضافة" class="btn btn-primary">
                        </div>
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
    <!--Internal  Parsley.min js -->
    <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>
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
