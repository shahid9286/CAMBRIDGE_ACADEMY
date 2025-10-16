@extends('admin.layouts.master')
@section('title', 'Add SEO Meta')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add SEO Meta</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">SEO Meta</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <form class="form-horizontal" action="{{ route('admin.seo.meta.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- PAGE INFO --}}
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-file-alt"></i> Page Information</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.seo.meta.index') }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-angle-double-left"></i> Back</a>
                                </div>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Page Slug</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            <input type="text" name="page_slug" class="form-control"
                                                value="{{ old('page_slug') }}">
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
                                                value="{{ old('page_id') }}">
                                        </div>
                                        @error('page_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="is_global">{{ __('Is Global') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="fas fa-toggle-on"></i></span></div>
                                            <select id="is_global" name="is_global" class="form-control form-control-sm">
                                                <option value="global" {{ old('is_global') == 'global' ? 'selected' : '' }}>
                                                    Global</option>
                                                <option value="local" {{ old('is_global') == 'local' ? 'selected' : '' }}>
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
                                                value="{{ old('priority', 0) }}">
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
                                                value="{{ old('meta_title') }}">
                                        </div>
                                        @error('meta_title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Meta Description</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            <textarea name="meta_description" class="form-control form-control-sm" rows="3">{{ old('meta_description') }}</textarea>
                                        </div>
                                        @error('meta_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            <input type="text" class="form-control form-control-sm" data-role="tagsinput"
                                                name="meta_keywords" placeholder="{{ __('Meta Keywords') }}"
                                                value="{{ old('meta_keywords', $data->meta_keywords ?? '') }}">
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
                                                value="{{ old('canonical_url') }}">
                                        </div>
                                        @error('canonical_url')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <label>Robots Tag</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-robot"></i></span>
                                        <input type="text" name="robots_tag" class="form-control form-control-sm"
                                            value="{{ old('robots_tag') }}">
                                    </div>
                                    @error('robots_tag')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="col-md-12 mb-3">
                                        <label>Meta Author</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" name="meta_author" class="form-control form-control-sm"
                                                value="{{ old('meta_author') }}">
                                        </div>
                                        @error('meta_author')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Meta Type</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                                            <input type="text" name="meta_type" class="form-control form-control-sm"
                                                value="{{ old('meta_type') }}">
                                        </div>
                                        @error('meta_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="meta_image">{{ __(' Meta Image') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img"
                                                name="meta_image" id="meta_image">
                                        </div>
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/uploads/seo_metas/default.png') }}"
                                            alt="" width="50">
                                        @if ($errors->has('meta_image'))
                                            <p class="text-danger">{{ $errors->first('meta_image') }}</p>
                                        @endif
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
                                            <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                                            <input type="text" name="og_title" class="form-control form-control-sm"
                                                value="{{ old('og_title') }}">
                                        </div>
                                        @error('og_title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>OG Description</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            <textarea name="og_description" class="form-control form-control-sm" rows="3">{{ old('og_description') }}</textarea>
                                        </div>
                                        @error('og_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>OG Type</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                                            <input type="text" name="og_type" class="form-control form-control-sm"
                                                value="{{ old('og_type') }}">
                                        </div>
                                        @error('og_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>OG URL</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            <input type="text" name="og_url" class="form-control form-control-sm"
                                                value="{{ old('og_url') }}">
                                        </div>
                                        @error('og_url')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="og_image">
                                            {{ __(' Og Image') }}
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img"
                                                name="og_image" id="og_image">
                                        </div>
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/uploads/seo_metas/') }}" alt=""
                                            width="50px">

                                        @if ($errors->has('og_image'))
                                            <p class="text-danger">{{ $errors->first('og_image') }}</p>
                                        @endif
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
                                            <span class="input-group-text"><i class="fab fa-twitter-square"></i></span>
                                            <input type="text" name="twitter_card"
                                                class="form-control form-control-sm" value="{{ old('twitter_card') }}">
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
                                                class="form-control form-control-sm" value="{{ old('twitter_title') }}">
                                        </div>
                                        @error('twitter_title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Twitter Description</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            <textarea name="twitter_description" class="form-control form-control-sm" rows="3">{{ old('twitter_description') }}</textarea>
                                        </div>
                                        @error('twitter_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="twitter_image">
                                            {{ __(' Twitter Image') }}
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img"
                                                name="twitter_image" id="twitter_image">
                                        </div>
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/uploads/seo_metas/') }}" alt=""
                                            width="50px">

                                        @if ($errors->has('twitter_image'))
                                            <p class="text-danger">{{ $errors->first('twitter_image') }}</p>
                                        @endif
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
                                                value="{{ old('structured_data_type') }}">
                                        </div>
                                        @error('structured_data_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Schema JSON</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                                            <textarea name="schema_json" class="form-control form-control-sm" rows="4">{{ old('schema_json') }}</textarea>
                                        </div>
                                        @error('schema_json')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CUSTOM CSS --}}
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-code"></i> Custom Codes</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Header Top</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            <textarea name="header_top" class="form-control form-control-sm" rows="3">{{ old('header_top') }}</textarea>
                                        </div>
                                        @error('header_top')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Header Bottom</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                            <textarea name="header_bottom" class="form-control form-control-sm" rows="3">{{ old('header_bottom') }}</textarea>
                                        </div>
                                        @error('header_bottom')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Body Start</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-play"></i></span>
                                            <textarea name="body_start" class="form-control form-control-sm" rows="3">{{ old('body_start') }}</textarea>
                                        </div>
                                        @error('body_start')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>Body End</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>

                                            <textarea name="body_end" class="form-control form-control-sm" rows="3">{{ old('body_end') }}</textarea>
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

                                            <textarea name="custom_css" class="form-control form-control-sm" rows="3">{{ old('custom_css') }}</textarea>
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

                                            <textarea name="custom_js" class="form-control form-control-sm" rows="3">{{ old('custom_js') }}</textarea>
                                        </div>

                                        @error('custom_js')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Add SEO
                            Meta</button>
                </div>

                </form>

            </div>
        </div>
        </div>
    </section>
@endsection
