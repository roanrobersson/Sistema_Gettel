<?php

/**
 * Mensagem
 */
class Mensagem
{
  protected $link;

  protected $idMensagem;
  protected $texto;
  protected $dtMensagem;
  protected $nmUsuario;
  protected $idUsuario;

  function __construct($linkGlobal){
    $this->link = $linkGlobal;
  }

  /*
  function carrega($id){

    $sql = "SELECT * FROM Mensagem WHERE idMensagem = $id";
    $query = mysqli_query($this->link, $sql);
    $registro = mysqli_fetch_array($query);
    $this->set_idMensagem($registro['idMensagem']);
    $this->set_texto($registro['texto']);
    $this->set_dtMensagem($registro['dtMensagem']);

    $this->Chamado = new Chamado($link);
    $this->Chamado->carregar($registro['idFabricante']);

    $this->Usuario = new Usuario($link);
    $this->Usuario->carregar($registro['idUsuario']);
  }
  */

  /**
   * Getters
   */
  function get_idMensagem(){
    return $this->idMensagem;
  }

  function get_texto(){
    return $this->texto;
  }

  function get_dtMensagem(){
    return $this->dtMensagem;
  }

  function get_idChamado(){
    return $this->Chamado->get_idChamado();
  }

  function get_idUsuario(){
    return $this->Usuario->get_idUsuario();
  }

  /**
   * Setters
   */
  function set_idMensagem($id){
    $this->idMensagem = $id;
  }

  function set_texto($txt){
    $this->texto = $txt;
  }

  function set_dtMensagem($dt){
    $this->dtMensagem = $dt;
  }

  function criarMensagem($texto, $idChamado, $idUsuario){
    $sql = "INSERT INTO Mensagem(texto, dtMensagem, idChamado, idUsuario)
            VALUES
            ('$texto', current_timestamp(), '$idChamado', '$idUsuario');
            ";
    $qry = mysqli_query($this->link, $sql);
    $resultado = array();
  }

  function carregarTodas($idChamado){
    $sql = "SELECT * FROM Mensagem
            JOIN Usuario ON Mensagem.idUsuario = Usuario.idUsuario
            LEFT JOIN UsuarioCliente ON Usuario.idUsuario = UsuarioCliente.idCliente
            LEFT JOIN UsuarioFuncionario ON Usuario.idUsuario = UsuarioFuncionario.idFuncionario
            WHERE idChamado = '$idChamado'
            ORDER BY (dtMensagem);
            ";
    $qry = mysqli_query($this->link, $sql);
    $resultado = array();

    while( $registro = mysqli_fetch_array($qry))
    {
      $resultado[] = $registro;
    }

    return $resultado;
  }





}


 ?>
