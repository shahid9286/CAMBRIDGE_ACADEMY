@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add FAQ')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('FAQ Add') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.faq.store', ['slug' => $slug]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
<div class="row">
    <div class="col-md-6">
        <label for="faqQuestion">{{ __('Question ') }} <span class="text-danger">*</span></label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-question-circle"></i></span>
            </div>
            <textarea required class="form-control form-control-sm" id="faqQuestion" name="question" placeholder="Write Question" rows="3"></textarea>
        </div>
        @error('question')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="faqAnswer">{{ __('Answer') }} <span class="text-danger">*</span></label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-reply"></i></span>
            </div>
            <textarea required class="form-control form-control-sm" id="faqAnswer" name="answer" placeholder="Give Answer" rows="3"></textarea>
        </div>
        @error('answer')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

                            <div class="row mt-3">
    <div class="col-md-6">
        <label for="faqOrderNo">{{ __('Order Number') }} <span class="text-danger">*</span></label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
            </div>
            <input required type="number" class="form-control form-control-sm" id="faqOrderNo" placeholder="Enter Order Number" name="order_no">
        </div>
        @error('order_no')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="faqStatus">{{ __('Status') }} <span class="text-danger">*</span></label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
            </div>
            <select required class="form-control form-control-sm" id="faqStatus" name="status">
                <option value="active">{{ __('Active') }}</option>
                <option value="inactive">{{ __('Inactive') }}</option>
            </select>
        </div>
        @error('status')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

                            <div class="row">

                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-sm float-right">Submit</button>
                                </div>
                            </div>


                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
