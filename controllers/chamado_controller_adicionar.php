<?php

  if (isset($_POST)){
    if( isset($_POST['nmUsuario']) AND
        isset($_POST['email']) AND
        isset($_POST['assunto']) AND
        isset($_POST['idCategoria']) AND
        isset($_POST['texto'])
      ) {

      $nmUsuario = $_POST['nmUsuario'];
      $email = $_POST['email'];
      $assunto = $_POST['assunto'];
      $idCategoria = $_POST['idCategoria'];
      $texto = $_POST['texto'];

      require_once 'models/Chamado_model.php';
      $Chamado = new Chamado($link);
      $idChamado = $Chamado->criarChamado($nmUsuario,
                                          $email,
                                          $assunto,
                                          $idCategoria,
                                          $texto
                                          );

      include 'views/chamado_view_numProtocolo.php';



      //require_once 'models/Chamado_model.php';
      //$chamado = new Chamado($link);
    }else {
      require_once 'models/CategoriaChamado_model.php';
      $CategoriaChamado = new CategoriaChamado($link);
      $categorias = $CategoriaChamado->carregarTodas();
      include 'views/chamado_view_adicionar.php';
    }

  }

?>
