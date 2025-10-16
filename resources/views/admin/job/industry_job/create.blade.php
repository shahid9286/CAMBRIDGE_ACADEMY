@extends('admin.layouts.master')
@section('title', 'Add Industry')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title text-primary">
                                <i class="fas fa-plus-circle"></i> Add New Industry
                            </h3>
                            <div class="card-tools">
                                <!-- Back Button -->
                                <a href="{{ route('admin.job.industry.index') }}"
                                   class="btn btn-sm btn-primary"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top"
                                   title="Back to List">
                                    <i class="fas fa-arrow-left"></i>List Industry
                                </a>
                            </div>
                        </div>

                        <form action="{{ route('admin.job.industry.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body py-3">
                                <div class="row">

                                    {{-- Industry Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Industry Name <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                            <input type="text" id="name" name="name"
                                                   class="form-control form-control-sm"
                                                   value="{{ old('name') }}"
                                                   placeholder="Enter Industry Name" required>
                                        </div>
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Order No --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="order_no">Order No <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-sort-numeric-up"></i></span>
                                            <input type="number" name="order_no" id="order_no"
                                                   class="form-control form-control-sm"
                                                   value="{{ old('order_no', 1) }}" required>
                                        </div>
                                        @error('order_no')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Introduction --}}
                                    <div class="col-md-12 mb-3">
                                        <label for="introduction">Introduction</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            <textarea name="introduction" id="introduction"
                                                      class="form-control form-control-sm"
                                                      placeholder="Enter Introduction">{{ old('introduction') }}</textarea>
                                        </div>
                                        @error('introduction')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Industry Icon --}}
                                    <div class="col-md-12 mb-3">
                                        <label for="icon">Industry Icon</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text p-1 px-2"><i class="fas fa-icons"></i></span>
                                            <input type="file" class="form-control form-control-sm up-img" name="icon" id="icon">
                                        </div>
                                        <img class="mw-400 mt-1 show-img img-demo"
                                             src="{{ asset('assets/uploads/core/img-demo.jpg') }}" 
                                             alt="Icon Preview" width="50px">
                                        @if ($errors->has('icon'))
                                            <p class="text-danger">{{ $errors->first('icon') }}</p>
                                        @endif
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
