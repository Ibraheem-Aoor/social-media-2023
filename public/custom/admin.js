$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });


    /* ##############  START DELETE FORM  ##########*/
    $('#delete-modal').on('show.bs.modal', function (e) {
        var btn = e.relatedTarget;
        var deleteUrl = btn.getAttribute('data-delete-url');
        var message = btn.getAttribute('data-message');
        var name = btn.getAttribute('data-name');
        var modalForm = $(this).find('form[name="confirm-delete-form"]');
        modalForm.attr('action', deleteUrl);
        modalForm.attr('method', 'DELETE');
        $(this).find('.modal-body p').text(message + "\t" + name);
    });
    //Handle delete confirmation form
    $(document).on('submit', 'form[name="confirm-delete-form"]', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: {},
            success: function (response) {
                if (response.is_deleted) {
                    $.notify(response.message);
                    $('#row-' + response.row).parent().parent().remove();
                    $('#delete-modal').modal('hide');
                } else {
                    $.notify(response.message, "error");
                }
            },
            error: function (response) {
                $.notify(response.message, "error");
            }
        });
    });
    /* ##############  END DELETE FORM  ##########*/




    /* ############# GENERAL FORM SUBMIT ################ */

    $(document).on('submit', 'form:not(#confirm-delete-form)', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            processData: false,
            contentType: false,
            data: formData,
            enctype: "multipart/form-data",
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $.notify(response.message);
                } else {
                    $.notify(response.message);
                }
                if (response.reset_form) {
                    $('button[type="reset"]').click();
                }
                if (response.refresh_table) {
                    $('#myTable').DataTable().ajax.reload();
                }
                if (response.modal_to_hiode) {
                    $(response.modal_to_hiode).modal('hide');
                }
            }, error: function (response) {
                console.log(response);
                if (response.status == 422) {
                    $.each(response.responseJSON.errors, function (key, errorsArray) {
                        $.each(errorsArray, function (item, error) {
                            $.notify(error);
                        });
                    });
                } else if (response.responseJSON && response.responseJSON.message) {
                    $.notify(response.responseJSON.message);
                } else {
                    $.notify(response.message);
                }
            }
        });
    });

    /* ############# GENERAL FORM SUBMIT ################ */



    $(document).on('click', '#checkbox-master', function () {
        $('input[type="checkbox"]').prop('checked', this.checked);
    });


});
