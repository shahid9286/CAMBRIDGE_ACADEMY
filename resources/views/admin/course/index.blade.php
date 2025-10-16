@extends('admin.layouts.master')
@section('title', 'Courses')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline mt-2">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Course List') }}</h3>
                        <div class="card-tools d-flex">
                            {{-- Add Button --}}
                            <a href="{{ route('admin.course.add') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> {{ __('Add') }}
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="idtable" class="table table-bordered table-striped data_table">
                            <thead>
                                <tr>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th>{{ __('Serial Number') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $id => $course)
                                <tr>
                                    <td>
                                        <img class="w-80" 
                                             src="{{ asset('assets/admin/uploads/courses/' . $course->image) }}" 
                                             alt="">
                                    </td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->category->title ?? '' }}</td>
                                    <td>{{ $course->serial_number }}</td>
                                    <td>
                                        @if ($course->status == 1)
                                            <span class="badge badge-success">{{ __('Publish') }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ __('Unpublish') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.course.edit', $course->slug) }}"
                                           class="btn btn-info btn-sm">
                                           <i class="fas fa-pencil-alt"></i>{{ __('Edit') }}
                                        </a>
                                        <form id="deleteform" class="d-inline-block"
                                              action="{{ route('admin.course.delete', $course->id) }}" method="post">
                                            @csrf
                                            @method('get')
                                            <input type="hidden" name="id" value="{{ $course->id }}">
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
</section>
@endsection
