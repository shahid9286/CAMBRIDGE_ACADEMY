@extends('admin.layouts.master')
@section('title', 'Trashed Job Candidates')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('Trashed Candidates') }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}">
              <i class="fas fa-home"></i> {{ __('Home') }}
            </a>
          </li>
          <li class="breadcrumb-item">{{ __('Trashed Candidates') }}</li>
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
            <h3 class="card-title">{{ __('Deleted Candidates') }}</h3>
            <div class="card-tools">
              <a href="{{ route('admin.job-candidate.index') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
              </a>
            </div>
          </div>

          <div class="card-body table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>{{ __('ID') }}</th>
                  <th>{{ __('Name') }}</th>
                  <th>{{ __('Email') }}</th>
                  <th>{{ __('Deleted At') }}</th>
                  <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($trashed as $candidate)
                  <tr>
                    <td>{{ $candidate->id }}</td>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->email }}</td>
                    <td>{{ $candidate->deleted_at->format('d M, Y') }}</td>
                    <td>
                      <form action="{{ route('admin.job-candidate.restore', $candidate->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">
                          <i class="fas fa-undo"></i> {{ __('Restore') }}
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
