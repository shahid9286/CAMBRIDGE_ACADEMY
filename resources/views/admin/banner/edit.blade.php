@extends('admin.layouts.master')
@section('title', 'Edit Banner')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Edit Banner') }}</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Image --}}
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="image">{{ __('Image') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text p-1 px-2">
                                            <i class="fas fa-image"></i>
                                        </span>
                                        <input type="file" class="form-control form-control-sm up-img" name="image" id="image">
                                    </div>

                                    <img class="mw-400 show-img img-demo mt-2"
                                        src="{{ $banner->image ? asset( $banner->image) : asset('assets/uploads/core/img-demo.jpg') }}"
                                        alt="Banner Image" style="width: 150px;">

                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Title --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label control-label" for="title">{{ __('Title') }}</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" name="title" id="title"
                                            placeholder="{{ __('Title') }}" value="{{ old('title', $banner->title) }}">
                                    </div>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Link --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label control-label" for="link">{{ __('Link') }}</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                                        </div>
                                        <input type="url" class="form-control form-control-sm" name="link" id="link"
                                            placeholder="{{ __('Banner URL (optional)') }}" value="{{ old('link', $banner->link) }}">
                                    </div>
                                    @error('link')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Type --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label control-label" for="type">{{ __('Banner Position (Type)') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm" name="type" id="type" required>
                                            <option value="after_slider" {{ old('type', $banner->type) == 'after_slider' ? 'selected' : '' }}>After Slider</option>
                                            <option value="after_about" {{ old('type', $banner->type) == 'after_about' ? 'selected' : '' }}>After About</option>
                                            <option value="after_categories" {{ old('type', $banner->type) == 'after_categories' ? 'selected' : '' }}>After Categories</option>
                                            <option value="after_pages" {{ old('type', $banner->type) == 'after_pages' ? 'selected' : '' }}>After Pages</option>
                                            <option value="after_cta" {{ old('type', $banner->type) == 'after_cta' ? 'selected' : '' }}>After CTA</option>
                                            <option value="after_testimonials" {{ old('type', $banner->type) == 'after_testimonials' ? 'selected' : '' }}>After Testimonials</option>
                                            <option value="after_faqs" {{ old('type', $banner->type) == 'after_faqs' ? 'selected' : '' }}>After FAQs</option>
                                            <option value="after_blogs" {{ old('type', $banner->type) == 'after_blogs' ? 'selected' : '' }}>After Blogs</option>
                                            <option value="after_contact" {{ old('type', $banner->type) == 'after_contact' ? 'selected' : '' }}>After Contact</option>
                                            <option value="before_footer" {{ old('type', $banner->type) == 'before_footer' ? 'selected' : '' }}>Before Footer</option>
                                        </select>
                                    </div>
                                    @error('type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Order No --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label control-label" for="order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                        </div>
                                        <input type="number" class="form-control form-control-sm" name="order_no" id="order_no"
                                            placeholder="{{ __('Order Number') }}" value="{{ old('order_no', $banner->order_no) }}" min="0">
                                    </div>
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label control-label" for="status">{{ __('Status') }}
                                    <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm" name="status" id="status" required>
                                            <option value="inactive" {{ old('status', $banner->status) == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                            <option value="active" {{ old('status', $banner->status) == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
