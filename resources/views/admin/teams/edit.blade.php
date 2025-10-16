@extends('admin.layouts.master')
@section('title', 'Edit Team Member')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title text-primary"><i class="fas fa-edit"></i> Edit Team Member</h3>
                        </div>

                        <form action="{{ route('admin.teams.update', $team->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body py-3">
                                <div class="row">

                                    {{-- Name --}}
                                    <div class="col-md-6">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                                                                                                <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                        </div>

                                        <input type="text" id="name" name="name"
                                            class="form-control form-control-sm" value="{{ old('name', $team->name) }}"
                                            placeholder="{{ __('Enter Name') }}" required></div>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Designation --}}
                                    <div class="col-md-6">
                                        <label for="designation">Designation <span class="text-danger">*</span></label>
                                                                                                                <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-id-badge"></i></span>
                                        </div>

                                        <input type="text" id="designation" name="designation"
                                            class="form-control form-control-sm"
                                            value="{{ old('designation', $team->designation) }}"
                                            placeholder="{{ __('Enter Designation') }}" required></div>
                                        @error('designation')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{-- Order No --}}
                                    <div class="col-md-6 mt-2">
                                        <label for="order_no">Order No</label>
                                                                                                                <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-sort-numeric-up"></i></span>
                                        </div>

                                        <input type="number" name="order_no" id="order_no"
                                            class="form-control form-control-sm"
                                            value="{{ old('order_no', $team->order_no) }}" min="0"></div>
                                        @error('order_no')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-6 mt-2">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                                                                                                <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                                        </div>

                                        <select name="status" id="status" class="form-control form-control-sm" required>
                                            <option value="active"
                                                {{ old('status', $team->status) == 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="inactive"
                                                {{ old('status', $team->status) == 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select></div>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{-- Photo --}}
                                <div class="col-md-12 mt-2">
                                    <label for="photo">{{ __(' Photo') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>

                                        <input type="file" name="photo" id="photo"
                                            class="form-control form-control-sm up-img">
                                    </div>

                                    <img class="mw-400 mb-3 show-img img-demo mt-1" src="{{ asset($team->photo) }}"
                                        alt="" width="50px">

                                    @if ($errors->has('photo'))
                                        <p class="text-danger"> {{ $errors->first('photo') }} </p>
                                    @endif

                                </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                 Update
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
