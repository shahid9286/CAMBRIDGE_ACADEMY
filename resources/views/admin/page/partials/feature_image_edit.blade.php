@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Feature Image')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Edit Feature Image') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.feature_image.update', $feature_image->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-font"></i></span>
            </div>

                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ old('title', $feature_image->title) }}" >
                                           </div>

                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="subtitle">{{ __('SubTitle') }} </label>
                                            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-italic"></i></span>
            </div>

                                    <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Subtitle" value="{{ old('subtitle', $feature_image->subtitle) }}">
                                            </div>

                                    @error('subtitle') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                    <textarea class="form-control form-control-sm summernote" id="description" name="description" placeholder="Enter Description" rows="3" >{{ old('description', $feature_image->description) }}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
            </div>

                                    <select class="form-control" id="status" name="status" required>
                                        <option value="active" {{ old('status', $feature_image->status) == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="inactive" {{ old('status', $feature_image->status) == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>        </div>

                                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
            </div>

                                    <input type="number" class="form-control" id="order_no" name="order_no" placeholder="Enter Order Number" value="{{ old('order_no', $feature_image->order_no) }}">
                                           </div>

                                    @error('order_no') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="image">
                                        {{ __('Image') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>
                                        <input type="file" class="form-control form-control-sm up-img" name="image"
                                            id="image2">
                                    </div>
                                    <img class="mw-400 mb-3 show-img img-demo"
                                        src="{{ asset( $feature_image->image) }}" alt=""
                                        width="120px">

                                    @if ($errors->has('image'))
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-primary float-right" type="submit">{{ __('Update') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
