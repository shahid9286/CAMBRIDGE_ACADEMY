@extends('admin.layouts.master')
@section('title', 'Job Vacancies')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Job Vacancies') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> {{ __('Home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">{{ __('Job Vacancies') }}</li>
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
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Job Vacancy List') }}</h3>
                        <div class="card-tools d-flex">
                            <!-- Add -->
                            <a href="{{ route('admin.job.jobvacancy.create') }}" 
                               class="btn btn-primary btn-sm me-2" 
                               title="Add New Job Vacancy">
                                <i class="fas fa-plus"></i> Add Job Vacancy
                            </a>

                        </div>
                    </div>

                    <div class="card-body table-responsive">

                        <table class="table table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Deadline') }}</th>
                                    <th>{{ __('Job Type') }}</th>
                                    <th>{{ __('Job Details') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vacancies as $key => $vacancy)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $vacancy->title }}</td>
                                        <td>{{ Str::limit($vacancy->description, 50) }}</td>
                                        <td>{{ $vacancy->deadline ? $vacancy->deadline->format('d M, Y') : '-' }}</td>
                                        <td>{{ $vacancy->job_type }}</td>
                                        <td>{{ Str::limit($vacancy->job_details, 50) }}</td>
                                        <td>
                                            @if($vacancy->is_active)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Edit -->
                                            <a href="{{ route('admin.job.jobvacancy.edit', $vacancy->id) }}" 
                                               class="btn btn-info btn-sm" 
                                               title="Edit Job Vacancy">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <!-- Delete -->
                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.job.jobvacancy.delete', $vacancy->id) }}"
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
                                        <td colspan="8" class="text-center">{{ __('No job vacancies found.') }}</td>
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
