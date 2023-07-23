<?= $this->extend('admin/_commom/main') ?>

<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-bottom: 10px;">

  <!-- Content Header (Page header) -->
  <form action="<?= $_ENV['app.baseURL'] . '' ?>" method="post">
    <?= csrf_field() ?> 
   
    <!-- Main content -->
    <section class="content">

      
    </section>
    <!-- /.content -->


    <!-- Footer -->
    <div class="row" style="text-align: center;">
      <footer class="main-footer py-0">
        
      </footer>
    </div>
    <!-- /.footer -->
  </form>
</div>
<!-- /.content-wrapper -->

<?= $this->endSection() ?>



<?= $this->section('scripts') ?>

<script>
  /**
   * Script para emitir um alerta de produtos em promoção
   * 
   */
  $(function() {
    var Toast = Swal.fire({
      title: 'Temos Promoção para você :)',
      text: 'Atenção, atenção! Tem oferta relâmpago passando pela Rápido Gás!',
      icon: 'warning',
      iconColor: '#FFA500',
      confirmButtonText: '<i class="fa fa-thumbs-up"></i> Aproveitar :)',
      confirmButtonColor: "#007bff"
    });
  });
</script>

<?= $this->endSection() ?>