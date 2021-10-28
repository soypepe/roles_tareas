<?php
session_start();

if($_SESSION['usuario_tipo']!=1){
  header('Location: 401.php');
  exit();
}

if (!isset($_SESSION['id'])) {
  header('Location: login.php');
} else {
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
              <h3 class="text-center font-weight-light my-4">Crear Nuevo Usuario</h3>
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
              <form action="usuarios/registroUsuario.php" method="POST">
                <div class="form-floating mb-3">
                  <input class="form-control" id="nombre" type="text" placeholder="Nombre" name="nombre" required autofocus/>
                  <label for="nombre">Nombre</label>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="usuario" type="text" placeholder="Usuario" name="usuario" required/>
                      <label for="usuario">Usuario</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating text-center mb-3">
                      <select class="form-select" id="usuario_tipo" name="usuario_tipo" required>
                        <option selected>Tipo Usuario</option>
                        <option value="1">Administrador</option>
                        <option value="2">Estandar</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" id="clave" type="password" placeholder="Clave" name="clave" required/>
                      <label for="clave">Clave</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" id="clavec" type="password" placeholder="Confirm password" name="clavec" required/>
                      <label for="clavec">Confirmar clave</label>
                    </div>
                  </div>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="activo" name="activo">
                  <label class="form-check-label" for="activo">
                    Activo
                  </label>
                </div>
                <div class="mt-4 mb-0">
                  <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" href="tablas.php">Crear usuario</button></div>
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