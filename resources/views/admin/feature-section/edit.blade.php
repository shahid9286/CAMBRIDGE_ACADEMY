@extends('admin.layouts.master')
@section('title', 'Edit Feature Section')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            {{-- content --}}
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-1">{{ __('Edit Feature Section') }}</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.feature.section.update', $section->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                    

                        <div class="row">
                            <!-- Title -->
                            <div class="col-md-6 mb-3">
                                <label for="title">{{ __('Title') }}<span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    </div>
                                    <input type="text" id="title" class="form-control" name="title"
                                        placeholder="Enter Title" value="{{ old('title', $section->title) }}" required>
                                </div>
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Subtitle -->
                            <div class="col-md-6 mb-3">
                                <label for="subtitle">{{ __('Subtitle') }}<span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-subscript"></i></span>
                                    </div>
                                    <input type="text" id="subtitle" class="form-control" name="subtitle"
                                        placeholder="Enter Subtitle"
                                        value="{{ old('subtitle', $section->subtitle) }}" required>
                                </div>
                                @error('subtitle')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-md-12 mb-3">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control summernote" name="description" rows="3"
                                    placeholder="Enter Description">{{ old('description', $section->description) }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="col-md-12 mt-3">
                                <label for="image">Image</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    </div>
                                    <input type="file" class="form-control form-control-sm up-img" name="image" id="image">
                                </div>
                                @if ($section->image)
                                    <img class="mw-400 mt-2 show-img img-demo"
                                        src="{{ asset('assets/admin/uploads/feature-section/' . $section->image) }}"
                                        alt="" width="50px">
                                @endif
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Features -->
                            <div class="col-12 mt-4">
                                <label>{{ __('Features') }}</label>
                                <div id="features-container">
                                    {{-- If validation failed, load old input --}}
                                    @if(old('features'))
                                        @foreach(old('features') as $i => $feature)
                                            <div class="row mb-3 feature-group border rounded p-2">
                                                <input type="hidden" name="features[{{ $i }}][id]" value="{{ $feature['id'] ?? '' }}">
                                                <div class="col-md-3 mb-3">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text p-1 px-2"><i class="fas fa-image"></i></span>
                                                        <input type="file" class="form-control form-control-sm" name="features[{{ $i }}][icon]">
                                                    </div>
                                                    @if (!empty($feature['old_icon']))
                                                        <img src="{{ asset('assets/admin/uploads/feature-details/' . $feature['old_icon']) }}" width="50" class="mt-2">
                                                    @endif
                                                    @error("features.$i.icon")
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                                        </div>
                                                        <input type="text" name="features[{{ $i }}][title]" class="form-control"
                                                            placeholder="Enter Title" value="{{ $feature['title'] ?? '' }}">
                                                    </div>
                                                    @error("features.$i.title")
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                                        </div>
                                                        <input type="text" name="features[{{ $i }}][description]" class="form-control"
                                                            placeholder="Enter Description" value="{{ $feature['description'] ?? '' }}">
                                                    </div>
                                                    @error("features.$i.description")
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 text-end">
                                                    <button type="button" class="btn btn-danger btn-sm remove-feature">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        {{-- Show existing DB features --}}
                                        @foreach ($section->details as $index => $feature)
                                            <div class="row mb-3 feature-group border rounded p-2">
                                                <input type="hidden" name="features[{{ $index }}][id]" value="{{ $feature->id }}">
                                                <div class="col-md-3 mb-3">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text p-1 px-2"><i class="fas fa-image"></i></span>
                                                        <input type="file" class="form-control form-control-sm" name="features[{{ $index }}][icon]">
                                                    </div>
                                                    @if ($feature->icon)
                                                        <img src="{{ asset('assets/admin/uploads/feature-details/' . $feature->icon) }}" width="50" class="mt-2">
                                                    @endif
                                                    <input type="hidden" name="features[{{ $index }}][old_icon]" value="{{ $feature->icon }}">
                                                    @error("features.$index.icon")
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                                        </div>
                                                        <input type="text" name="features[{{ $index }}][title]" class="form-control"
                                                            value="{{ $feature->title }}" placeholder="Enter Title">
                                                    </div>
                                                    @error("features.$index.title")
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                                        </div>
                                                        <input type="text" name="features[{{ $index }}][description]" class="form-control"
                                                            value="{{ $feature->description }}" placeholder="Enter Description">
                                                    </div>
                                                    @error("features.$index.description")
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 text-end">
                                                    <button type="button" class="btn btn-danger btn-sm remove-feature">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-feature">Add Detail</button>
                            </div>

                            <!-- Submit -->
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-sm btn-primary float-right">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    // Set initial index based on old() or DB count
    let featureIndex = {{ old('features') ? count(old('features')) : count($section->details) }};

    // Add new feature dynamically
    $('#add-feature').click(function() {
        $('#features-container').append(`
            <div class="row mb-3 feature-group border rounded p-2">
                <div class="col-md-3 mb-3">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text p-1 px-2"><i class="fas fa-image"></i></span>
                        <input type="file" class="form-control form-control-sm up-img" name="features[${featureIndex}][icon]">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                        </div>
                        <input type="text" name="features[${featureIndex}][title]" class="form-control" placeholder="Enter Title">
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" name="features[${featureIndex}][description]" class="form-control" placeholder="Enter Description">
                    </div>
                </div>

                <div class="col-md-12 text-end">
                    <button type="button" class="btn btn-danger btn-sm remove-feature">Remove</button>
                </div>
            </div>
        `);
        featureIndex++;
    });

    // Remove feature group dynamically
    $(document).on('click', '.remove-feature', function() {
        $(this).closest('.feature-group').remove();
    });
</script>
@endsection
