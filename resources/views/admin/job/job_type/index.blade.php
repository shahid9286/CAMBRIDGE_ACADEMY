@extends('admin.layouts.master')
@section('title', 'Job Type')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Job Types') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> {{ __('Home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">{{ __('Job Types') }}</li>
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
                        <h3 class="card-title mt-1">{{ __('Job Type List') }}</h3>
                        <div class="card-tools d-flex">
                            <!-- Add-->
                            <a href="{{ route('admin.job.type.create') }}" 
                                class="btn btn-primary btn-sm me-2" 
                                data-bs-toggle="tooltip" 
                                data-bs-placement="top" 
                                title="Add New Job Type">
                                <i class="fas fa-plus"></i> Add Job Type
                            </a>

                        </div>
                    </div>

                    <div class="card-body table-responsive">

                        <table class="table table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 25%;">{{ __('Name') }}</th>
                                    <th style="width: 20%;">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobtypes as $key => $type)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $type->title }}</td>
                                        <td>
                                            <!-- Edit -->
                                            <a href="{{ route('admin.job.type.edit', $type->id) }}" 
                                                class="btn btn-info btn-sm" 
                                                data-bs-toggle="tooltip" 
                                                data-bs-placement="top" 
                                                title="Edit Job Type">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <!-- Delete -->
                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.job.type.delete', $type->id) }}"
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
                                        <td colspan="5" class="text-center">{{ __('No job types found.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        {{ $jobtypes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
