<?php

  if (isset($_GET)){
    if( isset($_GET['p']) AND isset($_GET['e']) ) {

      $protocolo = $_GET['p'];
      $email = $_GET['e'];

      require_once 'models/Chamado_model.php';
      $chamado = new Chamado($link);
      if($chamado->chamado_existe($protocolo, $email)){
          $chamado->carregar($protocolo);
          $mensagens = $chamado->get_mensagens();

        require 'chamado_view_buscar.php';


      }else {
        header('Location: index.php?error=register_not_found');
      }

    }else{
      header('Location: index.php');
    }

  }else{
    header('Location: index.php');
  }

?>
