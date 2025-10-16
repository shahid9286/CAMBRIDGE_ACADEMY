@extends('admin.layouts.master')
@section('title', 'Add Template File')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Add Template File') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-home"></i> {{ __('Home') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">{{ __('Add Template File') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Add Template File') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.tempelate-file.index') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <form action="{{ route('admin.tempelate-file.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="title">Title <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-heading"></i></span>
                                                        </div>

                                                        <input type="text" name="title"
                                                            class="form-control form-control-sm" id="title"
                                                            placeholder="Enter Title" value="{{ old('title') }}">
                                                    </div>
                                                    @error('title')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="subtitle">Subtitle <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-quote-right"></i></span>
                                                        </div>

                                                        <input type="text" name="subtitle"
                                                            class="form-control form-control-sm" id="subtitle"
                                                            placeholder="Enter Subtitle" value="{{ old('subtitle') }}">
                                                    </div>
                                                    @error('subtitle')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="long_description">Long Description</label>
                                                    <textarea name="long_description" class="form-control form-control-sm summernote" id="long_description" rows="4"
                                                        placeholder="Enter Long Description">{{ old('long_description') }}</textarea>
                                                    @error('long_description')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-2">
                                                <label for="icon">
                                                    {{ __('Upload Icon') }}
                                                <span class="text-danger">*</span> </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-icons"></i></span>
                                                    </div>
                                                    <input type="file" class="form-control form-control-sm up-img"
                                                        name="icon" id="icon">
                                                </div>
                                                <img class="mw-400 mb-3 show-img img-demo"
                                                    src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                    width="50px">

                                                @if ($errors->has('icon'))
                                                    <p class="text-danger">{{ $errors->first('icon') }}</p>
                                                @endif
                                            </div>

<div class="col-lg-6">
    <label for="tempelate_file" class="form-label">
        <i class="fas fa-file-alt"></i> {{ __('Template File') }}
        <span class="text-danger">*</span>
    </label>
    <div class="form-group">
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
            </div>
            <div class="custom-file">
                <input type="file" name="tempelate_file" id="tempelate_file"
                       class="custom-file-input @error('tempelate_file') is-invalid @enderror">
                <label class="custom-file-label" for="tempelate_file">{{ __('Choose Template File') }}</label>
            </div>
        </div>

        {{-- Show validation error message --}}
        @error('tempelate_file')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    {{ __('Add Template File') }}
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
