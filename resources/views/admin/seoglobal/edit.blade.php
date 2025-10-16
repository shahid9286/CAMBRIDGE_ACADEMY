@extends('admin.layouts.master')
@section('title', 'SeoGlobal Settings')
@section('content')
    <section class="content">
        <div class="container-fluid py-2">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h4 class="mb-0">Global Settings</h4>
                <ol class="breadcrumb mb-0" style="background-color: transparent !important;">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}" style="color: black;">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" style="color:black">Global Settings</li>
                </ol>
            </div>

            <form action="{{ route('admin.seoglobal.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Identity Card --}}
                <div class="card mb-4 card-primary card-outline mt-3">
                    <div class="card-header">
                        <i class="fas fa-id-card me-1"></i> Identity
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="site_name" class="form-label">Site Name</label>
                            <input type="text" name="site_name" id="site_name" class="form-control"
                                placeholder="Enter your site name" value="{{ old('site_name', $seoGlobal->site_name) }}">
                            @error('site_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="default_meta_title" class="form-label">Default Meta Title</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                <input type="text" name="default_meta_title" id="default_meta_title" class="form-control"
                                    placeholder="Enter default meta title"
                                    value="{{ old('default_meta_title', $seoGlobal->default_meta_title) }}">
                            </div>
                            @error('default_meta_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="default_meta_description" class="form-label">Default Meta
                                Description</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                <textarea name="default_meta_description" id="default_meta_description" rows="3" class="form-control"
                                    placeholder="Enter default meta description">{{ old('default_meta_description', $seoGlobal->default_meta_description) }}</textarea>
                            </div>
                            @error('default_meta_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="default_meta_keywords" class="form-label">Default Meta Keywords</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <input type="text" name="default_meta_keywords" id="default_meta_keywords"
                                    class="form-control" placeholder="Enter default meta keywords"
                                    value="{{ old('default_meta_keywords', $seoGlobal->default_meta_keywords) }}">
                            </div>
                            @error('default_meta_keywords')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="default_meta_image" class="form-label">Default Meta Image</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                <input type="file" name="default_meta_image" id="default_meta_image"
                                    class="form-control">
                            </div>
                            @error('default_meta_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if ($seoGlobal->default_meta_image)
                                <div class="mt-2">
                                    <img src="{{ asset('assets/images/seo/' . $seoGlobal->default_meta_image) }}"
                                        alt="Meta Image" width="100" class="img-thumbnail">
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                {{-- Canonical & Robots --}}
                <div class="card mb-4 card-primary card-outline mt-3">
                    <div class="card-header">
                        <i class="fas fa-robot me-1"></i> Canonical & Robots
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="global_canonical" class="form-label">Global Canonical</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                <input type="text" name="global_canonical" id="global_canonical" class="form-control"
                                    placeholder="Enter global canonical URL"
                                    value="{{ old('global_canonical', $seoGlobal->global_canonical) }}">
                            </div>
                            @error('global_canonical')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="robots_default" class="form-label">Robots Default</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-robot"></i></span>
                                <input type="text" name="robots_default" id="robots_default" class="form-control"
                                    placeholder="Enter robots default value"
                                    value="{{ old('robots_default', $seoGlobal->robots_default) }}">
                            </div>
                            @error('robots_default')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="robots_txt" class="form-label">Robots.txt</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-file-code"></i></span>
                                <textarea name="robots_txt" id="robots_txt" rows="4" class="form-control"
                                    placeholder="Enter robots.txt content">{{ old('robots_txt', $seoGlobal->robots_txt) }}</textarea>
                            </div>
                            @error('robots_txt')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Webmaster Tools --}}
                <div class="card mb-4 card-primary card-outline mt-3">
                    <div class="card-header">
                        <i class="fas fa-tools me-1"></i> Webmaster Tools
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="google_site_verification" class="form-label">Google Site
                                Verification</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-google"></i></span>
                                <input type="text" name="google_site_verification" id="google_site_verification"
                                    class="form-control" placeholder="Enter Google verification code"
                                    value="{{ old('google_site_verification', $seoGlobal->google_site_verification) }}">
                            </div>
                            @error('google_site_verification')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bing_site_verification" class="form-label">Bing Site
                                Verification</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-microsoft"></i></span>
                                <input type="text" name="bing_site_verification" id="bing_site_verification"
                                    class="form-control" placeholder="Enter Bing verification code"
                                    value="{{ old('bing_site_verification', $seoGlobal->bing_site_verification) }}">
                            </div>
                            @error('bing_site_verification')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Sitemap --}}
                <div class="card mb-4 card-primary card-outline mt-3">
                    <div class="card-header">
                        <i class="fas fa-sitemap me-1"></i> Sitemap
                    </div>
                    <div class="card-body">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="sitemap_enabled" id="sitemap_enabled"
                                {{ old('sitemap_enabled', $seoGlobal->sitemap_enabled) ? 'checked' : '' }}>
                            <label for="sitemap_enabled" class="form-check-label">Enable Sitemap</label>
                            @error('sitemap_enabled')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                           <label for="sitemap_urls" class="form-label">Sitemap URLs</label>
                            <textarea name="sitemap_urls" id="sitemap_urls" rows="3" class="form-control"placeholder="Enter sitemap URLs (comma separated)">{{ old('sitemap_urls', $seoGlobal->sitemap_urls ? implode(',', json_decode($seoGlobal->sitemap_urls, true)) : '') }}</textarea>
                           @error('sitemap_urls')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror
                           </div>

                    </div>
                </div>

                {{-- Tracking --}}
                <div class="card mb-4 card-primary card-outline mt-3">
                    <div class="card-header">
                        <i class="fas fa-chart-line me-1"></i> Tracking
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="google_analytics_id" class="form-label">Google Analytics ID</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-google"></i></span>
                                <input type="text" name="google_analytics_id" id="google_analytics_id"
                                    class="form-control" placeholder="UA-XXXXXX-X"
                                    value="{{ old('google_analytics_id', $seoGlobal->google_analytics_id) }}">
                            </div>
                            @error('google_analytics_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="google_tag_manager_id" class="form-label">Google Tag Manager
                                ID</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                <input type="text" name="google_tag_manager_id" id="google_tag_manager_id"
                                    class="form-control" placeholder="GTM-XXXXXX"
                                    value="{{ old('google_tag_manager_id', $seoGlobal->google_tag_manager_id) }}">
                            </div>
                            @error('google_tag_manager_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="facebook_pixel_id" class="form-label">Facebook Pixel ID</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                <input type="text" name="facebook_pixel_id" id="facebook_pixel_id"
                                    class="form-control" placeholder="Enter Facebook Pixel ID"
                                    value="{{ old('facebook_pixel_id', $seoGlobal->facebook_pixel_id) }}">
                            </div>
                            @error('facebook_pixel_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="other_tracking_scripts" class="form-label">Other Tracking
                                Scripts</label>
                            <textarea name="other_tracking_scripts" id="other_tracking_scripts" rows="4" class="form-control"
                                placeholder="Paste other tracking scripts here">{{ old('other_tracking_scripts', $seoGlobal->other_tracking_scripts) }}</textarea>
                            @error('other_tracking_scripts')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Social Defaults --}}
                <div class="card mb-4 card-primary card-outline mt-3">
                    <div class="card-header">
                        <i class="fas fa-share-alt me-1"></i> Social Defaults
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="default_og_type" class="form-label">Default OG Type</label>
                            <input type="text" name="default_og_type" id="default_og_type" class="form-control"
                                placeholder="e.g. website, article"
                                value="{{ old('default_og_type', $seoGlobal->default_og_type) }}">
                            @error('default_og_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="default_twitter_card" class="form-label">Default Twitter Card</label>
                            <input type="text" name="default_twitter_card" id="default_twitter_card"
                                class="form-control" placeholder="e.g. summary_large_image"
                                value="{{ old('default_twitter_card', $seoGlobal->default_twitter_card) }}">
                            @error('default_twitter_card')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Structured Data --}}
                <div class="card mb-4 card-primary card-outline mt-3">
                    <div class="card-header">
                        <i class="fas fa-code me-1"></i> Structured Data
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="structured_data_global" class="form-label">Global Structured Data
                                (JSON-LD)</label>
                            <textarea name="structured_data_global" id="structured_data_global" rows="5" class="form-control"
                                placeholder="Paste your structured data (JSON-LD)">{{ old('structured_data_global', $seoGlobal->structured_data_global) }}</textarea>
                            @error('structured_data_global')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Global Scripts --}}
                <div class="card mb-4 card-primary card-outline mt-3">
                    <div class="card-header">
                        <i class="fas fa-file-code me-1"></i> Global Scripts
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="global_header_scripts" class="form-label">Header Scripts</label>
                            <textarea name="global_header_scripts" id="global_header_scripts" rows="4" class="form-control"
                                placeholder="Scripts to include in the <head>">{{ old('global_header_scripts', $seoGlobal->global_header_scripts) }}</textarea>
                            @error('global_header_scripts')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="global_body_end_scripts" class="form-label">Body End Scripts</label>
                            <textarea name="global_body_end_scripts" id="global_body_end_scripts" rows="4" class="form-control"
                                placeholder="Scripts to include before </body>">{{ old('global_body_end_scripts', $seoGlobal->global_body_end_scripts) }}</textarea>
                            @error('global_body_end_scripts')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Settings
                    </button>
                </div>

            </form>
        </div>
    </section>
@endsection
