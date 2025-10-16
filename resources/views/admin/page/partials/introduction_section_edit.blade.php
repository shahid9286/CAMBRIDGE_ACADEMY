@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Introduction Section')
@section('content')

@include('admin.page.top-nav')

<section class="content">
    @include('admin.page.side-nav')

    <div class="row">
        <div class="col-md-12">
            <!-- Card -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-1">{{ __('Introduction Section Edit') }}</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.introduction_section.update', $intro_section->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Title + Subtitle -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label col-form-label-sm" for="title">{{ __('Title') }}<span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    <input type="text" id="title" class="form-control form-control-sm" name="title"
                                           placeholder="Enter Title" value="{{ old('title', $intro_section->title) }}" required>
                                </div>
                                @error('title')
                                    <p class="text-danger mb-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="col-form-label col-form-label-sm" for="subtitle">{{ __('Subtitle') }}</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                    <input type="text" id="subtitle" class="form-control form-control-sm" name="subtitle"
                                           placeholder="Enter Subtitle" value="{{ old('subtitle', $intro_section->subtitle) }}">
                                </div>
                                @error('subtitle')
                                    <p class="text-danger mb-0">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="description">{{ __('Description') }}</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                    <input type="text" class="form-control form-control-sm" id="description" name="description" 
                                           value="{{ old('description', $intro_section->description) }}">
                                </div>
                                @error('description')
                                    <p class="text-danger mb-0">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Status + Image + Icon -->
                        <div class="row align-items-start">
                            <!-- Status -->
                            <div class="col-md-4 mb-3">
                                <label class="col-form-label col-form-label-sm" for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                    <select class="form-control form-control-sm" id="status" name="status" required>
                                        <option value="active" {{ $intro_section->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $intro_section->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                @error('status')
                                    <p class="text-danger mb-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Image -->
                                <div class="col-md-4 mb-3">
                                    <label for="image">
                                        {{ __('Image') }}
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>
                                        <input type="file" class="form-control form-control-sm up-img" name="image"
                                            id="image">
                                    </div>
                                    <img class="mw-400 mb-3 show-img img-demo" src="{{ asset($intro_section->images) }}"
                                        alt="" width="50px">

                                    @if ($errors->has('image'))
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>


                                <!-- Icon Upload -->
                                <div class="col-md-4 mb-3">
                                    <label for="icon">
                                        {{ __('Icon') }}
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-icons"></i></span>
                                        </div>
                                        <input type="file" class="form-control form-control-sm up-img" name="icon"
                                            id="icon">
                                    </div>
                                    <img class="mw-400 mb-3 show-img img-demo" src="{{ asset($intro_section->icon) }}"
                                        alt="" width="50px">

                                    @if ($errors->has('icon'))
                                        <p class="text-danger">{{ $errors->first('icon') }}</p>
                                    @endif
                                </div>
                        </div>

                        <!-- Submit -->
                         <div class="col-12">
    <button class="btn btn-sm btn-primary mt-2 float-right">
        Submit
    </button>
</div>
                    </form>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</section>

@endsection
