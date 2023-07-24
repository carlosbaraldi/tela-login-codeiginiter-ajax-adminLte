<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Login - Coffe Control</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('theme/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url('theme/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('theme/dist/css/adminlte.min.css') ?>">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('theme/favicon.ico') ?>" type="image/x-icon" />
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <div>
                <img src="<?= $_ENV['app.baseURL'] . 'theme/img/login/logo.svg' ?>" style="width: 150px;">
            </div>
            <div>
                <a href="<?= $_ENV['app.baseURL'] . 'LoginSystem/index' ?>" style="color: #000000; font-size: 30px; font-weight: 400;"><b style="font-weight: 600;">Zero Um</b> bit</a>
            </div>

            <h5 style="color: #000000"><b>LOGIN</b></h5>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Faça login em nosso sistema</p>

                <form id="login_form" method="post">
                    <div class="input-group mb-3">
                        <input type="userLogin" name="userLogin" id="userLogin" class="form-control" autofocus value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="userPassword" id="userPassword" class="form-control" autofocus value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-unlock-alt"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button id="btn_login" class="btn btn-block" type="submit" style="background-color: rgba(10,0,255,1); color: #ffffff;">
                                <i class="fa-sharp fa-solid fa-right-to-bracket" style="color: #ffffff;"></i> Entrar
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>

                </form>

            </div>

        </div>
        <!-- /.login-card-body -->

        <div style="position: fixed; bottom: 0; margin: 0px 55px;">
            <img src="https://img.icons8.com/office/30/26e07f/whatsapp--v3.png" />
            <a href="https://api.whatsapp.com/send?phone=5519997885699&text=Preciso%20de%20Suporte%20T%C3%A9cnico" class="btn blank" style="color: green;" target="_blank">Entre em contato com o Suporte </a>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('theme/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('theme/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Sweetalert2 -->
    <script src="<?= base_url('theme/plugins/sweetalert2/sweetalert2.all.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('theme/dist/js/adminlte.min.js') ?>"></script>
    <!-- JS CALIDATION -->
    <script src="<?php echo base_url('theme/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
    <!-- JS LOGIN -->
    <script src="<?php echo base_url('js/login.js') ?>"></script>
    
</body>

</html>