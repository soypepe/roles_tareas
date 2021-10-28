<?php
print_r($_GET['persona']);
if(!isset($_GET['persona'])){
  header('Location: tablas.php?mensaje=error');
}

require_once '../db/conexion.php';
$persona=$_GET['persona'];

$consulta="delete from usuarios where id=$persona";
$resultado=$conexion->query($consulta);

if($resultado){
  header('Location: ../tablas.php?mensaje=eliminado');
}else{
  header('Location: ../tablas.php?mensaje=error');
}
$conexion->close();
