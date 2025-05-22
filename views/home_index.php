<?php
// Quita la carga de config.php aquí, ya que el controlador ya lo incluye
// require_once dirname(__DIR__) . '/../config/config.php';
include("layout/parte2.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <br>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="container">
          <h1 class="text-center mt-4">Vista Principal</h1>
          <?php if(isset($_SESSION['usuario'])): ?>
            <h3 class="text-center" style="color:#2575fc;">Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?>!</h3>
          <?php endif; ?>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
  include("layout/parte1.php");
?>