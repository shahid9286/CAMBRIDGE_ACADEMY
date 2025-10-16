@extends('admin.layouts.master')

@section('title', 'Job Applicants')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Job Applicants</h3>
                        </div>

                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped data_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Description</th>
                                        <th>Resume</th>
                                        <th>Job Title</th>
                                        <th>Applied At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($applicants as $index => $applicant)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $applicant->fullname }}</td>
                                            <td>{{ $applicant->email }}</td>
                                            <td>{{ $applicant->phone }}</td>
                                            <td>{{ Str::limit($applicant->description, 50) }}</td>
                                            <td>
                                                @if ($applicant->resume)
                                                    <a href="{{ asset('storage/' . $applicant->resume) }}" target="_blank"
                                                        class="btn btn-sm btn-info">
                                                        View Resume
                                                    </a>
                                                @else
                                                    <span class="text-muted">No Resume</span>
                                                @endif
                                            </td>
                                            <td>{{ $applicant->job->title ?? 'N/A' }}</td>
                                            <td>{{ $applicant->created_at->format('d M, Y h:i A') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">No applicants found.</td>
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
