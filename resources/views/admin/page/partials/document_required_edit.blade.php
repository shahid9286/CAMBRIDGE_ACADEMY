@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Document Required')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Document Required Edit') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.document-required.update', $document->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                           <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="title" class="col-form-label col-form-label-sm">
                                        {{ __('Title') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        </div>
                                        <input required type="text" class="form-control" id="title" name="title" value="{{ old('title',$document->title) }}">
                                    </div>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>



                                

                                <div class="col-md-4 mb-3">
                                    <label for="update_status" class="col-form-label col-form-label-sm">
                                        {{ __('Status') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                        </div>
                                        <select required class="form-control" id="update_status" name="status">
                                            <option value="active" {{ $document->status == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="inactive" {{ $document->status == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="order_no" class="col-form-label col-form-label-sm">
                                        {{ __('Order No') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="order_no" name="order_no" value="{{ $document->order_no }}">
                                    </div>
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>



                                <!-- Icon Upload -->
                                <div class="col-md-4 mb-3">
                                    <label for="icon">
                                        {{ __('Icon') }} 
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>
                                        <input type="file" class="form-control form-control-sm up-img" name="icon"
                                            id="icon">
                                    </div>
                                    <img class="mw-400 mb-3 show-img img-demo"
                                        src="{{ asset( $document->icon) }}" alt=""
                                        width="120px">

                                    @if ($errors->has('icon'))
                                        <p class="text-danger">{{ $errors->first('icon') }}</p>
                                    @endif
                                </div>
                            </div>

                                <div class="col-md-12 mb-3">
                                    <label for="description" class="col-form-label col-form-label-sm">
                                        {{ __('Description') }} <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control form-control-sm summernote" id="description" name="description" required>{{ old('description',$document->description) }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            <div class="row">

                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-sm float-right">Submit</button>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection