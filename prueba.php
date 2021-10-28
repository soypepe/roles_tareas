<?php include 'templates/header.php' ?>
<?php include 'templates/sidenavbar.php' ?>
<?php include_once 'clases/conexiondb.php' ?>
<?php include_once 'clases/usuarios.consultas.php' ?>
<?php include_once 'clases/usuarios.respuestas.php' ?>
<?php
$registro=new VerUsuarios;
// echo $db;
$grafico=array();
$grafico=[12, 19, 3, 5, 2, 3];
?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Charts</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Charts</li>
      </ol>
      <div class="card mb-4">
        <div class="card-body">
          Chart.js is a third party plugin that is used to generate the charts in this template. The charts below have been customized - for further customization options, please visit the official
          <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js documentation</a>
          .
        </div>
        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-chart-pie me-1"></i>
              Pie Chart Example
              <?php echo $registro->verUsuarios()?>
            </div>
            <div class="card-body"><canvas id="miGrafico" width="100%" height="50"></canvas></div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            <input type="hidden" id="grafico" value="<?php echo json_encode($grafico)?>">
          </div>
        </div>
      </div>
  </main>
  <footer class="py-4 bg-light mt-auto">
  <div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-center small">
      <div class="text-muted">Copyright &copy; Pepe A 2021</div>
    </div>
  </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- <script src="js/grafico.js"></script> -->
</body>

</html>