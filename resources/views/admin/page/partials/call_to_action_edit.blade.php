@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Call To Action')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('CallToAction Edit') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.call-to-action.update', ['id' => $cta->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name Field -->
     <div class="row">
    <div class="col-md-6">
        <label for="ctaTitle">{{ __('Title') }} <span class="text-danger">*</span></label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-heading"></i></span>
            </div>
            <input required type="text" class="form-control form-control-sm" id="ctaTitle" name="title" placeholder="Enter Title" value="{{ $cta->title }}">
        </div>
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="ctaSubtitle">{{ __('Subtitle') }}</label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control form-control-sm" id="ctaSubtitle" name="subtitle" placeholder="Enter Subtitle" value="{{ $cta->subtitle }}">
        </div>
        @error('subtitle')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-4">
        <label for="ctaButtonText">{{ __('Button Text') }} <span class="text-danger">*</span></label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-font"></i></span>
            </div>
            <input required type="text" class="form-control form-control-sm" id="ctaButtonText" name="button_text" placeholder="Enter Button Text" value="{{ $cta->button_text }}">
        </div>
        @error('button_text')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="ctaButtonLink">{{ __('Button Link') }} <span class="text-danger">*</span></label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-link"></i></span>
            </div>
            <input required type="url" class="form-control form-control-sm" id="ctaButtonLink" name="button_link" placeholder="Enter Button Link" value="{{ $cta->button_link }}">
        </div>
        @error('button_link')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="ctaStatus">{{ __('Status') }} <span class="text-danger">*</span></label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
            </div>
            <select required class="form-control form-control-sm" id="ctaStatus" name="status">
                <option value="active" {{ $cta->status == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                <option value="inactive" {{ $cta->status == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
            </select>
        </div>
        @error('status')
            <p class="text-danger">{{ $message }}</p>
        @enderror
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
