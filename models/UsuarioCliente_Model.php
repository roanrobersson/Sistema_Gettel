<?php
  require_once 'Usuario_model.php';

/**
 * UsuarioCliente
 */
class UsuarioCliente extends Usuario
{
  protected $email;

  /**
  * Getters
  */
  function get_email(){
    return $this->email;
  }

  /**
  * Setters
  */
  function set_email($e){
    $this->email = $e;
  }

  function criarUsuarioCliente($nmUsuario, $email){
    //INSERT NA TABELA Usuario
    $sql = "INSERT INTO Usuario(idTipoUsuario, nmUsuario)
            VALUES
            ('C', '$nmUsuario');
           ";
    $query = mysqli_query($this->link, $sql);

    $idUsuarioCriado = mysqli_insert_id($this->link);

    //INSERT NA TABELA UsuarioCliente
    $sql = "INSERT INTO UsuarioCliente(idCliente, email)
            VALUES
            ('$idUsuarioCriado', '$email');
           ";
    $query = mysqli_query($this->link, $sql);

    return $idUsuarioCriado;

  }

  //Implementacao de classe abstrata
  function usuarioExiste($id){

  }

}














?>
