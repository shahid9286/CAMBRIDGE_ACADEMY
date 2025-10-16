@extends('admin.layouts.master')
@section('title', 'Edit SEO Meta')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-3">

                    <form class="form-horizontal" action="{{ route('admin.seo.meta.update', $seoMeta->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- PAGE INFO --}}
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-file-alt"></i> Page Information</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.seo.meta.index') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> Back
                                    </a>
                                </div>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Page Slug</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            <input type="text" name="page_slug" class="form-control"
                                                value="{{ old('page_slug', $seoMeta->page_slug) }}">
                                        </div>
                                        @error('page_slug')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Page ID</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            <input type="text" name="page_id" class="form-control"
                                                value="{{ old('page_id', $seoMeta->page_id) }}">
                                        </div>
                                        @error('page_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    {{-- Is Global --}}
                                    <div class="col-md-6">
                                        <label for="is_global">{{ __('Is Global') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="fas fa-toggle-on"></i></span></div>
                                            <select id="is_global" name="is_global" class="form-control form-control-sm">
                                                <option value="global"
                                                    {{ (old('is_global') ?? $seoMeta->is_global) == 'global' ? 'selected' : '' }}>
                                                    Global</option>
                                                <option value="local"
                                                    {{ (old('is_global') ?? $seoMeta->is_global) == 'local' ? 'selected' : '' }}>
                                                    Local</option>
                                            </select>
                                        </div>
                                        @error('is_global')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Priority</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                            <input type="number" name="priority" class="form-control"
                                                value="{{ old('priority', $seoMeta->priority) }}">
                                        </div>
                                        @error('priority')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- META INFO --}}
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-search"></i> Meta Information</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Meta Title</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                            <input type="text" name="meta_title" class="form-control"
                                                value="{{ old('meta_title', $seoMeta->meta_title) }}">
                                        </div>
                                        @error('meta_title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Meta Description</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>

                                            <textarea name="meta_description" class="form-control form-control-sm" rows="3">{{ old('meta_description', $seoMeta->meta_description) }}</textarea>
                                        </div>

                                        @error('meta_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="meta_keywords">{{ __('Meta Keywords') }}</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            <input type="text" class="form-control form-control-sm" data-role="tagsinput"
                                                name="meta_keywords" placeholder="{{ __('Meta Keywords') }}"
                                                value="{{ old('meta_keywords', $seoMeta->meta_keywords ?? '') }}">
                                        </div>
                                        @if ($errors->has('meta_keywords'))
                                            <p class="text-danger">{{ $errors->first('meta_keywords') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Canonical URL</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            <input type="text" name="canonical_url" class="form-control"
                                                value="{{ old('canonical_url', $seoMeta->canonical_url) }}">
                                        </div>
                                        @error('canonical_url')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Robots Tag</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-robot"></i></span>

                                            <input type="text" name="robots_tag" class="form-control form-control-sm"
                                                value="{{ old('robots_tag', $seoMeta->robots_tag) }}">
                                        </div>

                                        @error('robots_tag')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Meta Author</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>

                                            <input type="text" name="meta_author" class="form-control form-control-sm"
                                                value="{{ old('meta_author', $seoMeta->meta_author) }}">
                                        </div>

                                        @error('meta_author')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Meta Type</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-tag"></i></span>

                                            <input type="text" name="meta_type" class="form-control form-control-sm"
                                                value="{{ old('meta_type', $seoMeta->meta_type) }}">
                                        </div>

                                        @error('meta_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="meta_image">Meta Image</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            <input type="file" class="form-control up-img" name="meta_image"
                                                id="meta_image">
                                        </div>
                                        <img class="mw-400 mb-3 show-img img-demo" width="50"
                                            src="{{ asset('assets/admin/uploads/seo_metas/' . $seoMeta->meta_image) }}"
                                            alt="">
                                        @error('meta_image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- OPEN GRAPH --}}
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fab fa-facebook"></i> Open Graph</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>OG Title</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>

                                            <input type="text" name="og_title" class="form-control form-control-sm"
                                                value="{{ old('og_title', $seoMeta->og_title) }}">
                                        </div>

                                        @error('og_title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>OG Description</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>

                                            <textarea name="og_description" class="form-control form-control-sm" rows="3">{{ old('og_description', $seoMeta->og_description) }}</textarea>
                                        </div>

                                        @error('og_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>OG Type</label>
                                        <input type="text" name="og_type" class="form-control form-control-sm"
                                            value="{{ old('og_type', $seoMeta->og_type) }}">
                                        @error('og_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>OG URL</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-link"></i></span>

                                            <input type="text" name="og_url" class="form-control form-control-sm"
                                                value="{{ old('og_url', $seoMeta->og_url) }}">
                                        </div>

                                        @error('og_url')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="og_image">Og Image</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            <input type="file" class="form-control up-img" name="og_image"
                                                id="og_image">
                                        </div>
                                        <img class="mw-400 mb-3 show-img img-demo" width="50"
                                            src="{{ asset('assets/admin/uploads/seo_metas/' . $seoMeta->og_image) }}"
                                            alt="">
                                        @error('og_image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- TWITTER --}}
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fab fa-twitter"></i> Twitter</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Twitter Card</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fab fa-twitter"></i></span>

                                            <input type="text" name="twitter_card"
                                                class="form-control form-control-sm"
                                                value="{{ old('twitter_card', $seoMeta->twitter_card) }}">
                                        </div>

                                        @error('twitter_card')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Twitter Title</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>

                                            <input type="text" name="twitter_title"
                                                class="form-control form-control-sm"
                                                value="{{ old('twitter_title', $seoMeta->twitter_title) }}">
                                        </div>

                                        @error('twitter_title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Twitter Description</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>

                                            <textarea name="twitter_description" class="form-control form-control-sm" rows="3">{{ old('twitter_description', $seoMeta->twitter_description) }}</textarea>
                                        </div>

                                        @error('twitter_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="twitter_image">Twitter Image</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            <input type="file" class="form-control up-img" name="twitter_image"
                                                id="twitter_image">
                                        </div>
                                        <img class="mw-400 mb-3 show-img img-demo" width="50"
                                            src="{{ asset('assets/admin/uploads/seo_metas/' . $seoMeta->twitter_image) }}"
                                            alt="">
                                        @error('twitter_image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- SCHEMA --}}
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-code"></i> Schema / JSON-LD</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Structured Data Type</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-database"></i></span>

                                            <input type="text" name="structured_data_type"
                                                class="form-control form-control-sm"
                                                value="{{ old('structured_data_type', $seoMeta->structured_data_type) }}">
                                        </div>

                                        @error('structured_data_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <label>Schema JSON</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>

                                            <textarea name="schema_json" class="form-control form-control-sm" rows="4">{{ old('schema_json', $seoMeta->schema_json) }}</textarea>
                                        </div>

                                        @error('schema_json')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CUSTOM CODES --}}
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-code"></i> Custom Codes</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Header Top</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>

                                            <textarea name="header_top" class="form-control form-control-sm" rows="3">{{ old('header_top', $seoMeta->header_top) }}</textarea>
                                        </div>

                                        @error('header_top')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Header Bottom</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>

                                            <textarea name="header_bottom" class="form-control form-control-sm" rows="3">{{ old('header_bottom', $seoMeta->header_bottom) }}</textarea>
                                        </div>

                                        @error('header_bottom')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Body Start</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>

                                            <textarea name="body_start" class="form-control form-control-sm" rows="3">{{ old('body_start', $seoMeta->body_start) }}</textarea>
                                        </div>

                                        @error('body_start')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Body End</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>

                                            <textarea name="body_end" class="form-control form-control-sm" rows="3">{{ old('body_end', $seoMeta->body_end) }}</textarea>
                                        </div>

                                        @error('body_end')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-code"></i> Custom CSS</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Custom CSS</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>

                                            <textarea name="custom_css" class="form-control form-control-sm" rows="3">{{ old('custom_css', $seoMeta->custom_css) }}</textarea>
                                        </div>

                                        @error('custom_css')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-code"></i> Custom JS</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Custom JS</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>

                                            <textarea name="custom_js" class="form-control form-control-sm" rows="3">{{ old('custom_js', $seoMeta->custom_js) }}</textarea>
                                        </div>

                                        @error('custom_js')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update SEO
                                Meta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
