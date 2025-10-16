@extends('admin.layouts.master')
@section('title', 'Job Candidates')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('Job Candidates') }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}">
              <i class="fas fa-home"></i> {{ __('Home') }}
            </a>
          </li>
          <li class="breadcrumb-item">{{ __('Job Candidates') }}</li>
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
          <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h3 class="card-title mb-0">{{ __('All Job Candidates') }}</h3>

            <div class="card-tools" style="margin-left: auto; display: flex; gap: 8px;">
              <a href="{{ route('admin.job-candidate.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> {{ __('Add') }}
              </a>
              <a href="{{ route('admin.job-candidate.trashed') }}" class="btn btn-danger btn-sm">
                <i class="fas fa-trash-alt"></i> {{ __('Trashed') }}
              </a>
            </div>
          </div>


          <div class="card-body table-responsive">
            <table class="table table-striped table-bordered data_table">
              <thead>
                <tr>
                  <th>{{ __('ID') }}</th>
                  <th>{{ __('Candidate Name') }}</th>
                  <th>{{ __('Email') }}</th>
                  <th>{{ __('Phone') }}</th>
                  <th>{{ __('Job Title') }}</th>
                  <th>{{ __('Resume') }}</th>
                  <th>{{ __('Applied At') }}</th>
                  <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($candidates as $candidate)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->email }}</td>
                    <td>{{ $candidate->phone ?? 'N/A' }}</td>
                    <td>{{ $candidate->job->title ?? 'N/A' }}</td>
                    <td>
                      @if($candidate->resume)
                        <a href="{{ asset($candidate->resume) }}" class="btn btn-success btn-sm" target="_blank">
                          <i class="fas fa-file-download"></i> {{ __('View') }}
                        </a>
                      @else
                        <span class="text-muted">N/A</span>
                      @endif
                    </td>
                    <td>{{ $candidate->created_at->format('d M, Y') }}</td>
                    <td>
                      <a href="{{ route('admin.job-candidate.edit', $candidate->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
                      </a>

                      <form action="{{ route('admin.job-candidate.delete', $candidate->id) }}" method="POST" id="deleteform" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                          <i class="fas fa-trash"></i> {{ __('Delete') }}
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

@endsection
