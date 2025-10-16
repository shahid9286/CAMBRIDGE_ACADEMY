@extends('admin.layouts.master')
@section('title', 'Trashed Job Experiences')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Trashed Job Experiences') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> {{ __('Home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.job.jobexperience.index') }}">{{ __('Job Experiences') }}</a>
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

                    <!-- Card Header -->
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Trashed Experiences') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.job.jobexperience.index') }}"
                               class="btn btn-primary btn-sm"
                               title="Back to List">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
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
                                    <th style="width: 10%;">#</th>
                                    <th style="width: 60%;">{{ __('Title') }}</th>
                                    <th style="width: 30%;">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jobexperiences as $key => $experience)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $experience->title }}</td>
                                        <td>
                                       <form id="deleteform" action="{{ route('admin.job.jobexperience.restore', $experience->id) }}"
                                                method="POST" class="d-inline-block">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm" title="Restore">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            </form>


                                            <!-- Permanent Delete -->
                                            <form  action="{{ route('admin.job.jobexperience.forceDelete', $experience->id) }}"
                                                  method="post"
                                                  class="d-inline-block">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"  >
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">{{ __('No trashed experiences found.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- /.card-body -->

                </div> <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection
-