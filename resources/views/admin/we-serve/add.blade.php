@extends('admin.layouts.master')
@section('title',  ' Add We Serve')
@section('content')


<section class="content">
    <div class="row">
        <div class="col-md-12">
            {{-- content --}}
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-1">{{ __('Add We Serve') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.we-serve.store') }}" method="post" enctype="multipart/form-data">
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
                                <label for="subtitle">{{ __('Subtitle') }}</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-subscript"></i></span>
                                    </div>
                                    <input type="text" id="subtitle" class="form-control" name="subtitle"
                                        placeholder="Enter Subtitle" value="{{ old('subtitle') }}">
                                </div>
                                @error('subtitle')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-md-12 mb-3">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control" name="description" rows="3"
                                    placeholder="Enter Description">{{ old('description') }}</textarea>
                                @error('description')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Details Section -->
                            <div class="col-12">
                                <label>{{ __('Details') }}</label>
                                <div id="details-container"></div>
                                <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-detail">+ Add Detail</button>
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
    let detailIndex = 0;

    $('#add-detail').click(function() {
        $('#details-container').append(`
            <div class="row mb-3 detail-group border rounded p-2">
                <!-- Logo -->
                <div class="col-md-3 mb-3">
                    <label class="col-form-label-sm">Logo</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text p-1 px-2"><i class="fas fa-image"></i></span>
                        <input type="file" class="form-control form-control-sm" name="details[${detailIndex}][logo]" required>
                    </div>
                </div>
                <!-- Name -->
                <div class="col-md-7 mb-3">
                    <label class="col-form-label-sm">Name</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                        </div>
                        <input type="text" class="form-control" name="details[${detailIndex}][name]" placeholder="Enter Name" required>
                    </div>
                </div>
                <div class="col-md-2" style="margin-top: 35px;">
                    <button type="button" class="btn btn-danger btn-sm remove-detail">Remove</button>
                </div>
            </div>
        `);
        detailIndex++;
    });

    $(document).on('click', '.remove-detail', function() {
        $(this).closest('.detail-group').remove();
    });
</script>
@endsection
