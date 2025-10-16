@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Feature')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Add Feature') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form class="form-horizontal" action="{{ route('admin.feature.store', ['slug' => $slug]) }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">


                                
                                <div class="col-md-6 mb-3">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ old('title') }}" required>
                                    </div>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subtitle">{{ __('Subtitle') }} </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Subtitle" value="{{ old('subtitle') }}">
                                    </div>
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>



                            </div>

                           
                                
                            

                            <div class="row">
                                
                                <div class="col-md-12 mb-3">
                                    <label for="description">{{ __('Description') }} </label>
                                    <textarea class="form-control summernote" id="description" name="description" placeholder="Enter Description" rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                {{-- Status --}}
                                <div class="col-md-4 mb-3">
                                    <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                        </div>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="active">{{ __('Active') }}</option>
                                            <option value="inactive">{{ __('Inactive') }}</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Order No --}}
                                <div class="col-md-4 mb-3">
                                    <label for="order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="order_no" name="order_no" placeholder="Enter Order Number" value="{{ old('order_no') }}" required>
                                    </div>
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Icon Upload --}}
                                <div class="col-md-4 mb-3">
                                    <label for="icon">{{ __('Icon') }}</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text p-1 px-2"><i class="fas fa-icons"></i></span>
                                        <input type="file" class="form-control form-control-sm up-img" name="icon" id="icon">
                                    </div>
                                    <img class="mw-400 show-img img-demo mt-2" src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="Preview" width="120px">
                                    @error('icon')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
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
