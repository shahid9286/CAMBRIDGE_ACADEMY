@extends('admin.layouts.master')
@section('title', 'Edit Company')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title text-primary">
                                <i class="fas fa-building"></i> Update Company
                            </h3>
                            <div class="card-tools">
                                <!-- Back Button -->
                                <a href="{{ route('admin.job.company.index') }}"
                                   class="btn btn-sm btn-primary"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Back to List">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>

                        <form action="{{ route('admin.job.company.update', $companyjob->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body py-3">
                                <div class="row">

                                    {{-- Company Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Company Name <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            <input type="text" name="name" id="name"
                                                   class="form-control form-control-sm"
                                                   value="{{ old('name', $companyjob->name) }}"
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
                                                   value="{{ old('email', $companyjob->email) }}"
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
                                                   value="{{ old('website', $companyjob->website) }}"
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
                                                   value="{{ old('phone', $companyjob->phone) }}"
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
                                                   value="{{ old('location', $companyjob->location) }}"
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
                                                      placeholder="Enter Introduction">{{ old('introduction', $companyjob->introduction) }}</textarea>
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

                                        @if($companyjob->logo)
                                            <img class="mw-400 mt-2 show-img img-demo"
                                                 src="{{ asset($companyjob->logo) }}"
                                                 alt="Current Logo" width="80px">
                                        @else
                                            <img class="mw-400 mt-2 show-img img-demo"
                                                 src="{{ asset('assets/uploads/core/img-demo.jpg') }}"
                                                 alt="Demo Logo" width="80px">
                                        @endif

                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sync-alt"></i> Update
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
