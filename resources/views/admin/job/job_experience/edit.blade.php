@extends('admin.layouts.master')
@section('title', 'Edit Job Experience')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Job Experience</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.job.experience.index') }}">
                            Job Experience List
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">Edit Job Experience</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.job.experience.index') }}" 
                               class="btn btn-primary btn-sm" 
                               title="Back to Experiences">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('admin.job.experience.update', $jobexperience->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body py-3">
                            <div class="row">

                                {{-- Experience Title --}}
                                <div class="col-md-12 mb-3">
                                    <label for="title">Experience Title <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        <input type="text" name="title" id="title"
                                               class="form-control form-control-sm"
                                               value="{{ old('title', $jobexperience->title) }}"
                                               placeholder="title for position" required>
                                    </div>
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">
                                <i class="fas fa-check"></i> Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
