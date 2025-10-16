@extends('admin.layouts.master')
@section('title', 'Industry')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Industries') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-home"></i> {{ __('Home') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">{{ __('Industries') }}</li>
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
                            <h3 class="card-title mt-1">{{ __('Industry List') }}</h3>
                            <div class="card-tools d-flex">
                                <!-- Add-->
                                <a href="{{ route('admin.job.industry.create') }}" class="btn btn-primary btn-sm me-2"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Add New Industry">
                                    <i class="fas fa-plus"></i>Add Industry
                                </a>

                            </div>

                        </div>

                        <div class="card-body table-responsive">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <table class="table table-striped table-bordered data_table">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 10%;">{{ __('Icon') }}</th>
                                        <th style="width: 20%;">{{ __('Name') }}</th>
                                        <th style="width: 35%;">{{ __('Introduction') }}</th>
                                        <th style="width: 10%;">{{ __('Order No') }}</th>
                                        <th style="width: 20%;">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($industryjobs as $key => $industry)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                @if ($industry->icon)
                                                    <img src="{{ asset($industry->icon) }}" width="40" height="40"
                                                        style="object-fit:contain;">
                                                @else
                                                    <img src="https://via.placeholder.com/40?text=No+Icon" width="40"
                                                        height="40">
                                                @endif
                                            </td>
                                            <td>{{ $industry->name }}</td>
                                            <td>{{ Str::limit($industry->introduction, 50) }}</td>
                                            <td>{{ $industry->order_no }}</td>
                                            <td>
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.job.industry.edit', $industry->id) }}"
                                                    class="btn btn-info btn-sm" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit Industry">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <!-- Delete Button -->
                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.job.industry.delete', $industry->id) }}"
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
                                            <td colspan="6" class="text-center">{{ __('No industries found.') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->

                        <div class="card-footer">
                            {{ $industryjobs->links() }}
                        </div>
                    </div> <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
