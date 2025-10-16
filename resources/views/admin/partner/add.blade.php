@extends('admin.layouts.master')
@section('title', 'Add Partners')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title text-primary"><i class="fas fa-plus-circle"></i> Add New Partner</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.partner.index') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                            </div>

                        </div>

                        <form action="{{ route('admin.partner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label for="title ">{{ __('Title ') }}<span class="text-danger">*</span></label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                            </div>

                                            <input type="text" id="title" class="form-control form-control-sm"
                                                name="title" value="{{ old('title') }}"
                                                placeholder="{{ __('Enter Title') }}">
                                        </div>
                                        @if ($errors->has('title'))
                                            <p class="text-danger"> {{ $errors->first('title') }} </p>
                                        @endif
                                    </div>


                                    <div class="col-md-12 mt-2">
                                        <label for="order_no">{{ __('Order No') }}<span class="text-danger">*</span></label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-sort-numeric-up"></i></span>
                                            </div>

                                            <input type="number" id="order_no" class="form-control form-control-sm"
                                                name="order_no" value="{{ old('order_no') }}"
                                                placeholder="{{ __('Order No') }}">
                                        </div>
                                        @if ($errors->has('order_no'))
                                            <p class="text-danger"> {{ $errors->first('order_no') }} </p>
                                        @endif
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label for="image">
                                            {{ __('Image') }} <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img" name="image"
                                                id="image">
                                        </div>
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/uploads/partner/') }}" alt=""
                                            width="50px">

                                        @if ($errors->has('image'))
                                            <p class="text-danger">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label for="status">{{ __('Status') }}<span class="text-danger">*</span></label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                                            </div>

                                            <select id="status" name="status" class="form-control form-control-sm"
                                                value="{{ old('status') }}">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="published">Published</option>
                                                <option value="draft">Draft</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('status'))
                                            <p class="text-danger"> {{ $errors->first('status') }} </p>
                                        @endif

                                    </div>



                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary ">
                                            Save
                                        </button>
                                    </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
