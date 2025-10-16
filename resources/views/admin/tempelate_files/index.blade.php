@extends('admin.layouts.master')
@section('title', 'Template Files')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Template Files') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-home"></i> {{ __('Home') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">{{ __('Template Files') }}</li>
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
                            <h3 class="card-title mt-1">{{ __('Template Files') }}</h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('admin.tempelate-file.add') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> {{ __('Add Template File') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-striped data_table">
                                <thead>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Icon') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Subtitle') }}</th>
                                        <th>{{ __('Template File') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $index => $template)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('assets/admin/uploads/template/' . $template->icon) }}" alt="Icon"
                                                    width="50px">
                                            </td>
                                            <td>{{ $template->title }}</td>
                                            <td>{{ $template->subtitle }}</td>
                                            <td>
                                                <a href="{{ asset('assets/admin/uploads/template_zips/' . $template->tempelate_file) }}"
                                                    target="_blank" class="btn btn-sm btn-secondary">
                                                    <i class="fas fa-file-download"></i> {{ __('Download') }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.tempelate-file.edit', $template->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.tempelate-file.delete', $template->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

@endsection
