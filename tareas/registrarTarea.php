<?php
include_once '../db/conexion.php';
session_start();
if(!isset($_SESSION['id'])){
  header('Location: login.php');
}else{
  if($_POST){
    $persona=$_POST['persona'];
    $tarea=$_POST['tarea'];
    $descripcion=$_POST['descripcion'];

      $consulta="insert into tareas (tarea,descripcion,estado,usuario_id) values ('$tarea','$descripcion',0,$persona)";
      $resultado=$conexion->query($consulta);

      if ($resultado) {
        header('Location: ../tareas.php?mensaje=creado');
      } else {
        header('Location: ../tareas.php?mensaje=error');
      }
    }
  }
$conexion->close();
