<?php
include "layout/parte1.php";
?>
<div class="content-wrapper">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="container">
          <h1 class="text-center mt-4">Vista: Reporte General</h1>
          <div class="alert alert-info text-center">
            Valor recibido: <?php echo isset($mi_valor) ? htmlspecialchars($mi_valor) : 'Ninguno'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include "layout/parte2.php";
