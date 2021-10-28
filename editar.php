<?php
  session_start();
  if (!isset($_SESSION['id'])) {
    header('Location: login.php');
  } else {
    $nombre = $_SESSION['nombre'];
    $usuario_tipo = $_SESSION['usuario_tipo'];
  }

  if(!isset($_GET['persona'])){
    header('Location: tablas.php?mensaje=error');
    exit();
  }

  include_once 'db/conexion.php';
  $persona=$_GET['persona'];
  $consulta="select nombre,usuario,usuario_tipo,activo from usuarios where id=$persona";
  $resultado=$conexion->query($consulta);
  $datos=$resultado->fetch_assoc();
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
              <?php print_r($resultado->fetch_assoc()); ?>
            </div>
            <div class="card-body">
              <!-- alertas -->

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
              <form action="usuarios/editarUsuario.php" method="POST">
                <div class="form-floating mb-3">
                  <input class="form-control" id="nombre" type="text" placeholder="Nombre" name="nombre" value="<?php echo $datos['nombre'] ?>" required autofocus/>
                  <label for="nombre">Nombre</label>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="usuario" type="text" placeholder="Usuario" name="usuario" value="<?php echo $datos['usuario'] ?>" required/>
                      <label for="usuario">Usuario</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating text-center mb-3">
                      <select class="form-select" id="usuario_tipo" name="usuario_tipo" required>
                        <option >Tipo Usuario</option>
                        <option value="1"<?=$datos['usuario_tipo'] == '1' ? ' selected="selected"' : '';?>>Administrador</option>
                        <option value="2"<?=$datos['usuario_tipo'] == '2' ? ' selected="selected"' : '';?>>Estandar</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="reseteo_clave" name="reseteo_clave">
                  <label class="form-check-label" for="reseteo_clave">
                    Reseteo de clave
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="activo" name="activo"
                  <?=$datos['activo'] == '1' ? ' checked="checked"' : '';?>>
                  <label class="form-check-label" for="activo">
                    Activo
                  </label>
                </div>
                <div class="mt-4 mb-0">
                <input type="hidden" name="persona" value="<?php echo $persona ?>">
                  <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" href="tablas.php">Editar usuario</button></div>
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