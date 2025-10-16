@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Why Us Images')

@section('content')
    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')

        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Why Us Image List') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.why-us-image.add', ['slug' => $slug]) }}"
                                class="btn btn-sm btn-primary">
                                <i class="bi bi-plus-lg"></i> Add
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table table-sm table-striped table-bordered data_table align-middle text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($why_us_images as $whyUsImage)
                                    <tr>
                                        <td>{{ $whyUsImage->id }}</td>
                                        <td>
                                            <img src="{{ asset($whyUsImage->image) }}" alt="Image" width="50px">
                                        </td>
                                        <td>{{ $whyUsImage->title }}</td>
                                        <td>{{ $whyUsImage->subtitle }}</td>
                                        <td>
                                            <a href="{{ route('admin.why-us-image.edit', ['slug' => $slug, 'id' => $whyUsImage->id]) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form id="deleteform" class="d-inline-block mx-1"
                                                action="{{ route('admin.why-us-image.delete', ['slug' => $slug, 'id' => $whyUsImage->id]) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger" id="delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
