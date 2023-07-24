<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Controle de Amostras - <?= $_ENV['app_empresa'] ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('theme/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Sweetalert2 -->
  <link rel="stylesheet" href="<?= base_url('theme/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('theme/dist/css/adminlte.min.css') ?>">
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url('theme/favicon.ico') ?>" type="image/x-icon" />

</head>

<body class="hold-transition layout-footer-fixed sidebar-collapse">

  <?= $this->include('admin/_commom/header'); ?>

  <?= $this->renderSection('content'); ?>

  <!-- jQuery -->
  <script src="<?= base_url('theme/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('theme/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- Sweetalert2 -->
  <script src="<?= base_url('theme/plugins/sweetalert2/sweetalert2.all.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('theme/dist/js/adminlte.min.js') ?>"></script>

  <?= $this->renderSection('scripts'); ?> 

</body>

</html>