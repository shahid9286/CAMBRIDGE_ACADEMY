@extends('admin.layouts.master')
@section('title', 'Add Team Member')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title text-primary"><i class="fas fa-plus-circle"></i> Add New Team Member</h3>
                        </div>

                        <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body py-3">
                                <div class="row">

                                    {{-- Name --}}
                                    <div class="col-md-6 mb-3">

                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            </div>

                                            <input type="text" id="name" name="name"
                                                class="form-control form-control-sm" value="{{ old('name') }}"
                                                placeholder="{{ __('Enter Name') }}" required>
                                        </div>
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Designation --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="designation">Designation <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-id-badge"></i></span>
                                            </div>

                                            <input type="text" name="designation" id="designation"
                                                class="form-control form-control-sm" value="{{ old('designation') }}"
                                                placeholder="{{ __('Enter Designation') }}" required>
                                        </div>
                                        @error('designation')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    {{-- Order No --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="order_no">Order No <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-sort-numeric-up"></i></span>
                                            </div>

                                            <input type="number" name="order_no" id="order_no"
                                                class="form-control form-control-sm" value="{{ old('order_no', 1) }}"
                                                required>
                                        </div>
                                        @error('order_no')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                                            </div>

                                            <select name="status" id="status" class="form-control form-control-sm"
                                                required>
                                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="inactive"
                                                    {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                        </div>
                                        @error('status')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    {{-- Photo --}}
                                    <div class="col-md-12 mt-2">
                                        <label for="photo">
                                            {{ __('Photo') }}
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text p-1 px-2"><i class="fas fa-icons"></i></span>
                                            <input type="file" class="form-control form-control-sm up-img" name="photo"
                                                id="photo">
                                        </div>
                                        <img class="mw-400 mt-1 show-img img-demo"
                                            src="{{ asset('assets/uploads/core/img-demo.jpg') }}" alt=""
                                            width="50px">
                                        @if ($errors->has('photo'))
                                            <p class="text-danger">{{ $errors->first('photo') }}</p>
                                        @endif
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary ">
                                    Save
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
