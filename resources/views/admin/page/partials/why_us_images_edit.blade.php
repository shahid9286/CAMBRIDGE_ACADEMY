@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Why Us Image')
@section('content')

@include('admin.page.top-nav')

<section class="content">
    @include('admin.page.side-nav')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-top border-5 border-primary">
                <div class="card-header">
                    <h3 class="card-title mt-1">Edit Why Us Image</h3>
                    <a href="{{ route('admin.why-us-image.index', ['slug' => $slug]) }}" class="btn btn-sm btn-primary float-right">
                        Back to List
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.why-us-image.update', ['id' => $whyUsImage->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    </div>
                                    <input required type="text" class="form-control" id="title" name="title" value="{{ old('title', $whyUsImage->title) }}">
                                </div>
                                @error('title')
                                    <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="subtitle">Subtitle</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $whyUsImage->subtitle) }}">
                                </div>
                                @error('subtitle')
                                    <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>        

                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <label for="update_status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                        </div>
                                        <select required class="form-control" id="update_status" name="status">
                                            <option value="active" {{ $whyUsImage->status == 'active' ? 'selected' : '' }}>
                                                {{ __('Active') }}</option>
                                            <option value="inactive" {{ $whyUsImage->status == 'inactive' ? 'selected' : '' }}>
                                                {{ __('Inactive') }}</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                        </div>
                                        <input required type="number" class="form-control" id="order_no" name="order_no"
                                            value="{{ $whyUsImage->order_no }}">
                                    </div>
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                                <!-- Image Upload -->
                                <div class="col-md-12 mt-2">
                                    <label for="image">
                                        {{ __('Image') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>
                                        <input type="file" class="form-control form-control-sm up-img" name="image"
                                            id="image">
                                    </div>
                                    <img class="mw-400 mb-3 show-img img-demo"
                                        src="{{ asset( $whyUsImage->image) }}" alt=""
                                        width="120px">

                                    @if ($errors->has('image'))
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="description" class="col-form-label col-form-label-sm">
                                            {{ __('Description') }} <span class="text-danger">*</span>
                                            </label>
                                    <textarea class="form-control form-control-sm summernote" id="description" name="description" required>{{ old('description',$whyUsImage->description) }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>


                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-sm float-right">Update</button>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
