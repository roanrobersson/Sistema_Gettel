<?php


class Chamado
{

  protected $link;
  protected $idFabricante;
  protected $nmFabricante;

  function __construct($linkglobal)
  {
    $this->link = $linkglobal;
  }

  function getIdFabricante()
  {
    return $this->idFabricante;
  }

  function setIdFabricante($valor)
  {
    $this->idFabricante = $valor;
  }

  function getNmFabricante() {
    return $this->nmFabricante;
  }

  function setNmFabricante($valor) {
    $this->nmFabricante = $valor;
  }


  function salvar(){
    $idFabricante = $this->idFabricante;
    $nmFabricante = $this->nmFabricante;
    $sql = "UPDATE Fabricante
            SET nmFabricante = '$nmFabricante'
            WHERE idFabricante = '$idFabricante'
            ";
    return mysqli_query($this->link, $sql);
  }

  function carrega($id) {
    $sql = "SELECT * FROM Fabricante WHERE idFabricante = $id";
    $query = mysqli_query($this->link, $sql);
    $registro = mysqli_fetch_array($query);
    $this->setIdFabricante($registro['idFabricante']);
    $this->setNmFabricante($registro['nmFabricante']);
  }

  function todos() {
    $sql = "SELECT * FROM Fabricante";
    $query = mysqli_query($this->link, $sql);
    $resultado = array();

    while ($registro = mysqli_fetch_array($query)) {
      $resultado[] = $registro;

    }
    return $resultado;
  }

  function excluir($id){
    $sql = "DELETE FROM Fabricante
            WHERE idFabricante='$id'";

    return ( $query = mysqli_query($this->link, $sql) );
  }

  function adicionar(){
    $idFabricante = $this->idFabricante;
    $nmFabricante = $this->nmFabricante;
    $sql = "INSERT INTO Fabricante (idFabricante, nmFabricante)
            VALUES ('$idFabricante', '$nmFabricante')
            ";
    return mysqli_query($this->link, $sql);
  }

/* ################################################# */

  function validar_dados ($p, $e){
    $sql = "SELECT idChamado FROM Chamado
            JOIN UsuarioCliente ON Chamado.idUsuarioCriador = UsuarioCliente.idCliente
            WHERE Chamado.idChamado = '$p' AND UsuarioCliente.email = '$e'
            ";
    $query = mysqli_query($this->link, $sql);
    $result = mysqli_fetch_array($query);
    if ( $result ){
      return true;
    }else return false;

  }




}
