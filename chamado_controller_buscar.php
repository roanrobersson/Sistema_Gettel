<?php include 'chamado_view_buscar.php' ?>

  <h1>Adicionando Veiculo..</h1>

  <hr />

  <body>
    <form action="?a=v" method="POST">

        <p>
          <label for="placa">Placa:</label>
          <input type="text" name="placa" value="" />
      </p>

      <p>
        <label for="dsVeiculo">Descricao:</label>
        <input type='text' name="dsVeiculo" value="" />
      </p>

      <p>
        <label for="idFabricante">Fabricante:</label>
        <select name="idFabricante">
          <?php foreach ($todos_veiculos as $v) { ?>
            <option value="<?php echo $v['idVeiculo']?>"><?php echo $v['dsVeiculo']?></option>
          <?php } ?>
        </select>
      </p>

      <p>
        <label for="btn_salvarNovo"> </label>
        <input type="submit" name="btn_salvarNovo" value="Salvar">
        <form action="?a=v"> <input type="submit" value="Cancelar"> </form>
      </p>

    </form>

  </body>
</html>
