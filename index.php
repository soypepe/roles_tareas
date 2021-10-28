<?php
include_once 'db/conexion.php';
session_start();
if (!isset($_SESSION['id'])) {
  header('Location: login.php');
} else {
  $nombre = $_SESSION['nombre'];
  $usuario_tipo = $_SESSION['usuario_tipo'];
}
$consultaFaltantes="select * from tareas where estado=0";
$consultaHechos="select * from tareas where estado=1";
$sumaFaltantes=$conexion->query($consultaFaltantes)->num_rows;
$sumaHechos=$conexion->query($consultaHechos)->num_rows;
$graficoTareas=[$sumaHechos,$sumaFaltantes];

$consultaActivos="select * from usuarios where activo=1";
$consultaInactivos="select * from usuarios where activo=0";
$sumaActivos=$conexion->query($consultaActivos)->num_rows;
$sumaInactivos=$conexion->query($consultaInactivos)->num_rows;
$graficoActivos=[$sumaActivos,$sumaInactivos];
$conexion->close();

?>

<?php include 'templates/header.php' ?>

<?php include 'templates/sidenavbar.php' ?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Principal</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Principal</li>
      </ol>
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">Carta Primaria</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">Ver Detalles</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-warning text-white mb-4">
            <div class="card-body">Carta Advertencia</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">Ver Detalles</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">Carta Correcta</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">Ver Detalles</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-danger text-white mb-4">
            <div class="card-body">Carta Peligro</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">Ver Detalles</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-6">
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-chart-bar me-1"></i>
              Grafico de Usuarios
            </div>
            <div class="card-body"><canvas id="miGraficoActivos" width="100%" height="50"></canvas></div>
            <input type="hidden" id="graficoActivos" value="<?php echo json_encode($graficoActivos)?>">
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-chart-pie me-1"></i>
              Grafico de Tareas
            </div>
            <div class="card-body"><canvas id="miGraficoTareas" width="100%" height="40"></canvas></div>
            <div class="card-footer small text-muted">Actualizado</div>
            <input type="hidden" id="graficoTareas" value="<?php echo json_encode($graficoTareas)?>">
          </div>
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
<script src="js/grafico.js"></script>
</body>

</html>