$(function () {
    // VALIDA OS CAMPOS PARA VER SE ESTÃO PREENCHIDOS APOS DESFOCAR O INPUT 
    $("#userLogin").on("blur ", function () {
        if ($('#userLogin').val() == "") {
            $('#userLogin').addClass('is-invalid');
        }
        if ($('#userLogin').val() != "") {
            $('#userLogin').removeClass('is-invalid').addClass('is-valid');
        }
        $('#userLogin').addClass('is-valid');
    });

    $("#userPassword").on("blur ", function () {
        if ($('#userPassword').val() == "") {
            $('#userPassword').addClass('is-invalid');
        }
        if ($('#userPassword').val() != "") {
            $('#userPassword').removeClass('is-invalid').addClass('is-valid');
        }
        $('#userPassword').addClass('is-valid');
    });


    $("#login_form").submit(function (event) {
        event.preventDefault();
        // VALIDA OS INPUTS PARA NAO ENVIAR CASO ESTAJAM VAZIOS
        if ($('#userLogin').val() == "") {
            $('#userLogin').addClass('is-invalid');
            return false;
        }

        if ($('#userPassword').val() == "") {
            $('#userPassword').addClass('is-invalid');
            return false;
        }
        //ENVIA AS INFORMAÇÕES PARA O CONTROLLER
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
                // CASO DE SUCESSO, USUARIO E SENHA ESTÃO CORRETOS É DIRECIONADO PARA A AREA ADMINISTRATIVA
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
                // CASO DE SUCESSO, MAS USUARIO E/OU SENHA NAO ENCONTRADOS É DIRECIONADO PARA A TELA DE LOGIN NOVAMENTE
                if (response.status == 0) {
                    $('#userLogin').removeClass('is-invalid').addClass('is-valid');
                    $('#userPassword').addClass('is-valid');
                    Swal.fire({
                        willClose: () => { }
                    })
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                        confirmButtonColor: "#007bff"
                    })

                }
            },
            // CASO OCORRA ALGUM ERRO ANTES DA CONSULTA, PODE SER ERRO DE SERVIDOR 500, SEM ACESSO AO BANCO ETC
            error: function (result) {
                $('#userLogin').removeClass('is-invalid').addClass('is-valid');
                $('#userPassword').addClass('is-valid');
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