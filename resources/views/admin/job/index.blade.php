@extends('admin.layouts.master')
@section('title', ' Company Job List')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Jobs') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Jobs') }}</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                    <h3 class="card-title">{{ __('Job List') }}</h3>
                    <div class="card-tools d-flex">
                        <a href="{{ route('admin.job.add') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> {{ __('Add') }}
                        </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" data-target="job-bulk-delete" class="bulk_all_delete"></th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Position') }}</th>
                                <th>{{ __('Vacancy') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Dead line') }}</th>
                                <th>{{ __('Order') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Thumbnail') }}</th>
                                <th>{{ __('Banner') }}</th>    
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($jobs as $id=>$job)
                            <tr id="job-bulk-delete">
                                <td>
                                    <input type="checkbox" class="bulk-item" value="{{ $job->id}} ">
                                </td>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->position }}</td>
                                <td>{{ $job->vacancy }}</td>
                                <td>{{ $job->jcategory->name }}</td>
                                <td><span class="badge bg-warning">{{ Carbon\Carbon::parse($job->deadline)->format('d-M-Y') }}</span></td>
                                <td>{{ $job->serial_number }}</td>
                                <td>
                                    @if($job->status == 1)
                                        <span class="badge badge-success">{{ __('Publish') }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ __('Unpublish') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($job->thumbnail_img)
                                        <img src="{{ asset($job->thumbnail_img) }}" width="60" height="60" style="object-fit:cover;" alt="Thumbnail">
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    @if($job->banner_img)
                                        <img src="{{ asset($job->banner_img) }}" width="120" height="60" style="object-fit:cover;" alt="Banner">
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.job.edit', $job->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>
                                    <form id="deleteform" class="d-inline-block" action="{{ route('admin.job.delete', $job->id ) }}" method="post">
                                        @csrf
                                        @method('get')
                                        <input type="hidden" name="id" value="{{ $job->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                            <i class="fas fa-trash"></i>{{ __('Delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
