@extends('admin.layouts.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Edit Category</h3>


                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.page_category.update', $page_category->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                            <div class="row">

                                 <!-- Title -->
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="title">Title <span class="text-danger">*</span></label>
                                         <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title"
                                             value="{{ $page_category->title }}" required>
                                     </div>
                                 </div>

                                <!-- Slug -->
                                <div class="col-md-6">     
                                    <div class="form-group">
                                        <label for="slug">Slug <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug"
                                            value="{{ $page_category->slug }}" readonly required>
                                    </div>
                                 </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description </label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="3">{{ $page_category->description }}</textarea>
                                    </div>
                                 </div>

                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="order_no">Order Number</label>
                                        <input type="number" class="form-control" id="order_no" name="order_no" placeholder="Order Number"
                                            value="{{ $page_category->order_no ?? 0 }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select id="status" name="status" class="form-control" required>
                                            <option value="draft" {{ $page_category->status == 'draft' ? 'selected' : '' }}>
                                                Draft</option>
                                            <option value="published"
                                                {{ $page_category->status == 'published' ? 'selected' : '' }}>Published</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>

                          
                            <div class="row">

                                <!-- Hero Image -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hero_image">Hero Image</label>
                                        <input type="file" class="form-control up-img" id="hero_image" name="hero_image">
                                        <img class="mw-400 show-img img-demo mt-2"
                                            src="{{ asset( $page_category->hero_image) }}"
                                            alt="" style="width: 120px;">
                                        <small class="text-muted">Recommended size: 730x455 px. Formats: jpg, jpeg,
                                            png.</small>
                                    </div>
                                </div>

                                <!-- Hero Image -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control up-img" id="image" name="image">
                                        <img class="mw-400 show-img img-demo mt-2"
                                            src="{{ asset( $page_category->image) }}"
                                            alt="" style="width: 120px;">
                                        <small class="text-muted">Recommended size: 730x455 px. Formats: jpg, jpeg,
                                            png.</small>
                                    </div>
                                </div>

                                <!-- Hero Image -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="icon">Icon</label>
                                        <input type="file" class="form-control up-img" id="icon" name="icon">
                                        <img class="mw-400 show-img img-demo mt-2"
                                            src="{{ asset( $page_category->icon) }}"
                                            alt="" style="width: 120px;">
                                        <small class="text-muted">Recommended size: 730x455 px. Formats: jpg, jpeg,
                                            png.</small>
                                    </div>
                                </div>

                            </div>

                                <!-- Hero Title -->
                                <div class="form-group">
                                    <label for="hero_title">Hero Title </label>
                                    <input type="text" class="form-control" id="hero_title" name="hero_title" placeholder="Hero Title"
                                        value="{{ $page_category->hero_title }}">
                                </div>

                                <!-- Hero Subtitle -->
                                <div class="form-group">
                                    <label for="hero_sub_title">Hero Subtitle </label>
                                    <input type="text" class="form-control" id="hero_sub_title" name="hero_sub_title" placeholder="Hero Subtitle"
                                        value="{{ $page_category->hero_sub_title }}">
                                </div>
                                <!-- Hero Description -->
                                <div class="form-group">
                                    <label for="hero_description">Hero Description </label>
                                    <textarea class="form-control" id="hero_description" name="hero_description"  placeholder="Hero Description" rows="3">{{ $page_category->hero_description }}</textarea>
                                </div>

                                <!-- SEO & Extras -->
                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title"
                                        value="{{ $page_category->meta_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" rows="3">{{ $page_category->meta_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="keywordsinput">Meta Keywords</label>
                                    <input type="text" class="form-control" id="keywordsinput" name="meta_keywords" placeholder="Meta Keywords"
                                        value="{{ $page_category->meta_keywords }}">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Page</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
