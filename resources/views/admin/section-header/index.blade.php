@extends('admin.layouts.master')
@section('title', 'Section Header')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Section Header List') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.section-header.add') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Add Section Header
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Subtitle') }}</th>
                                    <th>{{ __('Use For') }}</th>
                                    <th>{{ __('Editable') }}</th>
                                    <th>{{ __('Deletable') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $key => $section)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $section->title }}</td>
                                        <td>{{ $section->subtitle }}</td>
                                        <td>{{ $section->use_for }}</td>
                                        <td>
                                            @if ($section->is_editable)
                                                <span class="badge badge-success">Editable</span>
                                            @else
                                                <span class="badge badge-secondary">Not Editable</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($section->is_deleteable)
                                                <span class="badge badge-success">Deleteable</span>
                                            @else
                                                <span class="badge badge-secondary">Not Deleteable</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- Edit Button --}}
                                            @if ($section->is_editable)
                                                <a href="{{ route('admin.section-header.edit', $section->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                            @else
                                                <button class="btn btn-secondary btn-sm" disabled>
                                                    Not Editable
                                                </button>
                                            @endif

                                            {{-- Delete Button --}}
                                            @if ($section->is_deleteable)
                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.section-header.delete', $section->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" value="{{ $section->id }}">
                                                    <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i>{{ __('Delete') }}
                                                    </button>
                                                </form>
                                            @else
                                                <button class="btn btn-secondary btn-sm" disabled>
                                                    Not Deletable
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
