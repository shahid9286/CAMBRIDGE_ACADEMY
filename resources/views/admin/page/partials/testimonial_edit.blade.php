@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Testimonial')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card border-top border-5 border-primary">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mt-1">{{ __('Edit Testimonial') }}</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="row">

    {{-- Name (English) --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Enter Name" required
                    value="{{ $testimonial->name }}">
            </div>
            @error('name')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>
    </div>

    {{-- Order --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="order_no">{{ __('Order') }} <span class="text-danger">*</span></label>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                </div>
                <input type="number" name="order_no" id="order_no" class="form-control form-control-sm" placeholder="Enter Order Number"
                    value="{{ old('order_no', $testimonial->order_no) }}" required>
            </div>
            @error('order_no')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

                                {{-- Feedback (English) --}}
                                <div class="row">
    {{-- Feedback --}}
  <div class="col-md-8">
    <div class="form-group">
        <label for="feedback" class="col-form-label col-form-label-sm">
            {{ __('Feedback') }} <span class="text-danger">*</span>
        </label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-comment-dots"></i></span>
            </div>
            <input type="text" name="feedback" id="feedback" class="form-control" value="{{ $testimonial->feedback }}" placeholder="Give Feedback" required>
        </div>
        @error('feedback')
            <p class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
        @enderror
    </div>
</div>



    {{-- Designation --}}
    <div class="col-md-4">
    <div class="form-group">
        <label for="designation">{{ __('Designation') }}</label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
            </div>
            <input type="text" name="designation" id="designation" class="form-control" placeholder="Your Designation"
                value="{{ $testimonial->designation }}">
        </div>
        @error('designation')
            <p class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
        @enderror
    </div>
</div>

</div>


                                {{-- Status --}}
                              <div class="row">
                                <div class="col-md-6">
    <div class="form-group">
        <label for="status" class="col-form-label col-form-label-sm">
            {{ __('Status') }} <span class="text-danger">*</span>
        </label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
            </div>
            <select class="form-control" name="status" id="status" required>
                <option value="inactive" {{ $testimonial->status == 'inactive' ? 'selected' : '' }}>
                    {{ __('Inactive') }}
                </option>
                <option value="active" {{ $testimonial->status == 'active' ? 'selected' : '' }}>
                    {{ __('Active') }}
                </option>
            </select>
        </div>
        @error('status')
            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
        @enderror
    </div>
</div>

                                <!-- Image Upload -->
                                <div class="col-md-6 mb-3">
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
     src="{{ $testimonial->image ? asset($testimonial->image) : asset('assets/admin/img/img-demo.jpg') }}"
     alt="Image Preview" width="120px">

                                    @if ($errors->has('image'))
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>
                                   

                                {{-- Submit --}}
                               <div class="col-12 mb-2">
                                    <button class="btn btn-sm btn-primary mt-2 float-right">Submit</button>
                                </div>
                                 </div>

                            </div> {{-- .row --}}
                        </form>
                    </div> {{-- .card-body --}}
                </div> {{-- .card --}}
            </div>
        </div>
    </section>
@endsection
