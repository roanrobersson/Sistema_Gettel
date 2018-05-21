<?php

/**
 * TipoUsuario
 */
class TipoUsuario{

  protected $link;
  protected $idTipoUsuario;
  protected $dsTipoUsuario;

  function __construct($linkGlobal){
    $this->link = $linkGlobal;
  }

  function carregar($id){
    $sql = "SELECT * FROM TipoUsuario WHERE idTipoUsuario = '$id'";
    $query = mysqli_query($this->link, $sql);

    $registro = mysqli_fetch_array($query);
    $this->set_idTipoUsuario($registro['idTipoUsuario']);
    $this->set_dsTipoUsuario($registro['dsTipoUsuario']);
  }

  /**
   * Getters
   */
  function get_idTipoUsuario(){
    return $this->idTipoUsuario;
  }

  function get_dsTipoUsuario(){
    return $this->dsTipoUsuario;
  }

  /**
   * Setters
   */
  function set_idTipoUsuario($id){
    $this->idTipoUsuario = $id;
  }

  function set_dsTipoUsuario($ds){
    $this->dsTipoUsuario = $ds;
  }

}


?>
