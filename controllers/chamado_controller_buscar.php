<?php
  if(isset($_POST)) {
    if( isset($_POST['texto']) ) {

      $texto = $_POST['texto'];

      //$Chamado = new Chamado($this->link);
      //$Chamado->criarMensagem($texto, $idChamado, $idUsuarioCriador);
      /*
      ESTAVA ARRUMANDO AQUI
      */
    }
  }

  if (isset($_GET)){
    if( isset($_GET['p']) AND isset($_GET['e']) ) {

      $protocolo = $_GET['p'];
      $email = $_GET['e'];

      require_once 'models/Chamado_model.php';
      $chamado = new Chamado($link);
      if($chamado->chamado_existe($protocolo, $email)){
          $chamado->carregar($protocolo);

          $mensagens = $chamado->get_mensagens();
          require 'views/chamado_view_buscar.php';

      } else{
        header('Location: index.php?error=register_not_found');
      }

    } else{
      header('Location: index.php');
    }

  } else{
    header('Location: index.php');
  }

?>
