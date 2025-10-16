@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Feature')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Edit Feature') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.feature.update', $feature->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title ') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title"
                                            value="{{ old('title', $feature->title) }}">
                                    </div>
                                    <span class="text-danger error" id="error_title"></span>
                                </div>

                                <div class="col-md-6">
                                    <label for="subtitle">{{ __('SubTitle') }} </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Subtitle"
                                            value="{{ old('subtitle', $feature->subtitle) }}">
                                    </div>
                                    <span class="text-danger error" id="error_subtitle"></span>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="description">{{ __('Description') }} </label>
                                    <textarea class="form-control summernote" id="description" placeholder="Enter Description" name="description">{{ old('description', $feature->description) }}</textarea>
                                    <span class="text-danger error" id="error_description"></span>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                        </div>
                                        <select class="form-control" id="status" name="status">
                                            <option value="active" {{ old('status', $feature->status) == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="inactive" {{ old('status', $feature->status) == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="order_no" name="order_no" placeholder="Enter Order Number"
                                            value="{{ old('order_no', $feature->order_no) }}">
                                    </div>
                                    <span class="text-danger error" id="error_order_no"></span>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12 mb-3">
                                    <label for="icon">
                                        {{ __('Icon') }} 
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>
                                        <input type="file" class="form-control form-control-sm up-img" name="icon"
                                            id="icon">
                                    </div>
                                    <img class="mw-400 mb-3 show-img img-demo"
                                        src="{{ asset( $feature->icon) }}" alt=""
                                        width="120px">

                                    @if ($errors->has('icon'))
                                        <p class="text-danger">{{ $errors->first('icon') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-sm float-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
