@extends('admin.layouts.master')
@section('title', 'Create Job Country')

@section('content')
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline mt-2">
                    <div class="card-header">
                        <h3 class="card-title text-primary">
                            <i class="fas fa-plus-circle"></i> Add Job Country
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

                    <form action="{{ route('admin.job.country.store') }}" method="POST" enctype="multipart/form-data">
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
                                    @error('logo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">
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
