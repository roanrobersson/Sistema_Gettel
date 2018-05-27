<?php

  $link = mysqli_connect(
    "ads.ideau.com.br", "uProjetoIDEAU",
    "Pr0j3t0IDEAUA!B@C#", "dbRoan"
  );

  mysqli_set_charset($link, 'utf8');

  $acao = 'vazio';

  if (isset($_GET)) if (isset($_GET['a'])) {
    $a = $_GET['a'];
    if ($a=="a") $acao = 'adicionar';
    if ($a=="b") $acao = 'buscar';
    if ($a=='adm') $acao = 'administrar';
  }


  echo '<br>';
  echo '$_GET = '; var_dump($_GET);
  echo '<br>';
  echo '$_POST = '; var_dump($_POST);
  echo '<br>';
  echo '<br>';

  if ($acao=="vazio") {
    require 'views/chamado_view_inicial.php';
  }

  if ($acao=="adicionar") {
    require 'controllers/chamado_controller_adicionar.php';
  }

  if ($acao=="buscar") {
    require 'controllers/chamado_controller_buscar.php';
  }

  if ($acao=="administrar") {
    require 'controllers/chamado_controller_administrar.php';
  }


  mysqli_close($link);
