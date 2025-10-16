@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Introduction Section')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Introduction Section Add') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form class="form-horizontal" action="{{ route('admin.introduction_section.store', ['slug' => $slug]) }}"
                            method="POST" enctype="multipart/form-data">
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

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                     <label for="description" class="col-form-label col-form-label-sm">{{ __('Description') }}</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="description" name="description" placeholder="Enter Description" value="{{ old('description') }}">
                                    </div>
                                    @if ($errors->has('description'))
                                        <p class="text-danger"> {{ $errors->first('description') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-3">

                                <div class="col-md-4">
                                   <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
         <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
            </div>
            <select required class="form-control" id="status" name="status">
                <option value="active">{{ __('Active') }}</option>
                <option value="inactive">{{ __('Inactive') }}</option>
            </select>
        </div>
        @if ($errors->has('status'))
            <p class="text-danger"> {{ $errors->first('status') }} </p>
        @endif
    </div>
                                 <!-- image -->
                                 <div class="col-md-4">
                                    <label class="col-form-label col-form-label-sm" for="image">{{ __('Image') }}</label>
    <div class="input-group input-group-sm">
        <span class="input-group-text p-1 px-2"><i class="fas fa-image"></i></span>
        <input type="file" class="form-control form-control-sm up-img" name="image" id="image">
    </div>
    <img class="mw-400 show-img img-demo mt-2" src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
    @error('image')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

                                <!-- icon -->
                                <div class="col-md-4">
                                      <label class="col-form-label col-form-label-sm" for="icon">{{ __('Icon') }}</label>
    <div class="input-group input-group-sm">
        <span class="input-group-text p-1 px-2"><i class="fas fa-icons"></i></span>
        <input type="file" class="form-control form-control-sm up-img" name="icon" id="icon">
    </div>
    <img class="mw-400 show-img img-demo mt-2" src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
    @error('icon')
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
