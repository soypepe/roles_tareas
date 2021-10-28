<?php
session_start();

if (!isset($_SESSION['id'])) {
  header('Location: login.php');
} else {
  $id=$_SESSION['id'];
  $nombre = $_SESSION['nombre'];
  $usuario_tipo = $_SESSION['usuario_tipo'];
}
?>

<?php include 'templates/header.php' ?>

<?php include 'templates/sidenavbar.php' ?>

<div id="layoutSidenav_content">
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
              <h3 class="text-center font-weight-light my-4">Crear Nueva Tarea</h3>
            </div>
            <div class="card-body">
              <!-- alertas -->
              <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='errorClaves'){
              ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              
                <strong>¡Error!</strong> Claves no coinciden.
              </div>
              <?php
                }
              ?>

              <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='errorTipo'){
              ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              
                <strong>¡Error!</strong> Seleccione el tipo de usuario.
              </div>
              <?php
                }
              ?>
              <!-- alertas fin -->
              <form action="tareas/registrarTarea.php" method="POST">
                <div class="form-floating mb-3">
                  <input class="form-control" id="tarea" type="text" placeholder="Tarea" name="tarea" required autofocus/>
                  <label for="tarea">Tarea</label>
                </div>
                <div class="mb-3">
                  <label for="descripcion" class="form-label">Descripcion</label>
                  <textarea class="form-control" id="descripcion" rows="3" name="descripcion"></textarea>
                </div>
                <div class="mt-4 mb-0">
                  <input type="hidden" value="<?php echo $id ?>" name="persona">
                  <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Crear tarea</button></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- </div> -->

  <?php
  include 'templates/footer.php';
  ?>