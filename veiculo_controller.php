<?php

  $mensagem = "";

  if (isset($_POST))
    #SALVA REGOSTRO NOVO
    if(isset($_POST['btn_salvarNovo']))
    {
      $idVeiculo = $_POST['idVeiculo'];
      $placa = $_POST['placa'];
      $dsVeiculo = $_POST['dsVeiculo'];
      $idFabricante = $_POST['idFabricante'];

      require_once 'veiculo_model.php';
      $Veiculo  = new Veiculo($link);

      $Veiculo->placa = $placa;
      $Veiculo->dsVeiculo = $dsVeiculo;

      $Veiculo->adicionar($idFabricante);

      if ($Veiculo->salva()) $mensagem = "Salvo com sucesso!";
      else $mensagem = "Erro ao salvar o veiculo";
    //SALVA REGISTRO EDITADO
    }else if(isset($_POST['btn_salvarEditado'])){
      $idVeiculo = $_POST['idVeiculo'];
      $placa = $_POST['placa'];
      $dsVeiculo = $_POST['dsVeiculo'];

      require_once 'veiculo_model.php';
      $Veiculo  = new Veiculo($link);
      $Veiculo->carrega($idVeiculo);

      $Veiculo->placa = $placa;
      $Veiculo->dsVeiculo = $dsVeiculo;

      if ($Veiculo->salva()) $mensagem = "Salvo com sucesso!";
      else $mensagem = "Erro ao salvar o veiculo";
    //EXCLUI REGISTRO
    }else if(isset($_POST['btn_excluir'])){
      $idVeiculo = $_POST['idVeiculo'];

      require_once 'veiculo_model.php';
      $Veiculo  = new Veiculo($link);
      $Veiculo->carrega($idVeiculo);

      if ($Veiculo->excluir($idVeiculo)) $mensagem = "Excluido com sucesso!";
      else $mensagem = "Erro ao excluir o veiculo";
    }

  $operacao = 'listar';

  if(isset($_GET))
    if(isset($_GET['o']))
    {
      $o = $_GET['o'];
      if ($o == 'c') $operacao = 'adicionar';
      if ($o == 'r') $operacao = 'listar';
      if ($o == 'u') $operacao = 'editar';
      if ($o == 'd') $operacao = 'excluir';
    }

    if($operacao=='listar')
    {
      require_once 'veiculo_model.php';
      $Veiculo = new Veiculo($link);
      $todos_veiculos = $Veiculo->carrega_todos();
      require 'veiculo_view_listar.php';
    }

    if($operacao=='editar')
    {
      $id = $_GET['id'];
      require_once 'veiculo_model.php';
      $Veiculo = new Veiculo($link);
      $Veiculo->carrega($id);

      require 'veiculo_view_editar.php';
    }

    if($operacao=='excluir')
    {
      $id = $_GET['id'];
      require_once 'veiculo_model.php';
      $Veiculo = new Veiculo($link);
      $Veiculo->carrega($id);

      require 'veiculo_view_excluir.php';
    }

    if($operacao=='adicionar')
    {
      require_once 'veiculo_model.php';
      $Veiculo = new Veiculo($link);
      $todos_veiculos = $Veiculo->carrega_todos();
      require 'veiculo_view_adicionar.php';
    }

?>
