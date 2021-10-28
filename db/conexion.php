<?php
  $hostSQL='host';
  $claveUsuarioSQL="clave";
  $usuarioSQL="usuario";
  $dbSQL="basededatos";
  
  try {
    $conexion=new mysqli(
      $hostSQL,$usuarioSQL,$claveUsuarioSQL,$dbSQL
    );
  } catch (Exception $e) {
    echo "Problema con la conexion: ".$e->getMessage();
  }