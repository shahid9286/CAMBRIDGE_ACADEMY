@extends('admin.layouts.master')
@section('title', 'Job Cities')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Job Cities') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> {{ __('Home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">{{ __('Job Cities') }}</li>
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
                        <h3 class="card-title mt-1">{{ __('Job City List') }}</h3>
                        <div class="card-tools d-flex">
                            <!-- Add-->
                            <a href="{{ route('admin.job.city.create') }}" 
                               class="btn btn-primary btn-sm me-2" 
                               title="Add New Job City">
                                <i class="fas fa-plus"></i> Add Job City
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
                                            <!-- Edit -->
                                            <a href="{{ route('admin.job.city.edit', $city->id) }}" 
                                               class="btn btn-info btn-sm" 
                                               title="Edit Job City">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <!-- Delete -->
                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.job.city.delete', $city->id) }}"
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
                                        <td colspan="4" class="text-center">{{ __('No job cities found.') }}</td>
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
