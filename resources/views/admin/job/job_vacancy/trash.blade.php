@extends('admin.layouts.master')
@section('title', 'Job Vacancies Trash')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Job Vacancies Trash') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> {{ __('Home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.job.jobvacancy.index') }}">
                            {{ __('Job Vacancies') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('Trash') }}</li>
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
                        <h3 class="card-title mt-1">{{ __('Trashed Job Vacancies') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.job.jobvacancy.index') }}" 
                               class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> {{ __('Back to List') }}
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
                                    <th>#</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Deadline') }}</th>
                                    <th>{{ __('Job Type') }}</th>
                                    <th>{{ __('Job Details') }}</th>
                                    <th>{{ __('Active?') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vacancies as $key => $job)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ Str::limit($job->description, 50) }}</td>
                                        <td>{{ $job->deadline ? $job->deadline->format('Y-m-d') : '-' }}</td>
                                        <td>{{ $job->job_type }}</td>
                                        <td>{{ Str::limit($job->job_details, 50) }}</td>
                                        <td>
                                            @if($job->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Restore -->
                                            <form action="{{ route('admin.job.jobvacancy.restore', $job->id) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm" 
                                                        onclick="return confirm('Restore this job?')">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            </form>

                                            <!-- Force Delete -->
                                            <form action="{{ route('admin.job.jobvacancy.forceDelete', $job->id) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" 
                                                        onclick="return confirm('Permanently delete this job?')">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">{{ __('No trashed job vacancies found.') }}</td>
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
