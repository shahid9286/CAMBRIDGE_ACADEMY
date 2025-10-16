@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit WhyChooseUs')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Why Choose Us Edit') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.why-choose-us.update', $whyUs->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="update_whyus_title">{{ __('Title ') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="update_whyus_title" name="title" placeholder="Enter Title"
                                            value="{{ old('title', $whyUs->title) }}">
                                    </div>
                                    <span class="text-danger error" id="error_title"></span>
                                </div>

                                <div class="col-md-6">
                                    <label for="update_whyus_subtitle">{{ __('SubTitle') }} </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="update_whyus_subtitle" name="subtitle" placeholder="Enter Subtitle"
                                            value="{{ old('subtitle', $whyUs->subtitle) }}">
                                    </div>
                                    <span class="text-danger error" id="error_subtitle"></span>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="update_whyus_description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                    <textarea class="form-control summernote" id="update_whyus_description" name="description" placeholder="Enter Description">{{ old('description', $whyUs->description) }}</textarea>
                                    <span class="text-danger error" id="error_description"></span>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="update_whyus_status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                        </div>
                                        <select class="form-control" id="update_whyus_status" name="status">
                                            <option value="active" {{ old('status', $whyUs->status) == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="inactive" {{ old('status', $whyUs->status) == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="update_whyus_order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="update_whyus_order_no" name="order_no" placeholder="Enter Order Number"
                                            value="{{ old('order_no', $whyUs->order_no) }}">
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
                                        src="{{ asset( $whyUs->icon) }}" alt=""
                                        width="120px">

                                    @if ($errors->has('icon'))
                                        <p class="text-danger">{{ $errors->first('icon') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
