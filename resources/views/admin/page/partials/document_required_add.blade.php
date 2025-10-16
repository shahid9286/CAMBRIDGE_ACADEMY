@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Document Required')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Document Required Add') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.document-required.store', ['slug' => $slug]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name Field -->

                           <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="title" class="col-form-label col-form-label-sm">
                                        {{ __('Title') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input required type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                                    </div>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>



                                <div class="col-md-4  mb-3">
                                    <label for="status" class="col-form-label col-form-label-sm">
                                    {{ __('Status') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                        </div>
                                        <select required class="form-control" id="status" name="status">
                                            <option value="active">{{ __('Active') }}</option>
                                            <option value="inactive">{{ __('Inactive') }}</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4  mb-3">
                                    <label for="order_no" class="col-form-label col-form-label-sm">
                                        {{ __('Order No') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                        </div>
                                        <input required value="1" type="number" class="form-control" id="order_no" name="order_no" placeholder="Enter Order Number">
                                    </div>
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>




                                <!-- icon -->
                            <div class="col-md-4 ">
                                    <label class="col-form-label col-form-label-sm" for="icon">{{ __('Icon') }}</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text p-1 px-2"><i class="fas fa-icons"></i></span>
                                    <input type="file" class="form-control form-control-sm up-img" name="icon" id="icon">
                                </div>
                                <img class="mw-400 show-img img-demo mt-2" src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="120px">
                                @error('icon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                    
                                </div>
                            </div>

                                <div class="col-md-12 ">
                                    <label for="description" class="col-form-label col-form-label-sm">
                                    {{ __('Description') }} <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control form-control-sm summernote" id="description" name="description" placeholder="Enter Description">{{ old('description') }}</textarea>
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
