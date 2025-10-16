@extends('admin.layouts.master')
@section('title','Add New Category')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Add Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.page_category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="row">

                                <!-- Title -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ old('title') }}" required>
                                        </div>
                                        @if ($errors->has('title'))
                                            <p class="text-danger"> {{ $errors->first('title') }} </p>
                                        @endif
                                    </div>
                                </div>
                               
                                <!-- Slug -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Slug <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ old('slug') }}" required>
                                        </div>
                                        @if ($errors->has('slug'))
                                            <p class="text-danger"> {{ $errors->first('slug') }} </p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                            
                                            </div>
                                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="3">{!! old('description') !!}</textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                            <p class="text-danger"> {{ $errors->first('description') }} </p>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="order_no">Order Number</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                            </div>
                                            <input type="number" class="form-control" id="order_no" name="order_no" placeholder="Order Number" min="1"
                                                value="{{ old('order_no') ?? '1' }}">
                                        </div>
                                        @if ($errors->has('order_no'))
                                            <p class="text-danger"> {{ $errors->first('order_no') }} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                            </div>
                                            <select id="status" name="status" class="form-control" required>
                                                <option value="draft">Draft</option>
                                                <option value="published">Published</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('status'))
                                            <p class="text-danger"> {{ $errors->first('status') }} </p>
                                        @endif
                                    </div>
                                </div>


                            </div>



                            <div class="row">
                                <!-- Hero Image -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hero_image">Hero Image <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control up-img" id="hero_image" name="hero_image">
                                        </div>
                                        <img class="mw-400 show-img img-demo mt-2"
                                            src="{{ asset('assets/uploads/core/img-demo.jpg') }}"
                                            alt="" style="width: 120px;">
                                        <small class="text-muted">Recommended: 730x455 px. Formats: jpg, jpeg, png.</small>
                                        @if ($errors->has('hero_image'))
                                            <p class="text-danger">{{ $errors->first('hero_image') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control up-img" id="image" name="image">
                                        </div>
                                        <img class="mw-400 show-img img-demo mt-2"
                                                src="{{ asset('assets/uploads/core/img-demo.jpg') }}"
                                                alt="" style="width: 120px;">
                                        <small class="text-muted">Formats: jpg, jpeg, png.</small>
                                        @if ($errors->has('image'))
                                            <p class="text-danger">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Icon -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="icon">Icon</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-icons"></i></span>
                                            </div>
                                            <input type="file" class="form-control up-img" id="icon" name="icon">
                                        </div>
                                        <img class="mw-400 show-img img-demo mt-2"
                                                src="{{ asset('assets/uploads/core/img-demo.jpg') }}"
                                                alt="" style="width: 120px;">
                                        <small class="text-muted">Formats: jpg, jpeg, png.</small>
                                        @if ($errors->has('icon'))
                                            <p class="text-danger">{{ $errors->first('icon') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Hero Subtitle -->
                               <div class="form-group">
                                    <label for="hero_title">Hero Title</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-subscript"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="hero_title" placeholder="Hero Title"
                                            name="hero_title" value="{{ old('hero_title') }}">
                                    </div>
                                    @if ($errors->has('hero_title'))
                                        <p class="text-danger"> {{ $errors->first('hero_title') }} </p>
                                    @endif
                                </div>

                                <!-- Hero Subtitle -->
                               <div class="form-group">
                                    <label for="hero_sub_title">Hero Subtitle</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-subscript"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="hero_sub_title" placeholder="Hero Subtitle"
                                            name="hero_sub_title" value="{{ old('hero_sub_title') }}">
                                    </div>
                                    @if ($errors->has('hero_sub_title'))
                                        <p class="text-danger"> {{ $errors->first('hero_sub_title') }} </p>
                                    @endif
                                </div>


                                <!-- Hero Description -->
                                <div class="form-group">
                                    <label for="hero_description">Hero Description</label>
                                    <textarea class="form-control" id="hero_description" name="hero_description" placeholder="Hero Description" rows="3">{!! old('hero_description') !!}</textarea>
                                    @if ($errors->has('hero_description'))
                                        <p class="text-danger"> {{ $errors->first('hero_description') }} </p>
                                    @endif
                                </div>


                                <!-- SEO & Extras -->
                               <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-font"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="meta_title" value="{{ old('meta_title') }}" placeholder="Meta Title" name="meta_title">
                                    </div>
                                    @if ($errors->has('meta_title'))
                                        <p class="text-danger"> {{ $errors->first('meta_title') }} </p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" rows="3">{!! old('meta_description') !!}</textarea>
                                    @if ($errors->has('meta_description'))
                                        <p class="text-danger"> {{ $errors->first('meta_description') }} </p>
                                    @endif
                                </div>

                               <div class="form-group">
                                    <label for="keywordsinput">Meta Keywords</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="keywordsinput" placeholder="Meta Keywords" name="meta_keywords">
                                    </div>
                                    @if ($errors->has('meta_keyword'))
                                        <p class="text-danger"> {{ $errors->first('meta_keyword') }} </p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save Page</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
