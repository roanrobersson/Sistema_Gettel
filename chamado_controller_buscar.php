<?php

  if (isset($_GET)){
    if( isset($_GET['p']) AND isset($_GET['e']) ) {

      $protocolo = $_GET['p'];
      $email = $_GET['e'];

      require_once 'chamado_model.php';
      $chamado = new Chamado($link);
      if($chamado->validar_dados($protocolo, $email)){

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
