@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Industry Trash</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.job.industry.index') }}">Industry List</a></li>
            </ol>
        </nav>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Card -->
    <div class="card card-outline card-primary shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Trashed Industries</h5>
            <div class="card-tools d-flex">
                <a href="{{ route('admin.job.industry.index') }}" 
                   class="btn btn-primary btn-sm"
                   data-bs-toggle="tooltip" title="Back to Industry List">
                    <i class="fas fa-arrow-left"></i> Industry List
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Icon</th>
                            <th>Name</th>
                            <th>Introduction</th>
                            <th>Order No</th>
                            <th width="160">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($industryjobs as $key => $industry)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if($industry->icon)
                                    <img src="{{ asset($industry->icon) }}" width="40" height="40" style="object-fit:contain;">
                                @else
                                    <img src="https://via.placeholder.com/40?text=No+Icon" width="40" height="40">
                                @endif
                            </td>
                            <td>{{ $industry->name }}</td>
                            <td>{{ Str::limit($industry->introduction, 50) }}</td>
                            <td>{{ $industry->order_no }}</td>
                            <td>
                                <!-- Restore -->
                                <form action="{{ route('admin.job.industry.restore', $industry->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-outline-success btn-sm"
                                            data-bs-toggle="tooltip" title="Restore"
                                            onclick="return confirm('Are you sure you want to restore this record?')">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                </form>

                                <!-- Permanent Delete -->
                                <form action="{{ route('admin.job.industry.forceDelete', $industry->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm"
                                            data-bs-toggle="tooltip" title="Permanent Delete"
                                            onclick="return confirm('This action cannot be undone. Delete permanently?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No trashed industries.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $industryjobs->links() }}
    </div>
</div>
@endsection
