$(document).ready(function () {
    $("#contactForm").on("submit", function (e) {
        e.preventDefault();
        let form = $(this);
        let formData = form.serialize();
        form.find(".is-invalid").removeClass("is-invalid");
        form.find(".invalid-feedback").remove();

        $.ajax({
            url: form.attr("action"),
            method: form.attr("method"),
            data: formData,
            success: function (response) {
                notyf.success(response.message);

                form[0].reset();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        let input = form.find('[name="' + key + '"]');
                        input.addClass("is-invalid");
                        input.after(
                            '<div class="invalid-feedback">' +
                                value[0] +
                                "</div>"
                        );
                    });
                } else {
                    notyf.error("Something went wrong, please try again!");
                }
            },
        });
    });
});
