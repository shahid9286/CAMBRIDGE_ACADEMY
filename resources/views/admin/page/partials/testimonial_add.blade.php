@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Testimonial')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
    <div class="col-md-12">
        {{-- content --}}
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title mt-1">{{ __('Testimonial Add') }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.testimonial.store', ['slug' => $slug]) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- Row 1: Name and Order --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input name="name" id="name" class="form-control" value="{{ old('name')}}" placeholder="Enter Name" required>
                                </div>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="order_no">{{ __('Order') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                    </div>
                                    <input type="number" name="order_no" id="order_no" class="form-control" placeholder="Enter Order Number" required value="{{ old('order_no') }}">
                                </div>
                                @error('order_no')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Row 2: Feedback and Designation --}}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="feedback">{{ __('Feedback') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-comment-dots"></i></span>
                                    </div>
                                    <input name="feedback" id="feedback" class="form-control" placeholder="Give Feedback" value="{{ old('feedback')}}" required>
                                </div>
                                @error('feedback')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="designation">{{ __('Designation') }}</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                    <input type="text" name="designation" id="designation" class="form-control" placeholder="Your Designation" value="{{ old('designation')}}">
                                </div>
                                @error('designation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Row 3: Status and Image --}}
                    <div class="row">
                        <!-- Status -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                    </div>
                                    <select class="form-control form-control-sm" name="status" id="status" required>
                                        <option value="inactive">{{ __('Inactive') }}</option>
                                        <option value="active">{{ __('Active') }}</option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Image -->
                                        <div class="col-md-6 mb-3"> 
                                            <label class="col-form-label col-form-label-sm"
                                                for="image">{{ __('Image') }}</label>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text p-1 px-2"><i class="fas fa-image"></i></span>
                                                <input type="file" class="form-control form-control-sm up-img"
                                                    name="image" id="image">
                                            </div>
                                            <img class="mw-400 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                width="120px">
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>


                    {{-- Submit Button --}}
                              <div class="col-12">
                                <button class="btn btn-sm btn-primary mt-2 float-right">Submit</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
