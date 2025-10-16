@extends('admin.layouts.master')
@section('title', 'Edit Template File')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Edit Template File') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> {{ __('Home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">{{ __('Edit Template File') }}</li>
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
                        <h3 class="card-title mt-1">{{ __('Edit Template File') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.tempelate-file.index') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <form action="{{ route('admin.tempelate-file.update', $templateFile->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <!-- Title -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                                    </div>
                                                    <input type="text" name="title" id="title"
                                                        class="form-control form-control-sm"
                                                        placeholder="Enter Title"
                                                        value="{{ old('title', $templateFile->title) }}">
                                                </div>
                                                @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>

                                        <!-- Subtitle -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="subtitle">{{ __('Subtitle') }} <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                                                    </div>
                                                    <input type="text" name="subtitle" id="subtitle"
                                                        class="form-control form-control-sm"
                                                        placeholder="Enter Subtitle"
                                                        value="{{ old('subtitle', $templateFile->subtitle) }}">
                                                </div>
                                                @error('subtitle') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>

                                        <!-- Long Description -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="long_description">{{ __('Long Description') }}</label>
                                                <textarea name="long_description" class="form-control form-control-sm summernote" id="long_description" rows="4"
                                                    placeholder="Enter Long Description">{{ old('long_description', $templateFile->long_description) }}</textarea>
                                                @error('long_description') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>

                                        <!-- Current Icon -->
                                        <div class="col-lg-6">
                                            <label>{{ __('Current Icon') }}</label>
                                            <div class="form-group">
                                                @if ($templateFile->icon)
                                                    <img src="{{ asset('assets/admin/uploads/template/' . $templateFile->icon) }}" alt="Current Icon" width="50px" class="img-thumbnail mb-2">
                                                @else
                                                    <p>{{ __('No icon uploaded') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Upload New Icon -->
                                        <div class="col-lg-6">
                                            <label for="icon">{{ __('Upload New Icon') }} <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-icons"></i></span>
                                                </div>
                                                <input type="file" class="form-control form-control-sm up-img" name="icon" id="icon">
                                            </div>
                                            @if ($errors->has('icon'))
                                                <p class="text-danger">{{ $errors->first('icon') }}</p>
                                            @endif
                                        </div>

                                        <!-- Current Template File -->
                                        <div class="col-lg-6">
                                            <label>{{ __('Current Template File') }}</label>
                                            <div class="form-group">
                                                @if ($templateFile->tempelate_file)
                                                    <a href="{{ asset('assets/admin/uploads/template_zips/' . $templateFile->tempelate_file) }}" target="_blank"
                                                       class="btn btn-sm btn-secondary">
                                                        <i class="fas fa-file-download"></i> {{ __('Download Current File') }}
                                                    </a>
                                                @else
                                                    <p>{{ __('No file uploaded') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Upload New Template File -->
                                        <div class="col-lg-6">
                                            <label for="tempelate_file">{{ __('Upload New Template File') }} <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="tempelate_file" id="tempelate_file"
                                                           class="custom-file-input">
                                                    <label class="custom-file-label" for="tempelate_file">{{ __('Choose New File') }}</label>
                                                </div>
                                            </div>
                                            @if ($errors->has('tempelate_file'))
                                                <p class="text-danger">{{ $errors->first('tempelate_file') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            {{ __('Update Template File') }}
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
