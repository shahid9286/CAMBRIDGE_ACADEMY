@extends('admin.layouts.master')
@section('title', 'Company Jobs')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Company Jobs') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> {{ __('Home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">{{ __('Company Jobs') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    
                    <!-- Card Header -->
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Company Jobs List') }}</h3>
                        <div class="card-tools d-flex">
                            <!-- Add Job -->
                            <a href="{{ route('admin.job.company.create') }}" 
                               class="btn btn-primary btn-sm me-2" 
                               data-bs-toggle="tooltip" 
                               data-bs-placement="top" 
                               title="Add New Job">
                                <i class="fas fa-plus"></i> Add Job
                            </a>

                            <!-- Trash -->
                        </div>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="card-body table-responsive">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 10%;">{{ __('Logo') }}</th>
                                    <th style="width: 15%;">{{ __('Name') }}</th>
                                    <th style="width: 20%;">{{ __('Email') }}</th>
                                    <th style="width: 15%;">{{ __('Phone') }}</th>
                                    <th style="width: 15%;">{{ __('Location') }}</th>
                                    <th style="width: 20%;">{{ __('Action') }}</th>
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
                                            <!-- Edit -->
                                            <a href="{{ route('admin.job.company.edit', $companyjob->id) }}" 
                                               class="btn btn-info btn-sm" 
                                               data-bs-toggle="tooltip" 
                                               data-bs-placement="top" 
                                               title="Edit Job">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <!-- Delete -->
                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.job.company.delete', $companyjob->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">{{ __('No jobs found.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- /.card-body -->

                    <!-- Footer with Pagination -->
                    <div class="card-footer">
                        {{ $companyjobs->links() }}
                    </div>
                </div> <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection
