@extends('admin.layouts.master')
@section('title', 'Edit Client')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Client Section') }} </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                    class="fas fa-home"></i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Client Section') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header  with-border">
                            <h3 class="card-title mt-1">{{ __('Edit Client') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.client.index') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('admin.client.update', $client->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 control-label">{{ __('image') }}</label>

                                    <div class="col-sm-10">
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/img/client/'.$client->image) }}" alt="" width="50px">

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img" name="image"
                                                id="image">
                                        </div>
                                        <p class="help-block text-info">
                                            {{ __('Upload 70X70 (Pixel) Size image for best quality.
                                                                                                                                            Only jpg, jpeg, png image is allowed.') }}
                                        </p>


                                        @if ($errors->has('image'))
                                            <p class="text-danger">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 control-label">{{ __('Name') }}</label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>


                                            <input type="text" class="form-control form-control-sm" name="name"
                                                placeholder="{{ __('Name') }}" value="{{ $client->name }}">
                                        </div>
                                        @if ($errors->has('name'))
                                            <p class="text-danger"> {{ $errors->first('name') }} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="value" class="col-sm-2 control-label">{{ __('Link') }}</label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            </div>


                                            <input type="text" class="form-control form-control-sm" name="link"
                                                placeholder="{{ __('Link') }}" value="{{ $client->link }}">
                                        </div>
                                        @if ($errors->has('link'))
                                            <p class="text-danger"> {{ $errors->first('link') }} </p>
                                        @endif
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="value" class="col-sm-2 control-label">{{ __('Serial No') }}<span
                                            class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-sort-numeric-up"></i></span>
                                            </div>


                                            <input type="number" class="form-control form-control-sm" name="serial_number"
                                                placeholder="{{ __('Serial No') }}" value="{{ $client->serial_number }}">
                                        </div>
                                        @if ($errors->has('serial_number'))
                                            <p class="text-danger"> {{ $errors->first('serial_number') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 control-label">{{ __('Status') }}</label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                                            </div>


                                            <select class="form-control form-control-sm" name="status">
                                                <option value="0" {{ $client->status == '0' ? 'selected' : '' }}>
                                                    {{ __('Unpublish') }}</option>
                                                <option value="1" {{ $client->status == '1' ? 'selected' : '' }}>
                                                    {{ __('Publish') }}</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('status'))
                                            <p class="text-danger"> {{ $errors->first('status') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>
@endsection
