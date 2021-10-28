<?php
session_start();
require_once 'db/conexion.php';
if (!isset($_SESSION['id'])) {
  header('Location: login.php');
} else {
  $id = $_SESSION['id'];
  $nombre=$_SESSION['nombre'];
  $usuario_tipo = $_SESSION['usuario_tipo'];

  $consultaFaltantes="select tareas.id,tareas.tarea,tareas.descripcion,usuarios.nombre from tareas inner join usuarios on tareas.usuario_id=usuarios.id where tareas.estado=0";
  $consultaHechas="select tareas.id,tareas.tarea,tareas.descripcion,usuarios.nombre from tareas inner join usuarios on tareas.usuario_id=usuarios.id where tareas.estado=1";
  $preparandoHechas = $conexion->query($consultaHechas);
  $preparandoFaltantes = $conexion->query($consultaFaltantes);

  $resultadoHechas=$preparandoHechas->fetch_all(MYSQLI_ASSOC);
  $resultadoFaltantes=$preparandoFaltantes->fetch_all(MYSQLI_ASSOC);
}
$conexion->close();
?>

<?php include 'templates/header.php' ?>
<?php include 'templates/sidenavbar.php' ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Tareas a completar</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Principal</a></li>
        <li class="breadcrumb-item active">Tareas</li>
      </ol>
      <!-- alertas -->

      <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='error'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>¡Error!</strong> Algo salio mal.
      </div>
      <?php
        }
      ?>

      <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='creado'){
      ?>
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>¡Creada!</strong> Tarea Creada exitosamente.
      </div>
      <?php
        }
      ?>

      <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='tickeado'){
      ?>
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>¡Hecho!</strong> Tarea hecha exitosamente.
      </div>
      <?php
        }
      ?>
      <!-- alertas fin -->
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Lista de Tareas Hechas
          <?php echo $totalHechas ?>
        </div>
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>id</th>
                <th>Tarea</th>
                <th>Descripcion</th>
                <th>Usuario Iniciante</th>
                <th colspan="2">acciones</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>id</th>
                <th>Tarea</th>
                <th>Descripcion</th>
                <th>Usuario Iniciante</th>
                <th colspan="2">acciones</th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach($resultadoFaltantes as $filaFaltantes) { ?>
                <tr class="text-center">
                  <td><?php echo $filaFaltantes['id'] ?></td>
                  <td><?php echo $filaFaltantes['tarea'] ?></td>
                  <td><?php echo $filaFaltantes['descripcion'] ?></td>
                  <td><?php echo $filaFaltantes['nombre'] ?></td>
                  <td><a class="text-success" href="tareas/completarTarea.php?tarea=<?php echo $filaFaltantes['id'] ?>"><i class="bi bi-check2-all"></i></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Lista de Tareas Por Hacer
        </div>
        <div class="card-body">
          <table class="table">
            <thead class="text-center">
              <tr>
                <th>id</th>
                <th>Tarea</th>
                <th>Descripcion</th>
                <th>Usuario Iniciante</th>
              </tr>
            </thead>
            <tfoot class="text-center">
              <tr>
                <th>id</th>
                <th>Tarea</th>
                <th>Descripcion</th>
                <th>Usuario Iniciante</th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach($resultadoHechas as $filaHechas) { ?>
                <tr class="text-center">
                  <td><?php echo $filaHechas['id'] ?></td>
                  <td><?php echo $filaHechas['tarea'] ?></td>
                  <td><?php echo $filaHechas['descripcion'] ?></td>
                  <td><?php echo $filaHechas['nombre'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <!-- </div> -->
  <?php include 'templates/footer.php'?>