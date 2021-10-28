<?php
session_start();
require_once 'db/conexion.php';
include 'clases/conexiondb.php';
include 'clases/usuarios.consultas.php';
include 'clases/usuarios.respuestas.php';
$usuarios=new VerUsuarios;

if($_SESSION['usuario_tipo']!=1){
  header('Location: 401.php');
  exit();
}
if (!isset($_SESSION['id'])) {
  header('Location: login.php');
} else {
  $id = $_SESSION['id'];
  $nombre = $_SESSION['nombre'];
  $usuario_tipo = $_SESSION['usuario_tipo'];
  if ($usuario_tipo == 1) {
    $condicion = "";
  } elseif ($usuario_tipo == 2) {
    $condicion = "where id=$id";
  }
  $consulta = "select id,usuario,nombre,usuario_tipo from usuarios $condicion";
  $resultado = $conexion->query($consulta);
}
$resultado->close();
?>

<?php include 'templates/header.php' ?>
<?php include 'templates/sidenavbar.php' ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Usuarios</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Principal</a></li>
        <li class="breadcrumb-item active">Tablas</li>
      </ol>
      <!-- alertas -->
      <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='creado'){
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>¡Creado!</strong> Usuario creado exitosamente.
      </div>
      <?php
        }
      ?>

      <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='error'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>¡Error!</strong> Algo salio mal.
      </div>
      <?php
        }
      ?>

      <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='modificado'){
      ?>
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>¡Editado!</strong> Usuario modificado exitosamente.
      </div>
      <?php
        }
      ?>

      <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='eliminado'){
      ?>
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>¡Eliminado!</strong> Usuario eliminado exitosamente.
      </div>
      <?php
        }
      ?>
      <!-- alertas fin -->
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Base de datos de usuarios
          <?php echo $usuarios->verUsuarios()?>
        </div>
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>id</th>
                <th>usuario</th>
                <th>nombre</th>
                <th>tipo usuario</th>
                <th colspan="2">acciones</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>id</th>
                <th>usuario</th>
                <th>nombre</th>
                <th>tipo usuario</th>
                <th colspan="2">acciones</th>
              </tr>
            </tfoot>
            <tbody>
              <?php //while ($fila = $usuarios->verUsuarios()) { ?>
                <?php foreach($usuarios->verUsuarios() as $fila){?>
                <tr class="text-center">
                  <td><?php echo $fila['id'] ?></td>
                  <td><?php echo $fila['usuario'] ?></td>
                  <td><?php echo $fila['nombre'] ?></td>
                  <td><?php echo $fila['usuario_tipo'] ?></td>
                  <td><a class="text-warning" href="editar.php?persona=<?php echo $fila['id'] ?>"><i class="bi bi-pencil-square"></i></a></td>
                  <td><a onclick="return confirm('¿Esta seguro que quiere eliminar?')" class="text-danger" href="usuarios/eliminarUsuario.php?persona=<?php echo $fila['id'] ?>"><i class="bi bi-trash"></i></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <!-- </div> -->
  <?php include 'templates/footer.php' ?>