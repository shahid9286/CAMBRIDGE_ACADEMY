@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Hero Section')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Add Hero Section') }}</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <form action="{{ route('admin.hero_section.store', ['slug' => $slug]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
    <div class="col-md-6 mb-3">
        <label for="title" class="col-form-label col-form-label-sm">
            {{ __('Title') }} <span class="text-danger">*</span>
        </label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-font"></i></span>
            </div>
            <input type="text" required class="form-control form-control-sm" id="title" name="title" placeholder="Enter Title" value="{{ old('title') }}">
        </div>
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="subtitle" class="col-form-label col-form-label-sm">
             {{ __('Subtitle') }}
        </label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-italic"></i></span>
            </div>
            <input type="text" class="form-control form-control-sm" id="subtitle" name="subtitle" placeholder="Enter Subtitle" value="{{ old('subtitle') }}">
        </div>
        @error('subtitle')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description -->
    <div class="col-md-12">
        <label for="description" class="col-form-label col-form-label-sm">
         {{ __('Description') }}
        </label>
<textarea class="form-control form-control-sm summernote" id="description" placeholder="Enter Description" name="description">{{ old('description') }}</textarea>
@error('description')
    <p class="text-danger">{{ $message }}</p>
@enderror
    </div>

    <!-- Status -->
    <div class="col-md-6">
        <label for="status" class="col-form-label col-form-label-sm">
           {{ __('Status') }} <span class="text-danger">*</span>
        </label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
            </div>
            <select required class="form-control form-control-sm" id="status" name="status">
                <option value="">-- Select Status --</option>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
            </select>
        </div>
        @error('status')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>


                                <div class="col-md-6 mb-3">
                                    <label for="background_image">
                                        {{ __('Image') }} 
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>
                                        <input type="file" class="form-control form-control-sm up-img" name="background_image"
                                            id="background_image">
                                    </div>
                                            <img class="mw-400 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                width="120px">

                                    @if ($errors->has('background_image'))
                                        <p class="text-danger">{{ $errors->first('background_image') }}</p>
                                    @endif
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary btn-sm float-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
    </section>

@endsection
