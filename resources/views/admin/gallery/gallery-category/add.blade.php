@extends('admin.layouts.master')

@section('title', 'Add Gallery Category')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Add Gallery Category') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.gcategory.index') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('admin.gcategory.store') }}" method="POST">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 control-label">
                                        {{ __('Name') }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            </div>

                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                                        </div>
                                        @if ($errors->has('name'))
                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="serial_number" class="col-sm-2 control-label">
                                        {{ __('Order') }}<span class="text-danger">*</span>
                                    </label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-sort-numeric-up"></i>
                                                </span>
                                            </div>

                                            <input type="number" class="form-control" name="serial_number" id="serial_number"
                                                placeholder="{{ __('Order') }}" value="{{ old('serial_number', 0) }}">
                                        </div>
                                        @if ($errors->has('serial_number'))
                                            <p class="text-danger">{{ $errors->first('serial_number') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 control-label">
                                        {{ __('Status') }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-eye"></i></span>
                                            </div>

                                            <select class="form-control" name="status" id="status">
                                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                                    {{ __('Unpublish') }}</option>
                                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                                    {{ __('Publish') }}</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('status'))
                                            <p class="text-danger">{{ $errors->first('status') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
