@extends('admin.layouts.master')
@section('title', 'Edit Job Country')

@section('content')
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline mt-2">
                    <div class="card-header">
                        <h3 class="card-title text-primary">
                            <i class="fas fa-edit"></i> Edit Job Country
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.job.country.index') }}" 
                               class="btn btn-sm btn-primary" 
                               data-bs-toggle="tooltip" 
                               title="Back to List">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('admin.job.country.update', $jobcountry->id) }}" 
                          method="POST" enctype="multipart/form-data">
                        @csrf
                     

                        <div class="card-body py-3">
                            <div class="row">

                                {{-- Name --}}
                                <div class="col-md-6 mb-3">
                                    <label for="name">Country Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                        <input type="text" name="name" id="name" 
                                               class="form-control form-control-sm" 
                                               value="{{ old('name', $jobcountry->name) }}" 
                                               placeholder="Enter Country Name" required>
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Logo --}}
                                <div class="col-md-6 mb-3">
                                    <label for="logo">Country Logo</label>
                                    <div class="input-group">
                                        <input type="file" name="logo" id="logo" class="form-control form-control-sm">
                                    </div>
                                    @if($jobcountry->logo)
                                        <div class="mt-2">
                                            <img src="{{ asset($jobcountry->logo) }}" alt="{{ $jobcountry->name }}" width="80">
                                        </div>
                                    @endif
                                    @error('logo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
