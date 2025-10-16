@extends('admin.layouts.master')
@section('title', 'Trashed Company Jobs')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Trashed Company Jobs</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.job.company.index') }}">
                            Company Jobs
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
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">Trashed Company Jobs</h3>
                        <div class="card-tools d-flex">
                            <!-- Back to Jobs -->
                            <a href="{{ route('admin.job.company.index') }}" 
                               class="btn btn-primary btn-sm me-2"
                               data-bs-toggle="tooltip" data-bs-placement="top" 
                               title="Back to Company Jobs">
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
                                    <th style="width:5%;">#</th>
                                    <th style="width:10%;">Logo</th>
                                    <th style="width:15%;">Name</th>
                                    <th style="width:15%;">Email</th>
                                    <th style="width:10%;">Phone</th>
                                    <th style="width:15%;">Location</th>
                                    <th style="width:20%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($companyjobs as $key => $companyjob)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @if($companyjob->logo)
                                                <img src="{{ asset($companyjob->logo) }}" 
                                                     width="60" height="40" 
                                                     style="object-fit:contain;">
                                            @else
                                                <img src="https://via.placeholder.com/60x40?text=No+Logo" 
                                                     width="60" height="40">
                                            @endif
                                        </td>
                                        <td>{{ $companyjob->name }}</td>
                                        <td>{{ $companyjob->email }}</td>
                                        <td>{{ $companyjob->phone }}</td>
                                        <td>{{ $companyjob->location }}</td>
                                        <td>
                                            <!-- Restore -->
                                            <form action="{{ route('admin.job.company.restore', $companyjob->id) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" 
                                                        class="btn btn-success btn-sm"
                                                        onclick="return confirm('Restore this job?')"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Restore Job">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            </form>

                                            <!-- Force Delete -->
                                            <form action="{{ route('admin.job.company.forceDelete', $companyjob->id) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Permanently delete this job?')"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Delete Forever">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No trashed company jobs found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        {{ $companyjobs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
