$(function () {

    $("#userLogin").on("blur ", function () {
        if ($('#userLogin').val() == "") {
            $('#userLogin').addClass('is-invalid');
        }
        $('#userLogin').addClass('is-valid');
    });

    $("#userPassword").on("blur ", function () {
        if ($('#userPassword').val() == "") {
            $('#userPassword').addClass('is-invalid');
        }
        $('#userPassword').addClass('is-valid');
    });


    $("#login_form").submit(function (event) {
        event.preventDefault();

        if ($('#userLogin').val() == "") {
            $('#userLogin').addClass('is-invalid');
            return false;
        }

        if ($('#userPassword').val() == "") {
            $('#userPassword').addClass('is-invalid');
            return false;
        }

        $.ajax({
            "url": '/loginSystem/signIn',
            "type": 'POST',
            "datatype": "json",
            "data": {
                userLogin: $('#userLogin').val(),
                userPassword: $('#userPassword').val(),
            },
            beforeSend: function () {
                Swal.fire({
                    html: 'Aguarde....',
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                })
            },

            success: function (result) {

                var response = JSON.parse(result);

                if (response.status == 1) {
                    Swal.fire({
                        willClose: () => { }
                    })
                    window.location = response.url;
                    Swal.fire({
                        icon: 'success',
                        title: '',
                        text: response.message,
                        showConfirmButton: false,
                    })

                }

                if (response.status == 0) {
                    Swal.fire({
                        willClose: () => { }
                    })
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                        confirmButtonColor: "#007bff"
                    })
                    $('#userLogin').addClass('is-valid');
                    $('#userPassword').addClass('is-valid');
                }
            },

            error: function (result) {
                Swal.fire({
                    willClose: () => { }
                })
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: result.statusText,
                    confirmButtonColor: "#007bff"
                })
            },
        });
        return false;
    })

})