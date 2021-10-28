<?php
include_once '../db/conexion.php';
if($_POST){
  $nombre=$_POST['nombre'];
  $usuario=$_POST['usuario'];
  $clave=sha1($_POST['clave']);
  $clavec=sha1($_POST['clavec']);
  $usuario_tipo=$_POST['usuario_tipo'];
  if(isset($_POST['activo'])){
    $activo=1;
  }else{
    $activo=0;
  }
    
    if(!$usuario_tipo==1 || !$usuario_tipo==2){
      header('Location: ../registro.php?mensaje=errorTipo');
    }
    
    if(!hash_equals($clave, $clavec)){
      header('Location: ../registro.php?mensaje=errorClaves');
    }

    $consulta="insert into usuarios (nombre,usuario,clave,usuario_tipo,activo) values ('$nombre','$usuario','$clave','$usuario_tipo','$activo')";
    $resultado=$conexion->query($consulta);

    if ($resultado) {
      header('Location: ../tablas.php?mensaje=creado');
    } else {
      header('Location: ../tablas.php?mensaje=error');
    }
  }
$conexion->close();
