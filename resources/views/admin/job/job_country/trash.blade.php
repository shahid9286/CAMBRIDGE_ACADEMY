@extends('admin.layouts.master')
@section('title', 'Job Countries Trash')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Job Countries Trash') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> {{ __('Home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">{{ __('Trash') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Trashed Job Countries') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.job.country.index') }}" class="btn btn-primary btn-sm">
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
                                    <th style="width: 25%;">{{ __('Logo') }}</th>
                                    <th style="width: 40%;">{{ __('Name') }}</th>
                                    <th style="width: 20%;">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobcountries as $key => $country)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @if($country->logo)
                                                <img src="{{ asset($country->logo) }}" alt="{{ $country->name }}" width="50">
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $country->name }}</td>
                                        <td>
                                            <!-- Restore -->
                                            <a href="{{ route('admin.job.country.restore', $country->id) }}" 
                                               class="btn btn-success btn-sm" 
                                               data-bs-toggle="tooltip" 
                                               data-bs-placement="top" 
                                               title="Restore">
                                                <i class="fas fa-undo"></i>
                                            </a>

                                            <!-- Force Delete -->
                                            <form action="{{ route('admin.job.country.forceDelete', $country->id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm" 
                                                        data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" 
                                                        title="Delete Permanently"
                                                        onclick="return confirm('Delete permanently?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">{{ __('No trashed job countries found.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        {{ $jobcountries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
