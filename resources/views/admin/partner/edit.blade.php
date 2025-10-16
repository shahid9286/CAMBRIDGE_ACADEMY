@extends('admin.layouts.master')
@section('title', 'Edit Partners')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title text-primary"><i class="fas fa-edit"></i> Edit Partner </h3>
                        </div>

                        <form action="{{ route('admin.partner.update', $partner->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body py-3">
                                <div class="row">

                                <div class="col-md-12 mt-2">
                                    <label for="title">{{ __('Partner Title') }}<span
                                            class="text-danger">*</span></label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        </div>

                                        <input type="text" id="title" class="form-control form-control-sm "
                                            name="title" value="{{ old('title', $partner->title) }}"
                                            placeholder="{{ __('Partner Title') }}">
                                    </div>
                                    @if ($errors->has('title'))
                                        <p class="text-danger"> {{ $errors->first('title') }} </p>
                                    @endif
                                </div>


                                <div class="col-md-12 mt-2">
                                    <label for="order_no">Order No <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-sort-numeric-up"></i></span>
                                        </div>

                                        <input type="number" name="order_no" id="order_no"
                                            class="form-control form-control-sm"
                                            value="{{ old('order_no', $partner->order_no) }}" min="0">
                                    </div>
                                    @error('order_no')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>



                                <div class="col-md-12">
                                    <label for="status">{{ __('Status') }}<span class="text-danger">*</span></label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                                        </div>

                                        <select id="status" name="status" class="form-control form-control-sm"
                                            value="{{ old('status', $partner->status) }}">

                                            <option value="published"
                                                {{ $partner->status == 'published' ? 'selected' : '' }}>Published
                                            </option>
                                            <option value="draft" {{ $partner->status == 'draft' ? 'selected' : '' }}>
                                                Draft</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('status'))
                                        <p class="text-danger"> {{ $errors->first('status') }} </p>
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
                                        src="{{ asset('assets/admin/uploads/partner/' . $partner->image) }}" alt=""
                                        width="50px">

                                    @if ($errors->has('image'))
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                 Update
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
