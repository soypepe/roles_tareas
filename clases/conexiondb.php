<?php
class Dbh{
  private $servidor;
  private $usuario;
  private $clave;
  private $db;

  protected function conectar(){
    $this->servidor='host';
    $this->usuario='usuario';
    $this->clave='clave';
    $this->db='basededatos';

    $con=new mysqli($this->servidor,$this->usuario,$this->clave,$this->db);
    return $con;
  }
}