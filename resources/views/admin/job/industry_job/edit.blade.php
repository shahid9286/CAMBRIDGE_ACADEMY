@extends('admin.layouts.master')
@section('title', 'Edit Industry')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title text-primary">
                                <i class="fas fa-edit"></i> Update Industry
                            </h3>
                            <div class="card-tools">
                                <!-- Back Button -->
                                <a href="{{ route('admin.job.industry.index') }}"
                                   class="btn btn-sm btn-primary"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Back to List">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>

                        <form action="{{ route('admin.job.industry.update', $industryjob->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body py-3">
                                <div class="row">

                                    {{-- Industry Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Industry Name <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                            <input type="text" name="name" id="name"
                                                   class="form-control form-control-sm"
                                                   value="{{ old('name', $industryjob->name) }}"
                                                   placeholder="Enter Industry Name" required>
                                        </div>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Order No --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="order_no">Order No <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-sort-numeric-up"></i></span>
                                            <input type="number" name="order_no" id="order_no"
                                                   class="form-control form-control-sm"
                                                   value="{{ old('order_no', $industryjob->order_no) }}" required>
                                        </div>
                                        @error('order_no')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Introduction --}}
                                    <div class="col-md-12 mb-3">
                                        <label for="introduction">Introduction</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            <textarea name="introduction" id="introduction"
                                                      class="form-control form-control-sm"
                                                      placeholder="Enter Introduction">{{ old('introduction', $industryjob->introduction) }}</textarea>
                                        </div>
                                        @error('introduction')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Industry Icon --}}
                                    <div class="col-md-12 mb-3">
                                        <label for="icon">Industry Icon</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text p-1 px-2"><i class="fas fa-icons"></i></span>
                                            <input type="file" class="form-control form-control-sm up-img" name="icon" id="icon">
                                        </div>

                                        @if($industryjob->icon)
                                            <img class="mw-400 mt-2 show-img img-demo"
                                                 src="{{ asset($industryjob->icon) }}"
                                                 alt="Current Icon" width="50px">
                                        @else
                                            <img class="mw-400 mt-2 show-img img-demo"
                                                 src="{{ asset('assets/uploads/core/img-demo.jpg') }}"
                                                 alt="Demo Icon" width="50px">
                                        @endif

                                        @error('icon')
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
