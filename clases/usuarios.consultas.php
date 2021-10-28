<?php
class Usuarios extends Dbh{
  protected function getTodosUsuarios(){
    $sql='select * from usuarios';
    $resultado=$this->conectar()->query($sql);
    $filas=$resultado->num_rows;
    if($filas>0){
      while($fila=$resultado->fetch_assoc()){
        $datos[]=$fila;
      }
      return $datos;
    }
  }
}