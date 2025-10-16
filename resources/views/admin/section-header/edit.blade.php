@extends('admin.layouts.master')
@section('title',  'Edit Section Header')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            {{-- content --}}
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-1">{{ __('Section Header Edit') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.section-header.update', $section->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            {{-- Title --}}
                            <div class="col-md-6">
                                <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="title" name="title" 
                                           value="{{ old('title', $section->title) }}" required>
                                </div>
                                @if ($errors->has('title'))
                                    <p class="text-danger"> {{ $errors->first('title') }} </p>
                                @endif
                            </div>

                            {{-- SubTitle --}}
                            <div class="col-md-6">
                                <label for="subtitle">{{ __('SubTitle') }}</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-subscript"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" 
                                           value="{{ old('subtitle', $section->subtitle) }}">
                                </div>
                                @if ($errors->has('subtitle'))
                                    <p class="text-danger"> {{ $errors->first('subtitle') }} </p>
                                @endif
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="use_for">{{ __('Use For') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="use_for" name="use_for" 
                                           value="{{ old('use_for', $section->use_for) }}" required>
                                </div>
                                @if ($errors->has('use_for'))
                                    <p class="text-danger"> {{ $errors->first('use_for') }} </p>
                                @endif
                            </div>

                            {{-- Description --}}
                            <div class="col-md-12 mt-3">
                                <label for="description">{{ __('Description') }}</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="description" name="description" 
                                           value="{{ old('description', $section->description) }}">
                                </div>
                                @if ($errors->has('description'))
                                    <p class="text-danger"> {{ $errors->first('description') }} </p>
                                @endif
                            </div>

                            <div class="col-md-3 mt-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="is_editable" name="is_editable" value="1" 
                                           {{ $section->is_editable ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_editable">Editable</label>
                                </div>
                            </div>

                            <div class="col-md-3 mt-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="is_deleteable" name="is_deleteable" value="1" 
                                           {{ $section->is_deleteable ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_deleteable">Deletable</label>
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="col-12">
                                <button class="btn btn-sm btn-primary mt-3 float-right">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
