@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Info Section')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Info Section Add') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.info-section.store', ['slug' => $slug]) }}" method="post"
                            enctype="multipart/form-data">
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
                                            placeholder="Enter Title" value="{{ old('title') }}" required>
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
                                            placeholder="Enter Subtitle" required value="{{ old('subtitle') }}">
                                    </div>
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label for="description">{{ __('Description') }}<span
                                            class="text-danger">*</span></label>
                                    <textarea id="description" class="form-control summernote" name="description" rows="3"
                                        placeholder="Enter Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Image1 -->
                                <div class="col-12 mb-3">
                                    <label class="col-form-label col-form-label-sm" for="image1">{{ __('Image') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text p-1 px-2"><i class="fas fa-image"></i></span>
                                        <input type="file" class="form-control form-control-sm up-img" name="image1"
                                            id="image1" required>
                                    </div>
                                    <img class="mw-400 show-img img-demo mt-2"
                                        src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="120px">
                                    @error('image1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <a href="#" class="btn btn-sm btn-info mb-3 checkBtn">Show More <i
                                            class="checkBtnIcon bi bi-check"></i></a>
                                </div>

                                <div class="col-12 otherInfo d-none">
                                    <div class="row">
                                        <!-- Image2 -->
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label col-form-label-sm"
                                                for="image2">{{ __('Image 2') }}</label>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text p-1 px-2"><i class="fas fa-image"></i></span>
                                                <input type="file" class="form-control form-control-sm up-img"
                                                    name="image2" id="image2">
                                            </div>
                                            <img class="mw-400 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                width="120px">
                                            @error('image2')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Image3 -->
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label col-form-label-sm"
                                                for="image3">{{ __('Image 3') }}</label>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text p-1 px-2"><i class="fas fa-image"></i></span>
                                                <input type="file" class="form-control form-control-sm up-img"
                                                    name="image3" id="image3">
                                            </div>
                                            <img class="mw-400 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                width="120px">
                                            @error('image3')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Description 2 -->
                                        <div class="col-md-12 mb-3">
                                            <label for="description2">{{ __('Description 2') }}</label>
                                            <textarea id="description2" class="form-control summernote" name="description2" rows="3"
                                                placeholder="Enter Description 2">{{ old('description2') }}</textarea>
                                            @error('description2')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Text1 -->
<!-- Text1 -->
<div class="col-md-4 mb-3">
    <label for="text1">{{ __('Text 1') }}</label>
    <div class="input-group input-group-sm">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-font"></i></span>
        </div>
        <input type="text" class="form-control" name="text1" value="{{ old('text1') }}"
            placeholder="Enter Text 1">
    </div>
    @error('text1')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<!-- Text2 -->
<div class="col-md-4 mb-3">
    <label for="text2">{{ __('Text 2') }}</label>
    <div class="input-group input-group-sm">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-font"></i></span>
        </div>
        <input type="text" class="form-control" name="text2" value="{{ old('text2') }}"
            placeholder="Enter Text 2">
    </div>
    @error('text2')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<!-- Text3 -->
<div class="col-md-4 mb-3">
    <label for="text3">{{ __('Text 3') }}</label>
    <div class="input-group input-group-sm">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-font"></i></span>
        </div>
        <input type="text" class="form-control" name="text3" value="{{ old('text3') }}"
            placeholder="Enter Text 3">
    </div>
    @error('text3')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

                                        <!-- Features -->
                                        <div class="col-md-12 mb-3">
                                            <label>{{ __('Features') }}</label>
                                            <div id="features-container">

                                            </div>
                                            <button type="button" class="btn btn-secondary btn-sm" id="add-feature">Add
                                                Feature</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-primary float-right mt-3">Submit</button>
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
        $('.checkBtn').click(function() {
            $(this).toggleClass('btn-info').toggleClass('btn-warning');
            $('.checkBtnIcon').toggleClass('bi-check').toggleClass('bi-x');
            $('.otherInfo').toggleClass('d-none');
        });
    </script>
    <script>
        let featureIndex = 0;

        $('#add-feature').click(function() {
            $('#features-container').append(`
            <div class="row mb-3 feature-group border rounded p-2">
                                                    <!-- Image1 -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="input-group input-group-sm">
                                                            <span class="input-group-text p-1 px-2"><i
                                                                    class="fas fa-image"></i></span>
                                                            <input type="file"
                                                                class="form-control form-control-sm up-img" name="features[${featureIndex}][icon]" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-heading"></i></span>
                                                            </div>
                                                            <input type="text" name="features[${featureIndex}][title]"
                                                                class="form-control" placeholder="Enter Title" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-align-left"></i></span>
                                                            </div>
                                                            <input type="text" name="features[${featureIndex}][description]"
                                                                class="form-control" placeholder="Enter Description">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-end">
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm remove-feature">Remove</button>
                                                    </div>
                                                </div>
        `);
            featureIndex++;
        });

        $(document).on('click', '.remove-feature', function() {
            $(this).closest('.feature-group').remove();
        });
    </script>
@endsection
