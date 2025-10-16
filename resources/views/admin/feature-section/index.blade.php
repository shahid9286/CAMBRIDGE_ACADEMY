@extends('admin.layouts.master')
@section('title', ' Feature Section')
@section('content')


    <section class="content">
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card mt-2 card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">Feature Section List</h3>
                        <div class="card-tools d-flex ">

                            <a class="btn btn-sm btn-primary" href="{{ route('admin.feature.section.add') }}"><i
                                    class="fas fa-plus"></i> Add Feature Section</a>

                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($sections as $index => $section)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>
                                            <img src="{{ asset('assets/admin/uploads/feature-section/' . $section->image) }}"
                                                width="50px" alt="image">
                                        </td>
                                        <td>{{ $section->title }}</td>
                                        <td>{{ $section->subtitle }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.feature.section.edit', $section->id) }}"
                                                class="btn btn-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Delete Button with form -->
                                            <form id="deleteform" class="d-inline-block mx-1"
                                                action="{{ route('admin.feature.section.delete', $section->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger" id="delete">
                                                    <i class="fas fa-trash"></i>
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
    </section>

@endsection
