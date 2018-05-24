<?php

/**
 * CategoriaChamado
 */
class CategoriaChamado{

  protected $link;
  protected $idCategoria;
  protected $dsCategoria;

  function __construct($linkGlobal){
    $this->link = $linkGlobal;
  }

  /*
  function carregar($id){
    $sql = "SELECT * FROM CategoriaChamado WHERE idCategoria = $id";
    $query = mysqli_query($this->link, $sql);
    $registro = mysqli_fetch_array($query);
    $this->set_idCategoria($registro['idCategoria']);
    $this->set_dsCategoria($registro['dsCategoria']);
  }
  /*

  /**
   * Getters
   */
  function get_idCategoria(){
    return $this->idCategoria;
  }

  function get_dsCategoria(){
    return $this->dsCategoria;
  }

  /**
   * Setters
   */
  function set_dsCategoria($ds){
    $this->dsCategoria = $ds;
  }

  function set_idCategoria($id){
    $this->idCategoria = $id;
  }


  function carregarTodas(){
    $sql = "SELECT * FROM CategoriaChamado";
    $query = mysqli_query($this->link, $sql);
    $registro = mysqli_fetch_array($query);
    
    while( $registro = mysqli_fetch_array($qry))
    {
      $resultado[] = $registro;
    }

    return $resultado;
  }


}

 ?>
