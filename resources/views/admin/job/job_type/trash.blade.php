@extends('admin.layouts.master')
@section('title', 'Job Type Trash')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Job Type Trash') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> {{ __('Dashboard') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">{{ __('Job Type Trash') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Deleted Job Types') }}</h3>
                        <div class="card-tools d-flex">
                            <!-- Back to List -->
                            <a href="{{ route('admin.job.jobtype.index') }}" 
                                class="btn btn-primary btn-sm me-2" 
                                data-bs-toggle="tooltip" 
                                data-bs-placement="top" 
                                title="Back to List">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 35%;">{{ __('Name') }}</th>
                                    <th style="width: 10%;">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobtypes as $key => $type)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $type->title }}</td>
                                        <td>
                                            <!-- Restore -->
                                            <form action="{{ route('admin.job.jobtype.restore', $type->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" 
                                                        class="btn btn-success btn-sm" 
                                                        data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" 
                                                        title="Restore"
                                                        onclick="return confirm('Restore this Job Type?')">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            </form>

                                            <!-- Permanent Delete -->
                                            <form action="{{ route('admin.job.jobtype.forceDelete', $type->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm" 
                                                        data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" 
                                                        title="Delete Permanently"
                                                        onclick="return confirm('Delete permanently?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">{{ __('No deleted job types found.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
