<?php

/**
 * Usuario
 */
abstract class Usuario
{
  protected $link;

  protected $idUsuario;
  protected $idTipoUsuario;
  protected $nmUsuario;


  function __construct($linkGlobal){
    $this->link = $linkGlobal;
  }

  function get_idUsuario(){
    return $this->idUsuario;
  }

  function get_idTipoUsuario(){
    return $this->idTipoUsuario;
  }

  function get_nmUsuario(){
    return $this->nmUsuario;
  }

  function set_idUsuario($idU){
    $this->idUsuario = $idU;
  }

  function set_idTipoUsuario($idTU){
    $this->idTipoUsuario = $idTU;
  }

  function set_nmUsuario($nmU){
    $this->nmUsuario = $nmU;
  }

  abstract function usuarioExiste($id);
}

?>
