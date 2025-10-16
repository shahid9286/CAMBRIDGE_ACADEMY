@extends('admin.layouts.master')
@section('title', 'Add Job Candidate')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('Add Job Candidate') }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}">
              <i class="fas fa-home"></i> {{ __('Home') }}
            </a>
          </li>
          <li class="breadcrumb-item">{{ __('Candidates') }}</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title mt-1">{{ __('Add Candidate') }}</h3>
            <div class="card-tools">
              <a href="{{ route('admin.job-candidate.index') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
              </a>
            </div>
          </div>

          <div class="card-body">
            <form action="{{ route('admin.job-candidate.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                <label class="col-sm-2 control-label" for="name">{{ __('Candidate Name') }}<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="name" class="form-control form-control-sm" id="name" placeholder="{{ __('Full Name') }}" value="{{ old('name') }}" required>
                  </div>
                  @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 control-label" for="email">{{ __('Email') }}<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" name="email" class="form-control form-control-sm" id="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required>
                  </div>
                  @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 control-label" for="phone">{{ __('Phone') }}</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="phone" class="form-control form-control-sm" id="phone" placeholder="{{ __('Phone Number') }}" value="{{ old('phone') }}">
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 control-label" for="job_id">{{ __('Job Applied For') }}<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <select name="job_id" class="form-control form-control-sm" id="job_id">
                    @foreach($jobs as $job)
                      <option value="{{ $job->id }}">{{ $job->title }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 control-label" for="resume">{{ __('Resume Upload') }}</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-sm">
                    <span class="input-group-text p-1 px-2">
                      <i class="fas fa-file-upload"></i>
                    </span>
                    <input type="file" class="form-control form-control-sm" name="resume" id="resume">
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 control-label" for="letter">{{ __('Cover Letter') }}</label>
                <div class="col-sm-10">
                  <textarea name="cover_letter" class="form-control form-control-sm" rows="4" id="letter" placeholder="{{ __('Write a short message...') }}">{{ old('cover_letter') }}</textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ __('Save') }}
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
