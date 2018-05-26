<?php
  session_start();
?>


    <?php

      if (isset($_POST)) {
        if (isset($_POST['login']) AND
            isset($_POST['senha'])) {

          $_SESSION['usuario'] = $_POST['login'];

        }
        else if (isset($_POST['a'])) {
          if ($_POST['a'] == "deslogar"){
            unset($_SESSION['usuario']);
          }
        }
      }



      $usuario = "";
      if (isset($_SESSION)) {
        if (isset($_SESSION['usuario'])) {
          $usuario = $_SESSION['usuario'];
        }
      }

      if ($usuario == "") {
        // nao fez login
        require 'views/chamado_view_adm_login.php';



      } else {
        // se tem usuario, entao ele fez login
        echo "Bem vindo, ".$usuario;
        ?>
        <form class="" action="exemplocomsession.php" method="POST">
          <input type="submit" name="a" value="deslogar">
        </form>
        <?php
      }

      ?>
