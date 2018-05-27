<?php
  ini_set('session.cookie_lifetime', 3600); // Tempo que a conta vai permanecer logada
  session_start();


  if (isset($_POST)) {
    //Tentativa de login
    if (isset($_POST['login']) AND
        isset($_POST['senha'])){

        $login = $_POST['login'];
        $senha = $_POST['senha'];

        require_once 'models/UsuarioFuncionario_Model.php';
        $UsuarioFuncionario = new UsuarioFuncionario($link);
        $idUsuarioLogado = $UsuarioFuncionario->validarLogin($login, $senha);

        if ( $idUsuarioLogado != "" ) {
          $_SESSION['idUsuario'] = $idUsuarioLogado;
      } else{
        header('Location: ?a=adm&error=account_not_found');
      }
      //Envia mensagem no chamado
    }else if( isset($_POST['texto']) AND
              isset($_POST['idUsuario']) AND
              isset($_POST['idChamado'])) {

        $texto = $_POST['texto'];
        $idUsuario = $_POST['idUsuario'];
        $idChamado = $_POST['idChamado'];

        require_once 'models/Mensagem_model.php';
        $Mensagem = new Mensagem($link);
        $Mensagem->criarMensagem($texto, $idChamado, $idUsuario);

      }
  }


  if (isset($_GET) AND isset($_SESSION['idUsuario'])){
    //Deslogar
    if (isset($_GET['f'])) {
      if ($_GET['f'] == "logout"){
        unset($_SESSION['idUsuario']);
      }
    //Carrega o chamado e mostra as mensagens
    }else if( isset($_GET['p']) ) {
      $protocolo = $_GET['p'];

      require_once 'models/Chamado_model.php';
      $chamado = new Chamado($link);
      $chamado->carregar($protocolo);
      $mensagens = $chamado->get_mensagens();
      require 'views/chamado_view_adm_buscar.php';

      //Filtrar chamados resolvidos
    } else if (isset($_GET['filter'])) {
          if ($_GET['filter'] == "show_resolvidos"){
            $filtro = "show_resolvidos";
          }

    }
  }




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

  //Se o usuario nao logou
  if ($idUsuarioLogado == "") {

    require 'views/chamado_view_adm_login.php';

  //Se o usuario logou
  } else {

    require_once 'models/Chamado_model.php';
    $Chamado = new Chamado($link);
    $chamados = $Chamado->carregarTodos();
    require 'views/chamado_view_adm_lista.php';

  }



  ?>
