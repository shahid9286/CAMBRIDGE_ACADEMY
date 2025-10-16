@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Why Us Image')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                <div class="card border-top border-5 border-primary">
                    <div class="card-header">
                        <h3 class="card-title mt-1">Add Why Us Image</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.why-us-image.store', ['slug' => $slug]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                     <label for="title">{{ __('Title') }}<span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    </div>
                                    <input type="text" id="title" class="form-control" name="title" placeholder="Enter Title" value="{{ old('title') }}" required>
                                </div>
                                @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                                <div class="col-md-6">
                                    <label for="subtitle">{{ __('Subtitle') }}</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-subscript"></i></span>
                                    </div>
                                    <input type="text" id="subtitle" class="form-control" name="subtitle" placeholder="Enter Subtitle" value="{{ old('subtitle') }}">
                                </div>
                                @error('subtitle') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                                

                                <div class="col-md-6">
                                    <label class="col-form-label col-form-label-sm" for="status">Status <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text p-1 px-2"><i class="fas fa-toggle-on"></i></span>
                                        <select required class="form-control form-control-sm" id="status" name="status">
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                     <label for="order_no">{{ __('Order No') }}<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                        </div>
                                        <input type="number" id="order_no" class="form-control" name="order_no"
                                            value="{{ old('order_no') }}" placeholder="Enter Order No" required>
                                    </div>
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                               <div class="col-md-12"><div class="form-group row">
                                    <label class="col-sm-2 control-label" for="image">{{ __('Image') }} <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text p-1 px-2">
                                                <i class="fas fa-image"></i>
                                            </span>
                                            <input type="file" class="form-control form-control-sm up-img" name="image" id="image" required>
                                        </div>

                                        <img class="mw-400 show-img img-demo mt-2"
                                            src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="120px">

                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="description" class="col-form-label col-form-label-sm">
                                        {{ __('Description') }} <span class="text-danger">*</span>
                                        </label>
                                    <textarea class="form-control form-control-sm summernote" id="description" name="description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-12 mt-3 text-end">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
