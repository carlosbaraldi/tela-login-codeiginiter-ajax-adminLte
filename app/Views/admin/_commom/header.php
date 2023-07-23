<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown" id="notificacao">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell fa-lg"></i>
          <span class="badge badge-danger navbar-badge" style="font-size: 10px;">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Minhas Notificações</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-smile mr-2"></i> Super Promoção
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <div class="text-center mt-1">
      <img class="profile-user-img img-fluid img-circle" src="https://virtualdelivery.com.br/rapidogas/produtos/semimagem.jfif" alt="User profile picture" style="width: 70px;">
    </div>
    <div class="text-center">
      <h5 class="brand-text font-weight-light">Seja bem vindo (a)</h5>
      <h4 class="brand-text font-weight-light"><strong><?php echo session()->nome ?></strong></h4>
      <h4 style="display: none;"><?php echo session()->idUsuario ?></h4>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Procurar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= $_ENV['app.baseURL'] . 'perfilUsuario/index' ?>" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                MEU PERFIL
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= $_ENV['app.baseURL'] . 'minhasCompras/index' ?>" class="nav-link">
              <i class="nav-icon fas fa-barcode"></i>
              <p>
                MINHAS COMPRAS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= $_ENV['app.baseURL'] ?>" class="nav-link">
              <i class="nav-icon fa fa-smile"></i>
              <p>
                PROMOÇÕES
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= $_ENV['app.baseURL'] . 'entrar/signOut' ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Sair do Sistema
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!--  SCRIPTS CORRESPONDENTE A PAGINA -->
  <?= $this->section('scripts') ?>

  <script>
    $(function() {
      $("#notificacao").on("click", function() {
        $.ajax({
          "url": '/notificacao/lerNotificacao',
          "type": 'POST',
          "datatype": "json",
          success: function(result, data) {

            alert("ALTERADO");
          },
          error: function(result, data) {

            alert("ERRO");
          },
        });

      });

    });
  </script>


  <?= $this->endSection() ?>