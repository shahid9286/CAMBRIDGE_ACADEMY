@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Section Title')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Section Title Add') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.section_title.store', ['slug' => $slug]) }}" method="post">
                            @csrf

                           <div class="row">

                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Title" id="title" name="title" value="{{ old('title') }}" required>
                                    </div>
                                    @if ($errors->has('title'))
                                        <p class="text-danger"> {{ $errors->first('title') }} </p>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="subtitle">{{ __('SubTitle') }}</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Subtitle" value="{{ old('subtitle') }}">
                                    </div>
                                    @if ($errors->has('subtitle'))
                                        <p class="text-danger"> {{ $errors->first('subtitle') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-3">
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
                                <div class="col-md-6">
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

                                <div class="col-md-6">
                                    <label for="type" class="control-label">{{ __('Type') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                        </div>
                                        <select required class="form-control" name="type" id="type">
                                            <option disabled selected>Select Type</option>
                                            @foreach ($section_types as $type)
                                                <option value="{{ $type }}">{{ ucfirst(str_replace('_', ' ', $type)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('type'))
                                        <p class="text-danger"> {{ $errors->first('type') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-sm btn-primary mt-2 float-right">
                                    Submit
                                </button>
                            </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection