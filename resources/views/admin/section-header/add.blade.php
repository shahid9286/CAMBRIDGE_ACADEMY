@extends('admin.layouts.master')
@section('title', 'Add Section Header')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            {{-- content --}}
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-1">{{ __('Section Header Add') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.section-header.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                                </div>
                                @if ($errors->has('title'))
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="subtitle">{{ __('SubTitle') }}</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle') }}">
                                </div>
                                @if ($errors->has('subtitle'))
                                    <p class="text-danger">{{ $errors->first('subtitle') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="use_for">{{ __('Use For') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-cog"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="use_for" name="use_for" value="{{ old('use_for') }}" required>
                                </div>
                                @if ($errors->has('use_for'))
                                    <p class="text-danger">{{ $errors->first('use_for') }}</p>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="d-block">{{ __('Editable') }} <span class="text-danger">*</span></label>
                                <input type="checkbox" name="is_editable" value="1" {{ old('is_editable', true) ? 'checked' : '' }}>
                                <span class="ml-2">Yes</span>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label class="d-block">{{ __('Deletable') }} <span class="text-danger">*</span></label>
                                <input type="checkbox" name="is_deleteable" value="1" {{ old('is_deleteable', true) ? 'checked' : '' }}>
                                <span class="ml-2">Yes</span>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="description" class="col-form-label col-form-label-sm">{{ __('Description') }}</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                    </div>
                                    <textarea class="form-control form-control-sm" id="description" name="description">{{ old('description') }}</textarea>
                                </div>
                                @if ($errors->has('description'))
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-sm btn-primary mt-3 float-right">
                                Submit
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
