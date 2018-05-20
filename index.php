<?php


  $link = mysqli_connect(
    "ads.ideau.com.br", "uProjetoIDEAU",
    "Pr0j3t0IDEAUA!B@C#", "dbRoan"
  );

  $acao = 'vazio';

  if (isset($_GET)) if (isset($_GET['a'])) {
    $a = $_GET['a'];
    if ($a=="a") $acao = 'adicionar';
    if ($a=="b") $acao = 'buscar';
  }

  echo '$_GET = '; var_dump($_GET);
  echo '<br>';
  echo '$_POST = '; var_dump($_POST);

  if ($acao=="vazio") {
    require 'chamado_view_inicial.php';
  }

  if ($acao=="adicionar") {
    require 'chamado_controller_adicionar.php';
  }

  if ($acao=="buscar") {
    require 'chamado_controller_buscar.php';
  }


  mysqli_close($link);
