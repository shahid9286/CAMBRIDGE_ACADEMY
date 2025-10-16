@extends('admin.layouts.master')
@section('title', 'Create Job City')

@section('content')
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline mt-2">
                    <div class="card-header">
                        <h3 class="card-title text-primary">
                            <i class="fas fa-plus-circle"></i> Add Job City
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.job.city.index') }}" 
                               class="btn btn-sm btn-primary" 
                               data-bs-toggle="tooltip" 
                               title="Back to List">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('admin.job.city.store') }}" method="POST">
                        @csrf
                        <div class="card-body py-3">
                            <div class="row">

                                {{-- City Name --}}
                                <div class="col-md-6 mb-3">
                                    <label for="name">City Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        <input type="text" name="name" id="name" 
                                               class="form-control form-control-sm" 
                                               placeholder="Enter City Name" required>
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Country --}}
                                <div class="col-md-6 mb-3">
                                    <label for="country_id">Country <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                        <select name="country_id" id="country_id" 
                                                class="form-control form-control-sm" required>
                                            <option value="">-- Select Country --</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('country_id')
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
