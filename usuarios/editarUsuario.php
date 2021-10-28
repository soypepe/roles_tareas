<?php
include_once '../db/conexion.php';
if($_POST){
  $persona=$_POST['persona'];
  $nombre=$_POST['nombre'];
  $usuario=$_POST['usuario'];
  if(isset($_POST['reseteo_clave'])){
    $claveReset=sha1('Clave123');
  }
  $usuario_tipo=$_POST['usuario_tipo'];
  if(isset($_POST['activo'])){
    $activo=1;
  }else{
    $activo=0;
  }
    
    if(!$usuario_tipo==1 || !$usuario_tipo==2){
      header('Location: ../registro.php?mensaje=errorTipo');
    }

    if(isset($claveReset)){
      $consulta="update usuarios set nombre='$nombre',usuario='$usuario',clave='$claveReset',usuario_tipo=$usuario_tipo,activo=$activo where id=$persona";
    }else{
      $consulta="update usuarios set nombre='$nombre',usuario='$usuario',usuario_tipo=$usuario_tipo,activo=$activo where id=$persona";
    }
    print_r($consulta);
    $resultado=$conexion->query($consulta);
    print_r($resultado);
    if ($resultado) {
      header('Location: ../tablas.php?mensaje=modificado');
    } else {
      header('Location: ../tablas.php?mensaje=error');
    }
  }
$conexion->close();
