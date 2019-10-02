$(document).on("click", ".create-modal", function() {
    $("#modal-form").modal();
    let url = $(this).attr("data-url");
    console.log(url);
    let title = $(this).attr("data-title");
    $(".modal-title").html(title);
    $("#loader").show();
    // $(".modal-dialog .modal-content-body").load(url);
    console.log(url);
    $(".modal-dialog .modal-content-body").load(url, function() {
        $("#tinymce").wysihtml5();
    });
    $("#loader").hide();
});
$("#modal-form").on("hidden.bs.modal", function() {
    $(".modal-dialog .modal-content-body").html("");
    $(".modal-dialog .modal-content-body").html($("#prep-loading").html());
});

$(document).on("submit", "#form-post", function(e) {
    e.preventDefault();
    //console.log($(this).attr('method'));
    let formData = false;
    let method = $(this).attr("method");
    //console.log('method');
    let form = $(this);
    if (window.FormData) {
        formData = new FormData(form[0]);
    }

    let url = $(this).attr("action");
    console.log(url);
    $.ajax({
        type: method,
        url: url,
        data: formData ? formData : form.serialize(),
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.status == "success") {
                //console.log(response.message);
                $(".message-success")
                    .html(response.message)
                    .fadeIn()
                    .removeClass("hidden")
                    .fadeOut(5000);
                console.log(response);
                $("#table").load(location.href + " #table .table");
                $("#modal-form").modal("toggle");
            }
            if (response.status == "fails") {
                console.log(response.errors);
                for (var key in response.errors) {
                    console.log(response);
                    var error_message = response.errors[key];
                    var error_form_field = form.find("[name=" + key + "]");
                    error_form_field.addClass("errors");
                    error_form_field
                        .parent()
                        .find(".error-message")
                        .addClass("text-danger")
                        .html(error_message)
                }
            }
        }
    });
    return false;
});


$(document).on("submit", ".delete-sweet-modal", function(e) {
    e.preventDefault();
    let form = $(this);
    var method = form.attr("method");
    var action = $(this).attr("action");
    console.log(action);
    Swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "red",
        cancelButtonColor: "info",
        confirmButtonText: "Yes, delete it!"
    }).then(result => {
        if (result.value) {
            $.ajax({
                type: "DELETE",
                url: action,
                data: form.serialize(),

                success: function(response) {
                    console.log(response);
                    if (response.status == "success") {
                        console.log(response.message);
                        $(".message-success")
                            .html(response.message)
                            .fadeIn()
                            .removeClass("hidden")
                            .fadeOut(3000);
                        console.log(response);
                        $("#table").load(location.href + " #table .table");
                    }
                    if (response.status == "fails") {
                        console.log("cannot delete");
                    }
                }
            });

            Swal.fire("Deleted!", "success");
        }
    });
    return false;
});

$(document).on("submit", ".accept-sweet-modal", function(e) {
    e.preventDefault();
    let form = $(this);
    var method = form.attr("method");
    var action = $(this).attr("action");
    console.log(action);
    Swal({
        title: "Are you sure?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "green",
        cancelButtonColor: "info",
        confirmButtonText: "Yes, accept it!"
    }).then(result => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: action,
                data: form.serialize(),

                success: function(response) {
                    console.log(response);
                    if (response.status == "success") {
                        console.log(response.message);
                        $(".message-success")
                            .html(response.message)
                            .fadeIn()
                            .removeClass("hidden")
                            .fadeOut(3000);
                        console.log(response);
                        $("#table").load(location.href + " #table .table");
                    }
                    if (response.status == "fails") {
                        console.log("cannot accept");
                    }
                }
            });

            Swal.fire("Delivered!", "success");
        }
    });
    return false;
});