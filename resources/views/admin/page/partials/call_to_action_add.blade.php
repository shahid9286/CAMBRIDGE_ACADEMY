@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Call To Action')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Add Call To Action') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.call-to-action.store', ['slug' => $slug]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name Field -->

                           <div class="row">
    <!-- Title Field -->
    <div class="col-md-6">
        <label for="title" class="col-form-label col-form-label-sm">
            {{ __('Title') }} <span class="text-danger">*</span>
        </label>
        <div class="input-group input-group-sm">
            <span class="input-group-text"><i class="fas fa-heading"></i></span>
            <input required type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
        </div>
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Subtitle Field -->
    <div class="col-md-6">
        <label for="subtitle" class="col-form-label col-form-label-sm">
            {{ __('Sub Title') }}
        </label>
        <div class="input-group input-group-sm">
            <span class="input-group-text"><i class="fas fa-subscript"></i></span>
            <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Subtitle">
        </div>
        @error('subtitle')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-4">
        <label for="button_text">{{ __('Button Text') }} <span class="text-danger">*</span></label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pen"></i></span>
            </div>
            <input required type="text" class="form-control form-control-sm" id="button_text" name="button_text" placeholder="Enter Button Text">
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
            <input required type="url" class="form-control form-control-sm" id="ctaButtonLink" name="button_link" placeholder="Enter Button Link">
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
                <option value="active">{{ __('Active') }}</option>
                <option value="inactive">{{ __('Inactive') }}</option>
            </select>
        </div>
        @error('status')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

                            
                            <div class="row">

                                <div class="col-12 mt-4">
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
