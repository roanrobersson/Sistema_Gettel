<?php


  if (isset($_POST)){
    if( isset($_POST['nmUsuario']) AND
        isset($_POST['email']) AND
        isset($_POST['assunto']) AND
        isset($_POST['categoria']) AND
        isset($_POST['mensagem'])
      ) {

      $nmUsuario = $_POST['nmUsuario'];
      $email = $_POST['email'];
      $assunto = $_POST['assunto'];
      $categoria = $_POST['categoria'];
      $mensagem = $_POST['mensagem'];



      //require_once 'models/Chamado_model.php';
      //$chamado = new Chamado($link);

  }

  require_once 'models/CategoriaChamado_model.php';
  $CategoriaChamado = new CategoriaChamado($link);
  echo 'ROANNNNNNN' . var_dump($categorias);
  $categorias = $CategoriaChamado->carregarTodas();

  include 'chamado_view_adicionar.php'
?>
