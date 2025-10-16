@extends('admin.layouts.master')
@section('title', 'Trashed Job Cities')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Trashed Job Cities') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> {{ __('Home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">{{ __('Trashed Job Cities') }}</li>
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
                        <h3 class="card-title mt-1">{{ __('Trashed Job City List') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.job.jobcity.index') }}" 
                               class="btn btn-primary btn-sm">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 40%;">{{ __('City Name') }}</th>
                                    <th style="width: 35%;">{{ __('Country') }}</th>
                                    <th style="width: 20%;">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobcities as $key => $city)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $city->name }}</td>
                                        <td>{{ $city->country?->name }}</td>
                                        <td>
                                            <!-- Restore -->
                                            <form action="{{ route('admin.job.jobcity.restore', $city->id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                <button type="submit" 
                                                        class="btn btn-success btn-sm"
                                                        title="Restore Job City">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            </form>

                                            <!-- Permanent Delete -->
                                            <form action="{{ route('admin.job.jobcity.forceDelete', $city->id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                            
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm" 
                                                        title="Delete Permanently"
                                                        onclick="return confirm('Delete Permanently?')">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">{{ __('No trashed job cities found.') }}</td>
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
