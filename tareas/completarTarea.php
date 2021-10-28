<?php
include_once '../db/conexion.php';
session_start();
if(!isset($_SESSION['id'])){
  header('Location: login.php');
}else{
  $tarea=$_GET['tarea'];
  $consulta="update tareas set estado=1 where id=$tarea";
  $resultado=$conexion->query($consulta);
  if($resultado){
    header('Location: ../tareas.php?mensaje=tickeado');
  }else{
    header('Location: ../tareas.php?mensaje=error');
  }
}

$conexion->close();
