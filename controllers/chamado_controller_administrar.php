<?php
  ini_set('session.cookie_lifetime', 3600); // Tempo que a conta vai permanecer logada
  session_start();

  $idUsuarioLogado = "";

  //Se existir um cookie e usuario existir
  if (isset($_SESSION)) {
    if (isset($_SESSION['idUsuario'])) {
      $id = $_SESSION['idUsuario'];

      require_once 'models/UsuarioFuncionario_Model.php';
      $UsuarioFuncionario = new UsuarioFuncionario($link);
      if ( $UsuarioFuncionario->usuarioExiste($id) ){
        $idUsuarioLogado = $id;
        $nmUsuarioLogado = $UsuarioFuncionario->pegarNomeUsuario($id);
      }
    }
  }

  if (isset($_POST)) {
    //Tentativa de login
    if (isset($_POST['login']) AND
        isset($_POST['senha'])){

        $login = $_POST['login'];
        $senha = $_POST['senha'];

        require_once 'models/UsuarioFuncionario_Model.php';
        $UsuarioFuncionario = new UsuarioFuncionario($link);
        $idUsuarioLogado = $UsuarioFuncionario->validarLogin($login, $senha);
        $nmUsuarioLogado = $UsuarioFuncionario->pegarNomeUsuario($idUsuarioLogado);
        if ( $idUsuarioLogado != "" ) {
          $_SESSION['idUsuario'] = $idUsuarioLogado;
      } else{
        header('Location: ?a=adm&error=account_not_found');
      }

      //Envia mensagem no chamado
    }if( isset($_POST['texto']) AND
         isset($_POST['idUsuario']) AND
         isset($_POST['idChamado']) AND
         $idUsuarioLogado != ""){

          $texto = $_POST['texto'];
          $idUsuario = $_POST['idUsuario'];
          $idChamado = $_POST['idChamado'];

          require_once 'models/Mensagem_model.php';
          $Mensagem = new Mensagem($link);
          $Mensagem->criarMensagem($texto, $idChamado, $idUsuario);
        }

  }



  $operacao = 'listarChamados';

  if(isset($_GET)){
    if ($idUsuarioLogado != ""){

      if(isset($_GET['o'])){
      $o = $_GET['o'];

        if ($o == 'lo'){
          unset($_SESSION['idUsuario']);
          $operacao = 'login';
        }
        if ($o == 'lm'){
           $operacao = 'listarMensagens';
         }
      }

    }else{
      $operacao = 'login';
    }
  }



    //#######################################################


    if ($operacao == "listarMensagens") {
      $protocolo = $_GET['p'];
      require_once 'models/Chamado_model.php';
      $chamado = new Chamado($link);
      $chamado->carregar($protocolo);
      $mensagens = $chamado->get_mensagens();
      require 'views/chamado_view_adm_buscar.php';
    }

    if ($operacao == "listarChamados") {
      require_once 'models/Chamado_model.php';
      $Chamado = new Chamado($link);
      $chamados = $Chamado->carregarTodos();
      require 'views/chamado_view_adm_lista.php';
    }

    if ($operacao == "login") {
        require 'views/chamado_view_adm_login.php';
    }


    /*
      //Filtrar chamados resolvidos
    if (isset($_GET['filter'])) {
          if ($_GET['filter'] == "show_resolvidos"){
            $filtro = "show_resolvidos";
          }
        }

    */




  ?>
