<?php
  ini_set('session.cookie_lifetime', 3600); // Tempo que a conta vai permanecer logada
  session_start();

  if (isset($_POST)) {
    if (isset($_POST['login']) AND
        isset($_POST['senha'])){

        $login = $_POST['login'];
        $senha = $_POST['senha'];

        require_once 'models/UsuarioFuncionario_Model.php';
        $UsuarioFuncionario = new UsuarioFuncionario($link);
        $idUsuarioLogado = $UsuarioFuncionario->validarLogin($login, $senha);

        if ( $idUsuarioLogado != "" ) {
          $_SESSION['idUsuario'] = $idUsuarioLogado;
      }

    }
    else if (isset($_GET['f'])) {
      if ($_GET['f'] == "logout"){
        unset($_SESSION['idUsuario']);
      }
    }
  }

  $idUsuarioLogado = "";

  //Se existir um cookie e seu usuario existir
  if (isset($_SESSION)) {
    if (isset($_SESSION['idUsuario'])) {
      $id = $_SESSION['idUsuario'];

      require_once 'models/UsuarioFuncionario_Model.php';
      $UsuarioFuncionario = new UsuarioFuncionario($link);
      if ( $UsuarioFuncionario->usuarioExiste($id) ){
        $idUsuarioLogado = $id;
      }

    }
  }

  //Se o usuario nao logou
  if ($idUsuarioLogado == "") {

    require 'views/chamado_view_adm_login.php';

  //Se o usuario logou
  } else {

    require 'views/chamado_view_adm_lista.php';

  }



  ?>
