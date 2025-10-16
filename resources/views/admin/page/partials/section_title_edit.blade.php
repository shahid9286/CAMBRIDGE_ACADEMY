@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Section Title')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Section Title Edit') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.section_title.update', $section_title->id) }}" method="post">
                            @csrf
                            <div class="row">
                                {{-- Title --}}
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        </div>
                                        <input required type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ $section_title->title ?? old('title') }}">
                                    </div>
                                    @if ($errors->has('title'))
                                        <p class="text-danger"> {{ $errors->first('title') }} </p>
                                    @endif
                                </div>

                                {{-- SubTitle --}}
                                <div class="col-md-6">
                                    <label for="subtitle">{{ __('SubTitle') }}</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-subscript"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Subtitle" value="{{ $section_title->subtitle ?? old('subtitle') }}">
                                    </div>
                                    @if ($errors->has('subtitle'))
                                        <p class="text-danger"> {{ $errors->first('subtitle') }} </p>
                                    @endif
                                </div>

                                {{-- Description --}}
                                <div class="col-md-12 mt-3">
                                    <label for="description">{{ __('Description') }}</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="{{ $section_title->description ?? old('description') }}">
                                    </div>
                                    @if ($errors->has('description'))
                                        <p class="text-danger"> {{ $errors->first('description') }} </p>
                                    @endif
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6 mt-3">
                                    <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                        </div>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="active" {{ $section_title->status == 'active' ? 'selected' : '' }}>
                                                {{ __('Active') }}
                                            </option>
                                            <option value="inactive" {{ $section_title->status == 'inactive' ? 'selected' : '' }}>
                                                {{ __('Inactive') }}
                                            </option>
                                        </select>
                                    </div>
                                    @if ($errors->has('status'))
                                        <p class="text-danger"> {{ $errors->first('status') }} </p>
                                    @endif
                                </div>

                                {{-- Type --}}
                                <div class="col-md-6 mt-3">
                                    <label for="type">{{ __('Type') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                                        </div>
                                        <select class="form-control" name="type" id="type" required>
                                            <option disabled>Select Type</option>
                                            @foreach ($section_types as $type)
                                                <option value="{{ $type }}" {{ $type == $section_title->type ? 'selected' : '' }}>
                                                    {{ ucfirst(str_replace('_', ' ', $type)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('type'))
                                        <p class="text-danger"> {{ $errors->first('type') }} </p>
                                    @endif
                                </div>

                                {{-- Submit --}}
                                <div class="col-12">
                                    <button class="btn btn-sm btn-primary mt-3 float-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
