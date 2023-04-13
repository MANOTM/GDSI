@extends('layouts.master')
@section('title', 'اضفة مؤسسة')
@section('css')
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعدادت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/اضافة
                    مؤسسة</span>
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
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    @if (session('failed'))
                        <div class="alert alert-solid-danger mg-b-8" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong> {{ session('failed') }}</strong>
                        </div>
                    @endif
                    <h4 class="card-title mb-1">اضفة مؤسسة جديدة</h4>
                    <p class="mb-2"> الحقول الذي تحتوي على <span class="tx-danger">*</span> ضروريى
                    </p>

                </div>

                <div class="card-body pt-0">
                    <form method="POST" action="{{ route('etablissement.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="inputAddress">

                                اسم المؤسسة<span class="text-danger">*</span></label>

                            <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"
                                value="{{ old('nom') }}" id="inputAddress" placeholder="مؤسسة...">
                            @error('nom')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">رقم المؤسسة<span class="text-danger">*</span></label>
                                <input type="text" name="code" value="{{ old('code') }}"
                                    class="form-control @error('code') is-invalid @enderror" id="inputCity">
                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">القسم<span class="text-danger">*</span></label>
                                <select id="inputState" name="division"
                                    class="form-control @error('division') is-invalid @enderror">
                                    <option selected hidden value="">اختر...</option>
                                    <option value="مديرية اقليمية"
                                        {{ old('division') == 'مديرية اقليمية' ? 'selected' : '' }}>مديرية اقليمية</option>
                                </select>
                                @error('division')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">الدائرة<span class="text-danger">*</span></label>
                                <select id="inputCity" name="cycle"
                                    class="form-control @error('cycle') is-invalid @enderror">
                                    <option selected hidden value="">اختر...</option>
                                    @foreach ($sycles as $cycle)
                                        <option value="{{ $cycle }}"
                                            {{ old('cycle') == $cycle ? 'selected' : '' }}>{{ $cycle }}</option>
                                    @endforeach
                                </select>
                                @error('cycle')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">المديرية الجهوية<span class="text-danger">*</span></label>
                                <select id="inputState" name="db"
                                    class="form-control @error('db') is-invalid @enderror">
                                    <option selected hidden value="">اختر...</option>
                                    @foreach ($dbs as $db)
                                        <option value="{{ $db->id }}" {{ old('db') == $db->id ? 'selected' : '' }}>
                                            {{ $db->Désignation_ar }}</option>
                                    @endforeach
                                </select>
                                @error('db')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">الخدمة</label>
                                <input type="text" name="service" readonly name="" id="inputState"
                                    class="form-control" value="مؤسسة تعليمية" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">اضافة مؤسسة</button>
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
                        <p class="mb-2">او يمكنك رفع ملف <span class="text-danger">CSV </span>يحتوي على المؤسسات</p>
                    </div>
                    <a href="{{ asset('files/etablissement.csv') }}" class="btn btn-primary">تحميل نسخة</a>
                </div>
                <div class="card-body pt-0">
                    <form method="POST" action="{{ route('import.etablissement') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <input type="file" name="file" class="dropify"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    data-height="100" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">اضافة مؤسسة</button>
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
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
@endsection
