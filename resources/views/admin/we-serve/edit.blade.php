@extends('admin.layouts.master')
@section('title', '  Edit We Serve')
@section('content')


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-1">{{ __('Edit We Serve') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.we-serve.update', $we_serves->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Title -->
                            <div class="col-md-6 mb-3">
                                <label for="title">{{ __('Title') }}<span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    </div>
                                    <input type="text" id="title" class="form-control" name="title"
                                        placeholder="Enter Title" value="{{ old('title', $we_serves->title) }}" required>
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
                                        placeholder="Enter Subtitle" value="{{ old('subtitle', $we_serves->subtitle) }}">
                                </div>
                                @error('subtitle')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-md-12 mb-3">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control" name="description" rows="3"
                                    placeholder="Enter Description">{{ old('description', $we_serves->description) }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Details Section -->
                            <div class="col-12">
                                <label>{{ __('Details') }}</label>
                                <div id="details-container">
                                    @foreach($we_serves->details as $index => $detail)
                                    <div class="row mb-3 detail-group border rounded p-2">
                                        <input type="hidden" name="details[{{ $index }}][id]" value="{{ $detail->id }}">
                                        <!-- Logo -->
                                        <div class="col-md-3 mb-3">
                                            <label class="col-form-label-sm">Logo</label>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text p-1 px-2"><i class="fas fa-image"></i></span>
                                                <input type="file" class="form-control form-control-sm" name="details[{{ $index }}][logo]">
                                            </div>
                                            @if($detail->logo)
                                                <img src="{{ asset('assets/admin/uploads/we_serves_details/'.$detail->logo) }}" class="img-thumbnail mt-1" width="50px">
                                            @endif
                                        </div>
                                        <!-- Name -->
                                        <div class="col-md-7 mb-3">
                                            <label class="col-form-label-sm">Name</label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="details[{{ $index }}][name]" value="{{ $detail->name }}" placeholder="Enter Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 35px;">
                                            <button type="button" class="btn btn-danger btn-sm remove-detail">Remove</button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-detail">+ Add Detail</button>
                            </div>

                            <!-- Submit -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary float-right mt-3">Update</button>
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
    let detailIndex = {{ $we_serves->details->count() }};

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
