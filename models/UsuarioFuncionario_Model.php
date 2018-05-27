<?php
  require_once 'Usuario_model.php';

/**
 * UsuarioFuncionario
 */
class UsuarioFuncionario extends Usuario
{
  protected $login;
  protected $senha;

  /**
  * Getters
  */
  function get_login(){
    return $this->login;
  }

  function get_senha(){
    return $this->senha;
  }

  /**
  * Setters
  */
  function set_login($l){
    $this->login = $l;
  }

  function set_senha($s){
    $this->senha = $s;
  }

  function criarUsuarioFuncionario(){

  }

  //Implementacao de classe abstrata
  function usuarioExiste($id){
    $sql = "SELECT * FROM UsuarioFuncionario
            WHERE idFuncionario = '$id';
           ";
    $query = mysqli_query($this->link, $sql);
    $result = mysqli_fetch_array($query);
    if ( $result ){
       return true;
     }else return false;
  }

  function validarLogin($login, $senha){
    $sql = "SELECT * FROM UsuarioFuncionario
            WHERE login = '$login' AND senha = '$senha';
           ";
    $query = mysqli_query($this->link, $sql);
    $result = mysqli_fetch_array($query);
    if ( $result ){
       return $result['idFuncionario'];
     }else return "";
  }

  function pegarNomeUsuario($id){
    $sql = "SELECT * FROM Usuario
            WHERE idUsuario = '$id';
           ";
    $query = mysqli_query($this->link, $sql);
    $result = mysqli_fetch_array($query);
    return $result['nmUsuario'];
  }


}

?>
