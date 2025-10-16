@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Page Detail')

@section('content')
    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                <div class="card border-top border-5 border-primary">
                    <div class="card-header ">
                        <h3 class="card-title mt-1">{{ __('Edit Procedure') }}</h3>
                        <a href="{{ route('admin.procedures.index',$slug) }}" class="btn btn-sm btn-primary float-right">Back to List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.procedures.update', $procedure->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Title -->
                                <div class="col-md-6 mb-3">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                                                       <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        </div>

                                    <input type="text" class="form-control form-control-sm" id="title" name="title" placeholder="Enter Title" value="{{ old('title', $procedure->title) }}"></div>
                                    @error('title')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Subtitle -->
                                <div class="col-md-6 mb-3">
                                    <label for="subtitle">{{ __('SubTitle') }} </label>
                                                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                                        </div>

                                    <input type="text" class="form-control form-control-sm" id="subtitle" name="subtitle" placeholder="Enter Subtitle" value="{{ old('subtitle', $procedure->subtitle) }}"></div>
                                    @error('subtitle')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="description">{{ __('Description') }} </label>
                                    
                                    <textarea class="form-control form-control-sm summernote" id="description" name="description" placeholder="Enter Description" rows="3">{{ old('description', $procedure->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <!-- Status -->
                                <div class="col-md-4 mb-3">
                                    <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                        </div>

                                    <select class="form-control form-control-sm" id="status" name="status">
                                        <option value="active" {{ old('status', $procedure->status) == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="inactive" {{ old('status', $procedure->status) == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select></div>
                                    @error('status')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Order No -->
                                <div class="col-md-4 mb-3">
                                    <label for="order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-sort-numeric-up"></i></span>
                                        </div>

                                    <input type="number" class="form-control form-control-sm" id="order_no" name="order_no" placeholder="Enter Order Number" value="{{ old('order_no', $procedure->order_no) }}"></div>
                                    @error('order_no')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="col-md-4 mt-2">
                                    <label for="image">{{ __(' Image') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>

                                        <input type="file" name="image" id="image"
                                            class="form-control form-control-sm up-img">
                                    </div>

                                    <img class="mw-400 mb-3 show-img img-demo mt-1" src="{{ asset($procedure->image) }}"
                                        alt="" width="120px">

                                    @if ($errors->has('image'))
                                        <p class="text-danger"> {{ $errors->first('image') }} </p>
                                    @endif

                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-sm float-right" type="submit">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection