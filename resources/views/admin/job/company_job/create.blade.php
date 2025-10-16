@extends('admin.layouts.master')
@section('title', 'Add Company Job')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Company Job</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.job.company.index') }}">
                            CompanyJob List
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
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">Add Company Job</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.job.company.index') }}" 
                               class="btn btn-primary btn-sm" 
                               title="Back to Company Jobs">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('admin.job.company.store') }}" 
                          method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body py-3">
                                <div class="row">

                                    {{-- Company Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Company Name <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            <input type="text" name="name" id="name"
                                                   class="form-control form-control-sm"
                                                   value="{{ old('name') }}"
                                                   placeholder="Enter Company Name" required>
                                        </div>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input type="email" name="email" id="email"
                                                   class="form-control form-control-sm"
                                                   value="{{ old('email') }}"
                                                   placeholder="Enter Email" required>
                                        </div>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Website --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="website">Website</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                            <input type="url" name="website" id="website"
                                                   class="form-control form-control-sm"
                                                   value="{{ old('website') }}"
                                                   placeholder="https://example.com">
                                        </div>
                                        @error('website')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Phone --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            <input type="text" name="phone" id="phone"
                                                   class="form-control form-control-sm"
                                                   value="{{ old('phone') }}"
                                                   placeholder="Enter Phone Number" required>
                                        </div>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Location --}}
                                    <div class="col-md-12 mb-3">
                                        <label for="location">Location <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            <input type="text" name="location" id="location"
                                                   class="form-control form-control-sm"
                                                   value="{{ old('location') }}"
                                                   placeholder="Enter Location" required>
                                        </div>
                                        @error('location')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Introduction --}}
                                    <div class="col-md-12 mb-3">
                                        <label for="introduction">Introduction</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            <textarea name="introduction" id="introduction"
                                                      class="form-control form-control-sm"
                                                      placeholder="Enter Introduction">{{ old('introduction') }}</textarea>
                                        </div>
                                        @error('introduction')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Company Logo --}}
                                    <div class="col-md-12 mb-3">
                                        <label for="logo">Company Logo</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text p-1 px-2"><i class="fas fa-image"></i></span>
                                            <input type="file" class="form-control form-control-sm up-img" name="logo" id="logo">
                                        </div>

                                            <img class="mw-400 mt-2 show-img img-demo"
                                                 src="{{ asset('assets/uploads/core/img-demo.jpg') }}"
                                                 alt="Demo Logo" width="50px">

                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        <div class="card-footer">
                            <button class="btn btn-success">
                                <i class="fas fa-check"></i> Save
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
