<?php
include_once 'db/conexion.php';
session_start();

if(isset($_SESSION['nombre'])){
  header('Location: index.php');
}

if (isset($_POST) & !empty($_POST)) {
  if(isset($_POST['csrf_token'])){
    if($_POST['csrf_token']!=$_SESSION['csrf_token']){
      header('Location: login.php?mensaje=errortoken');
      exit();
    }
  }
  $usuarioLogin = $_POST['usuario'];
  $claveLogin = sha1($_POST['clave']);
  $consulta = "select id,usuario,clave,nombre,usuario_tipo,activo from usuarios where usuario='$usuarioLogin'";
  $resultado = $conexion->query($consulta);

  $num = $resultado->num_rows;
  if ($num) {
    $fila = $resultado->fetch_assoc();
    $clave_db = $fila['clave'];
    $activoUsuario=$fila['activo'];

    if($activoUsuario==0){
      session_destroy();
      header('Location: login.php?mensaje=inactivo');
    }else{
      header('Location: index.php');
    }
    if (hash_equals($claveLogin,$clave_db)) {
      $_SESSION['id'] = $fila['id'];
      $_SESSION['nombre'] = $fila['nombre'];
      $_SESSION['usuario_tipo'] = $fila['usuario_tipo'];
    }else{
      header('Location: login.php?mensaje=credenciales');
      exit();
    }
  } else {
    header('Location: login.php?mensaje=inexistente');
    exit();
  }
}
$token=md5(uniqid(rand(),true));
$_SESSION['csrf_token']=$token;
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Ingreso</title>
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Ingreso</h3>
                  <!-- alertas -->
                  <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='inactivo'){
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  
                    <strong>¡Error!</strong> Usuario no activado.
                  </div>
                  <?php
                    }
                  ?>

                  <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='credenciales'){
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  
                    <strong>¡Error!</strong> Credenciales incorrectas.
                  </div>
                  <?php
                    }
                  ?>

                  <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='errortoken'){
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  
                    <strong>¡Error!</strong> Token incorrecto.
                  </div>
                  <?php
                    }
                  ?>
                  <!-- alertas fin -->
                </div>
                <div class="card-body">
                  <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <input type="hidden" name="csrf_token" value="<?php echo $token ?>">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="inputUsuario" type="text" placeholder="usuario1" name="usuario" />
                      <label for="inputUsuario">Usuario</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="inputPassword" type="password" placeholder="Clave" name="clave" />
                      <label for="inputPassword">Clave</label>
                    </div>
                    <div class="mt-4 mb-0">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
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
</body>

</html>