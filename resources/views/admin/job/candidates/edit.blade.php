@extends('admin.layouts.master')
@section('title', 'Edit Job Candidate')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('Edit Job Candidate') }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}">
              <i class="fas fa-home"></i> {{ __('Home') }}
            </a>
          </li>
          <li class="breadcrumb-item">{{ __('Edit Job Candidate') }}</li>
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
            <h3 class="card-title mt-1">{{ __('Edit Job Candidate') }}</h3>
            <div class="card-tools">
              <a href="{{ route('admin.job-candidate.index') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
              </a>
            </div>
          </div>

          <div class="card-body">
            <form action="{{ route('admin.job-candidate.update', $candidate->id) }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                <label class="col-sm-2 control-label" for="name">{{ __('Candidate Name') }} <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name', $candidate->name) }}" placeholder="{{ __('Full Name') }}" id="name" required>
                  </div>
                  @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 control-label" for="email">{{ __('Email') }} <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" name="email" class="form-control form-control-sm" value="{{ old('email', $candidate->email) }}" placeholder="{{ __('Email Address') }}" id="email" required>
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
                    <input type="text" name="phone" class="form-control form-control-sm" value="{{ old('phone', $candidate->phone) }}" placeholder="{{ __('Phone Number') }}" id="phone">
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 control-label" for="job_id">{{ __('Job Applied For') }} <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <select name="job_id" class="form-control form-control-sm" id="job_id">
                    @foreach($jobs as $job)
                      <option value="{{ $job->id }}" {{ $candidate->job_id == $job->id ? 'selected' : '' }}>
                        {{ $job->title }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 control-label" for="resume">{{ __('Resume Upload') }}</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-sm mb-2">
                    <span class="input-group-text p-1 px-2">
                      <i class="fas fa-file-upload"></i>
                    </span>
                    <input type="file" class="form-control form-control-sm" name="resume" id="resume">
                  </div>

                  @if($candidate->resume)
                    <a href="{{ asset($candidate->resume) }}" target="_blank" class="btn btn-outline-info btn-sm">
                      <i class="fas fa-file-alt"></i> {{ __('View Current Resume') }}
                    </a>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 control-label" for="letter">{{ __('Cover Letter') }}</label>
                <div class="col-sm-10">
                  <textarea name="cover_letter" class="form-control form-control-sm" rows="4" placeholder="{{ __('Write a short message...') }}" id="letter">{{ old('cover_letter', $candidate->cover_letter) }}</textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> {{ __('Update') }}
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
