@extends('admin.layouts.master')
@section('title', ' Teams List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1 text-primary"><i class="fas fa-list-alt "></i>
                                <b>{{ __('List of Teams ') }}</b>
                            </h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('admin.teams.add') }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="fas fa-plus"></i> {{ __('Add Team ') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered table-sm data_table">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">{{ __('#') }}</th>
                                            <th style="width: 15%;">{{ __('Photo') }}</th>
                                            <th style="width: 20%;">{{ __('Name') }}</th>
                                            <th style="width: 20%;">{{ __('Designation') }}</th>
                                            <th style="width: 14%;">{{ __('Status') }}</th>
                                            <th style="width: 26%; white-space: nowrap;">{{ __('Action') }}</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @forelse ($teams as $index => $team)
                                            <tr>
                                                <td class="text-center">{{ ++$index }}</td>
                                                <td>
                                                    @if ($team->photo)
                                                        <img src="{{ asset($team->photo) }}"
                                                            alt="{{ $team->name }}-photo"
                                                            style="width: 50px; height:50px;">
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $team->name }}
                                                </td>

                                                <td>{{ $team->designation }}</td>

                                            <td>
                                                @if ($team->status == 'active')
                                                    <span class="badge bg-success">Active</span>
                                                @elseif($team->status == 'inactive')
                                                    <span class="badge bg-info">Inactive</span>
                                                @endif
                                            </td>
                                                <td>
                                                    <div class=" float-end" role="group"
                                                        aria-label=" Team Actions">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('admin.teams.edit', $team->id) }}"
                                                            class="btn btn-info btn-sm" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Edit Teams ">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <!-- Delete Button -->
                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.teams.delete', $team->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i>{{ __('Delete') }}
                                                    </button>
                                                </form>



                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">No Teams found.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
