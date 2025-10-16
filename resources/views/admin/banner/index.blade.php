@extends('admin.layouts.master')
@section('title', 'Banner List')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Banner List') }}</h3>
                            <div class="card-tools d-flex">
                                <div class="d-inline-block mr-4">
                                </div>
                                <a href="{{ route('admin.banner.add') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> {{ __('Add Banner') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body table-responsive">
                            <table class="table table-striped table-bordered data_table">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">{{ __('#') }}</th>
                                        <th style="width: 15%;">{{ __('Image') }}</th>
                                        <th style="width: 20%;">{{ __('Title') }}</th>
                                        <th style="width: 15%;">{{ __('Type') }}</th>
                                        <th style="width: 10%;">{{ __('Order') }}</th>
                                        <th style="width: 10%;">{{ __('Status') }}</th>
                                        <th style="width: 25%;">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $banner)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset($banner->image) }}" alt="{{ $banner->title }}"
                                                    style="width: 60px; height: auto;">
                                            </td>
                                            <td>
                                                {{ $banner->title ?? '-' }}
                                                @if ($banner->link)
                                                    <br>
                                                    <a href="{{ $banner->link }}" target="_blank" class="small text-primary">
                                                        {{ Str::limit($banner->link, 30) }}
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-info text-uppercase">
                                                    {{ str_replace('_', ' ', $banner->type) }}
                                                </span>
                                            </td>
                                            <td>{{ $banner->order_no }}</td>
                                            <td>
                                                @if ($banner->status == 'active')
                                                    <span class="badge badge-success">{{ __('Active') }}</span>
                                                @else
                                                    <span class="badge badge-warning">{{ __('Inactive') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.banner.edit', $banner->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
                                                </a>

                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.banner.delete', $banner->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection