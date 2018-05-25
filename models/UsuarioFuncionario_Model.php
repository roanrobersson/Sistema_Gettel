<?php
  require_once 'Usuario_model.php';

/**
 * UsuarioFuncionario
 */
class UsuarioCliente extends Usuario
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


}

?>
