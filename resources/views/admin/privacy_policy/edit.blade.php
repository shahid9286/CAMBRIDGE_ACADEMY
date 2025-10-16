@extends('admin.layouts.master')
@section('title', 'Edit Privacy Policy')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Edit Privacy Policy') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('admin.privacy.policy.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="title" class="col-sm-12 control-label">{{ __('Title') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-heading"
                                                    ></i></span>
                                        </div>
                                        <input type="text" id="title" class="form-control form-control-sm" name="title"
                                            value="{{ old('title', $policy->title ?? '') }}"
                                            placeholder="{{ __('Title') }}"></div>
                                        @if ($errors->has('title'))
                                            <p class="text-danger"> {{ $errors->first('title') }} </p>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-12 control-label">{{ __('Description') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <textarea type="text" id="description" class="form-control summernote" name="description"
                                            placeholder="{{ __('Description') }}">{{ old('description', $policy->description ?? "") }}</textarea>
                                        @if ($errors->has('description'))
                                            <p class="text-danger"> {{ $errors->first('description') }} </p>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <button type="submit"
                                            class="btn btn-primary btn btn-sm">{{ __('Update') }}</button>
                                    </div>
                                </div>
                        </div>

                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        </div>
        <!-- /.row -->

    </section>


@endsection
