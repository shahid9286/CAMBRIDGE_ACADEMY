@extends('admin.layouts.master')
@section('title', 'Add Gallery Image')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Add Gallery Image') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('admin.gallery.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="image" class="col-sm-2 control-label">{{ __('Image') }}<span
                                            class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                            width="120px">

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class=" form-control form-control-sm-sm up-img" name="image"
                                                id="image">
                                        </div>
                                        <p class="help-block text-info">
                                            {{ __('Upload 70X70 (Pixel) Size image for best quality.
                                                                                                                                                                                        Only jpg, jpeg, png image is allowed.') }}
                                        </p>


                                        @if ($errors->has('image'))
                                            <p class="text-danger">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 control-label">{{ __('Title') }}<span
                                            class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-heading"></i>
                                                </span>
                                            </div>

                                            <input type="text" class="form-control form-control-sm" name="title" id="title"
                                                placeholder="{{ __('Title') }}" value="{{ old('title') }}">
                                        </div>
                                        @if ($errors->has('title'))
                                            <p class="text-danger"> {{ $errors->first('title') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label" for="gcategory_id">{{ __('Category') }}<span
                                            class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-list"></i>
                                                </span>
                                            </div>

                                            <select class="form-control form-control-sm" name="category_id" id="gcategory_id">
                                                @foreach ($gcategories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('category_id'))
                                            <p class="text-danger"> {{ $errors->first('category_id') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="video_link" class="col-sm-2 control-label" for="video_link">{{ __('Video Link') }}</label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-link"></i>
                                                </span>
                                            </div>

                                            <input type="text" class="form-control form-control-sm" name="video_link" id="video_link"
                                                placeholder="{{ __('Video Link') }}" value="{{ old('video_link') }}">
                                        </div>
                                        @if ($errors->has('video_link'))
                                            <p class="text-danger"> {{ $errors->first('video_link') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="serial_no" class="col-sm-2 control-label" for="serial_no">{{ __('Serial No') }}<span
                                            class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-sort-numeric-up"></i>
                                                </span>
                                            </div>

                                            <input type="number" class="form-control form-control-sm" id="serial_no" name="serial_number"
                                                placeholder="{{ __('Order') }}" value="0">
                                        </div>
                                        @if ($errors->has('serial_number'))
                                            <p class="text-danger"> {{ $errors->first('serial_number') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 control-label" for="status">{{ __('Status') }}<span
                                            class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </div>

                                            <select class="form-control form-control-sm" name="status" id="status">
                                                <option value="0" selected>{{ __('Unpublish') }}</option>
                                                <option value="1">{{ __('Publish') }}</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('status'))
                                            <p class="text-danger"> {{ $errors->first('status') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
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
