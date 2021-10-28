<?php
class VerUsuarios extends Usuarios{
  public function verUsuarios(){
    $todos=$this->getTodosUsuarios();
    $this->conectar()->close();
    return $todos;
    // foreach($todos as $dato){
    //   echo $dato['id'].'<br>';
    //   echo $dato['usuario'].'<br>';
    //   echo $dato['nombre'].'<br>';
    // }
  }
}