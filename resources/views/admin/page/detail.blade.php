@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Page')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Edit Page</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.page.update', $page->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
    
                        <div class="row">

                            <!-- Title -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title"
                                            value="{{ $page->title ?? old('slug') }}" required>
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
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug"
                                            value="{{ $page->slug ?? old('title') }}" readonly required>
                                    </div>
                                    @if ($errors->has('slug'))
                                        <p class="text-danger"> {{ $errors->first('slug') }} </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description </label>
                                    <textarea class="form-control form-control-sm summernote" id="description" name="description" placeholder="Enter Description" rows="3">{{ $page->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <p class="text-danger"> {{ $errors->first('description') }} </p>
                                    @endif
                                </div>
                            </div>

                        
                            <!-- Order Number -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="order_no">Order Number</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i
                                                    class="fas fa-sort-numeric-up-alt"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="order_no" name="order_no" placeholder="Order Number"
                                            value="{{ $page->order_no ?? 0 }}">
                                    </div>
                                    @if ($errors->has('order_no'))
                                        <p class="text-danger"> {{ $errors->first('order_no') }} </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                        </div>
                                        <select id="status" name="status" class="form-control" required>
                                            <option value="draft" {{ $page->status == 'draft' ? 'selected' : '' }}>
                                                Draft</option>
                                            <option value="published"
                                                {{ $page->status == 'published' ? 'selected' : '' }}>Published</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('status'))
                                        <p class="text-danger"> {{ $errors->first('status') }} </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Page Link For -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="page_link_for">Page Link For <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-signs"></i></span>
                                        </div>
                                        <select id="page_link_for" name="page_link_for" class="form-control" required>
                                            <option value="header"
                                                {{ $page->page_link_for == 'header' ? 'selected' : '' }}>Header
                                            </option>
                                            <option value="footer"
                                                {{ $page->page_link_for == 'footer' ? 'selected' : '' }}>Footer
                                            </option>
                                            <option value="services"
                                                {{ $page->page_link_for == 'services' ? 'selected' : '' }}>Services
                                            </option>
                                            <option value="none"
                                                {{ $page->page_link_for == 'none' ? 'selected' : '' }}>None</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('page_link_for'))
                                        <p class="text-danger"> {{ $errors->first('page_link_for') }} </p>
                                    @endif
                                </div>
                            </div>
                        </div>


                            <div class="row">
                                <!-- Route Name -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="route_name">Route Name</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-route"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="route_name" name="route_name" placeholder="Route Name"
                                                value="{{ $page->route_name ?? old('route_name') }}">
                                        </div>
                                        @if ($errors->has('route_name'))
                                            <p class="text-danger"> {{ $errors->first('route_name') }} </p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Category Type -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Category Type</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                            </div>
                                            <select id="type" name="type" class="form-control" required>
                                                <option value="website" {{ $page->type == 'website' ? 'selected' : '' }}>
                                                    Website</option>
                                                <option value="marketing"
                                                    {{ $page->type == 'marketing' ? 'selected' : '' }}>Marketing</option>
                                                <option value="seo" {{ $page->type == 'seo' ? 'selected' : '' }}>SEO
                                                </option>
                                                <option value="whatsapp-Marketing"
                                                    {{ $page->type == 'whatsapp-Marketing' ? 'selected' : '' }}>
                                                    Whatsapp-Marketing
                                                </option>
                                            </select>
                                        </div>
                                        @if ($errors->has('type'))
                                            <p class="text-danger"> {{ $errors->first('type') }} </p>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <!-- Hero Image -->
                                <div class="col-md-4">
                                    <label class="col-form-label col-form-label-sm"
                                        for="hero_image">{{ __('Hero Image') }}</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text p-1 px-2"><i class="fas fa-image"></i></span>
                                        <input type="file" class="form-control form-control-sm up-img"
                                            name="hero_image" id="hero_image">
                                    </div>
                                    <img class="mw-400 show-img img-demo mt-2"
                                        src="{{ isset($page->hero_image) ? asset($page->hero_image) : asset('assets/admin/img/img-demo.jpg') }}"
                                        alt="" width="120px">
                                    <small class="text-muted d-block">Recommended: 730x455 px. Formats: jpg, jpeg,
                                        png.</small>
                                    @error('hero_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <!-- Image -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label col-form-label-sm"
                                            for="image">{{ __('Image') }}</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text p-1 px-2"><i
                                                    class="fas fa-file-image"></i></span>
                                            <input type="file" class="form-control form-control-sm up-img"
                                                id="image" name="image">
                                        </div>

                                        {{-- Preview Image --}}
                                        <img class="mw-400 show-img img-demo mt-2"
                                            src="{{ isset($page->image) ? asset($page->image) : asset('assets/admin/img/img-demo.jpg') }}"
                                            alt="" width="120px">
                                        <small class="text-muted d-block">Recommended: 730x455 px. Formats: jpg, jpeg,
                                        png.</small>
                                        {{-- Error --}}
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
                                            <input type="file" class="form-control form-control-sm up-img"
                                                id="icon" name="icon">
                                        </div>
                                        <img class="mw-400 show-img img-demo mt-2"
                                            src="{{ isset($page->icon) ? asset($page->icon) : asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                            width="120px">
                                            <small class="text-muted d-block">Recommended: 730x455 px. Formats: jpg, jpeg,
                                        png.</small>
                                        @if ($errors->has('icon'))
                                            <p class="text-danger">{{ $errors->first('icon') }}</p>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <!-- Hero Title -->
                            <div class="form-group mt-4">
                                <label for="hero_title_en" class="col-form-label col-form-label-sm">Hero Title</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="hero_title" placeholder="Hero Title"
                                        name="hero_title" value="{{ $page->hero_title ?? old('hero_title') }}">
                                    @if ($errors->has('hero_title'))
                                        <p class="text-danger"> {{ $errors->first('hero_title') }} </p>
                                    @endif
                                </div>

                                <!-- Hero Subtitle -->
                                <div class="form-group mt-4">
                                    <label for="hero_sub_title" class="col-form-label col-form-label-sm">Hero
                                        Subtitle</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="hero_sub_title" placeholder="Hero Subtitle"
                                            name="hero_sub_title"
                                            value="{{ $page->hero_sub_title ?? old('hero_subtitle') }}">
                                        @if ($errors->has('hero_sub_title'))
                                            <p class="text-danger"> {{ $errors->first('hero_sub_title.en') }} </p>
                                        @endif
                                    </div>

                                    <!-- Hero Description -->
                                    <div class="form-group mt-4">
                                        <label for="hero_description">Hero Description </label>
                                        <textarea class="form-control form-control-sm" id="hero_description" name="hero_description" placeholder="Helo Description" rows="3">{{ $page->hero_description ?? old('hero_description') }}</textarea>
                                        @if ($errors->has('hero_description'))
                                            <p class="text-danger"> {{ $errors->first('hero_description') }} </p>
                                        @endif
                                    </div>

                                    <!-- SEO & Extras -->
                                    <div class="form-group mt-4">
                                        <label for="meta_title">Meta Title</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="meta_title" placeholder="Meta Title"
                                                name="meta_title" value="{{ $page->meta_title ?? old('meta_title') }}">
                                            @if ($errors->has('meta_title'))
                                                <p class="text-danger"> {{ $errors->first('meta_title') }} </p>
                                            @endif
                                        </div>
                                        <div class="form-group mt-4">
                                            <label for="meta_description">Meta Description</label>
                                            <textarea class="form-control form-control-sm" id="meta_description" name="meta_description" placeholder="Meta Description" rows="3">{{ $page->meta_description ?? old('meta_description') }}</textarea>
                                            @if ($errors->has('meta_description'))
                                                <p class="text-danger"> {{ $errors->first('meta_description') }} </p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="keywordsinput" class="col-form-label col-form-label-sm">Meta
                                                Keywords</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-sm" placeholder="Meta Keywords"
                                                    id="keywordsinput" name="meta_keywords"
                                                    value="{{ $page->meta_keywords }}">
                                                @if ($errors->has('meta_keywords'))
                                                    <p class="text-danger"> {{ $errors->first('meta_keywords') }} </p>
                                                @endif
                                            </div>

                                            <div class="row">
                                                <div class="col mt-3">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Update
                                                            Page</button>
                                                    </div>
                                                </div>
                                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
