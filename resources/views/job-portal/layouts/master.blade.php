<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('jobportal/assets/imgs/template/favicon.svg') }}">
    <link href="{{ asset('jobportal/assets/css/style.css?version=4.1') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body>

    <div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content apply-job-form">
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body pl-30 pr-30 pt-50">
                    <div class="text-center">
                        <p class="font-sm text-brand-2">Job Application </p>
                        <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Start your career today</h2>
                        <p class="font-sm text-muted mb-30">Please fill in your information and send it to the employer.
                        </p>
                    </div>
                    <form id="applyJobForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="job_id" id="job_id">
                        <div class="form-group">
                            <label>Full Name *</label>
                            <input type="text" class="form-control" name="fullname" required>
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Contact Number *</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Upload Resume</label>
                            <input type="file" class="form-control" name="resume">
                        </div>
                        <div class="form-group text-center">
                            <div id="loadingSpinner" class="spinner-border text-primary d-none" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-default hover-up w-100">Apply Job</button>
                        </div>
                    </form>
                    <div id="formMessage" class="mt-2"></div>

                </div>
            </div>
        </div>
    </div>
    @include('job-portal.layouts.job-header')
    <main class="main">
        @yield('content')
        <script src="{{ asset('jobportal/assets/js/plugins/counterup.js') }}"></script>
    </main>
    @include('job-portal.layouts.job-footer')
    <script src="{{ asset('jobportal/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('jobportal/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('jobportal/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('jobportal/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jobportal/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('jobportal/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('jobportal/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('jobportal/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('jobportal/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('jobportal/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('jobportal/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('jobportal/assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('jobportal/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('jobportal/assets/js/main.js?v=4.1') }}"></script>
    @yield('js')

    <script>
        $(document).ready(function() {
            $('#ModalApplyJobForm').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var jobId = button.data('job-id'); // read from button
                $('#job_id').val(jobId);
            });


            $(document).on('submit', '#applyJobForm', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                // Show spinner
                $('#loadingSpinner').removeClass('d-none');

                $.ajax({
                    url: "{{ route('front.apply.job') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#formMessage').html(
                            '<div class="alert alert-success">' + response.message +
                            '</div>'
                        );
                        $('#applyJobForm')[0].reset();

                        setTimeout(() => {
                            $('#ModalApplyJobForm').modal('hide');
                        }, 500);
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '<div class="alert alert-danger"><ul>';
                        $.each(errors, function(key, value) {
                            errorMessage += '<li>' + value[0] + '</li>';
                        });
                        errorMessage += '</ul></div>';
                        $('#formMessage').html(errorMessage);
                    },
                    complete: function() {
                        // Hide spinner after success or error
                        $('#loadingSpinner').addClass('d-none');
                    }
                });
            });


        });
    </script>

</body>

</html>
