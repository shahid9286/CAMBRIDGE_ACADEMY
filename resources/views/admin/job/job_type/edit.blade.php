@extends('admin.layouts.master')
@section('title', 'Edit Job Type')

@section('content')
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">     
                <div class="card card-primary card-outline mt-2">
                    <div class="card-header">
                        <h3 class="card-title text-primary">
                            <i class="fas fa-edit"></i> Update Job Type
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.job.type.index') }}"
                               class="btn btn-sm btn-primary"
                               data-bs-toggle="tooltip"
                               title="Back to List">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('admin.job.type.update', $jobtype->id) }}" method="POST">
                        @csrf

                        <div class="card-body py-3">
                            <div class="row">

                                {{-- Title --}}
                                <div class="col-md-12">
                                    <label for="title">Job Type Title <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        <input type="text" name="title" id="title"
                                               class="form-control form-control-sm"
                                               value="{{ old('title', $jobtype->title) }}"
                                               placeholder="Enter Job Type Title" required>
                                    </div>
                                    @error('title')
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
