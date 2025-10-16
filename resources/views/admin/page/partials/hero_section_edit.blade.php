@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Hero Section')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Edit Hero Section') }}</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.hero_section.update', $hero_section->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- If your route expects PUT, uncomment below --}}
                            {{-- @method('PUT') --}}

                           <div class="row">
    <!-- Title -->
    <div class="col-md-6 mb-3">
        <label for="title" class="col-form-label col-form-label-sm">
            {{ __('Title') }} <span class="text-danger">*</span>
        </label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-heading"></i></span>
            </div>
            <input required type="text" class="form-control form-control-sm" id="title" name="title" placeholder="Enter Title" value="{{ old('title', $hero_section->title) }}">
        </div>
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Subtitle -->
    <div class="col-md-6 mb-3">
        <label for="subtitle" class="col-form-label col-form-label-sm">
        {{ __('Subtitle') }} 
        </label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-subscript"></i></span>
            </div>
            <input type="text" class="form-control form-control-sm" id="subtitle" name="subtitle" placeholder="Enter Subtitle" value="{{ old('subtitle', $hero_section->subtitle) }}">
        </div>
        @error('subtitle')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-12">
        <label for="description" class="col-form-label col-form-label-sm">
           {{ __('Description') }} 
        </label>
<textarea class="form-control form-control-sm summernote" id="description" name="description" placeholder="Enter Description">{{ old('description',$hero_section->description) }}</textarea>
@error('description')
    <p class="text-danger">{{ $message }}</p>
@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="status" class="col-form-label col-form-label-sm">
         {{ __('Status') }} <span class="text-danger">*</span>
        </label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-toggle-off"></i></span>
            </div>
            <select required class="form-control form-control-sm" id="status" name="status">
                <option value="active" {{ old('status', $hero_section->status) == 'active' ? 'selected' : '' }}>
                    {{ __('Active') }}
                </option>
                <option value="inactive" {{ old('status', $hero_section->status) == 'inactive' ? 'selected' : '' }}>
                    {{ __('Inactive') }}
                </option>
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
                                    <img class="mw-400 mb-3 show-img img-demo"
                                        src="{{ asset( $hero_section->background_image) }}" alt=""
                                        width="50px">

                                    @if ($errors->has('background_image'))
                                        <p class="text-danger">{{ $errors->first('background_image') }}</p>
                                    @endif
                                </div>

                            <div class="row">
                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary btn-sm float-right">Update</button>
                                </div>
                            </div>

                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
    </section>

@endsection
