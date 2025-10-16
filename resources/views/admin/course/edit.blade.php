@extends('admin.layouts.master')
@section('title', 'Edit Course')
@section('content')

    @include('admin.course.top-nav')

    <section class="content">
        @include('admin.course.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Edit Course') }}</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.course.update', $course->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- Image --}}
                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">{{ __('Image') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control form-control-sm up-img" name="image" id="image">
                                            <img class=" mw-400 mt-2 show-img img-demo"
                                        src="{{ asset('assets/admin/uploads/courses/' . $course->image) }}" alt=""
                                        width="50px">
                                    @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Title --}}
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control form-control-sm" name="title" id="title"
                                        value="{{ old('title') ?? $course->title }}" placeholder="Enter Title">
                                    @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Slug --}}
                            <div class="form-group row">
                                <label for="slug" class="col-sm-2 col-form-label">{{ __('Slug') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="slug" id="slug"
                                        value="{{ old('slug') ?? $course->slug }}"
                                        placeholder="Auto-generated if left empty">
                                    @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Category --}}
                            <div class="form-group row">
                                <label for="course_category_id" class="col-sm-2 col-form-label">{{ __('Category') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select required class="form-control form-control-sm" name="course_category_id"
                                        id="course_category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $course->course_category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('course_category_id') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="form-group row">
                                <label for="content" class="col-sm-2 col-form-label">{{ __('Content') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea required name="content" class="form-control form-control-sm summernote" rows="6" id="content"
                                        placeholder="{{ __('Course Content') }}">{{ old('content') ?? $course->content }}</textarea>
                                    @error('content') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Icon Font --}}
                            <div class="form-group row">
                                <label for="icon_font" class="col-sm-2 col-form-label">{{ __('Font Icon Class') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="icon_font" id="icon_font"
                                        value="{{ old('icon_font') ?? $course->title }}" placeholder="e.g., fa fa-book">
                                    @error('icon_font') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Icon --}}
                            <div class="form-group row">
                                <label for="icon" class="col-sm-2 col-form-label">{{ __('Icon') }}</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control form-control-sm up-img" name="icon" id="icon">
                                    <img class="mw-400 mt-2 show-img img-demo"
                                        src="{{ asset('assets/admin/uploads/courses/' . $course->icon) }}" alt=""
                                        width="50px">
                                    @error('icon') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Banner Image --}}
                            <div class="form-group row">
                                <label for="banner_image" class="col-sm-2 col-form-label">{{ __('Banner Image') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control form-control-sm up-img" name="banner_image"
                                        id="banner_image">
                                    <img class="mw-400 mt-2 show-img img-demo"
                                        src="{{ asset('assets/admin/uploads/courses/' . $course->banner_image) }}" alt=""
                                        width="50px">
                                    @error('banner_image') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Meta Keywords --}}
                            <div class="form-group row">
                                <label for="meta_keywords" class="col-sm-2 col-form-label">{{ __('Meta Keywords') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="meta_keywords" id="meta_keywords"
                                        data-role="tagsinput" value="{{ old('meta_keywords') ?? $course->meta_keywords }}"
                                        placeholder="{{ __('Meta Keywords') }}">
                                    @error('meta_keywords') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Meta Description --}}
                            <div class="form-group row">
                                <label for="meta_description"
                                    class="col-sm-2 col-form-label">{{ __('Meta Description') }}</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control form-control-sm" name="meta_description" rows="4" id="meta_description"
                                        placeholder="{{ __('Meta Description')}}">{{ old('meta_description') ?? $course->meta_description  }}</textarea>
                                    @error('meta_description') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Serial Number --}}
                            <div class="form-group row">
                                <label for="serial_number" class="col-sm-2 col-form-label">{{ __('Serial Number') }}</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control form-control-sm" name="serial_number" id="serial_number"
                                        value="{{ old('serial_number') ?? $course->serial_number }}">
                                    @error('serial_number') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-sm" name="status" id="status">
                                        <option value="0" {{ $course->status == 0 ? 'selected' : '' }}>{{ __('Unpublish') }}
                                        </option>
                                        <option value="1" {{ $course->status == 1 ? 'selected' : '' }}>{{ __('Publish') }}
                                        </option>
                                    </select>
                                    @error('status') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                </div>
                            </div>

                        </form>
                    </div> <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>

@endsection