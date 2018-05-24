<?php include 'header.php' ?>





  <div class="container">

    <form class="form-horizontal">
      <h3>Informações pessoais</h3>
      <hr>

      <div class="form-group row">
        <label class="col-sm-2 control-label text-right" for="inputNome">Nome completo</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputNome" placeholder="Nome e sobrenome">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 control-label text-right" for="inputEmail">E-mail</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail" placeholder="nome@exemplo.com">
        </div>
      </div>
      <div class="blank-space">

      </div>
      <h3>Sua Mensagem</h3>

      <hr>

      <div class="form-group row">
        <label class="col-sm-2 control-label text-right" for="inputAssunto">Assunto</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputAssunto" placeholder="Assunto">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 control-label text-right"  for="selectCategoria">Categoria</label>
        <div class="col-sm-10">
          <select class="form-control" id="selectCategoria">

            <?php foreach ($categorias as $c): ?>
              <option><?php echo $c['dsCategoria'] ?></option>
            <?php endforeach; ?>






          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 control-label text-right" for="txtAreaMensagem">Mensagem</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="txtAreaMensagem" rows="12"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
          <button type="button" class="btn btn-secondary">Enviar chamado</button>
        </div>
      </div>
    </form>
  </div>

<?php include 'footer.php' ?>
