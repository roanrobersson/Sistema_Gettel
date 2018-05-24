<?php include 'header.php' ?>





  <div class="container">

    <h2 class="numProtocolo" style="text-align: center; padding-top: 1rem; padding-bottom: 1rem;">
    Criando um novo chamado.
    </h2>

    <form class="form-horizontal">
      <h3>Informações pessoais</h3>
      <hr>

      <div class="form-group row">
        <label class="col-sm-2 control-label text-right" for="nome">Nome completo</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nome" placeholder="Nome e sobrenome" maxlength="45">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 control-label text-right" for="email">E-mail</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" placeholder="nome@exemplo.com" maxlength="45">
        </div>
      </div>
      <div class="blank-space">

      </div>
      <h3>Sua Mensagem</h3>

      <hr>

      <div class="form-group row">
        <label class="col-sm-2 control-label text-right" for="assunto">Assunto</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="assunto" placeholder="Assunto" maxlength="45">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 control-label text-right"  for="categoria">Categoria</label>
        <div class="col-sm-10">
          <select class="form-control" id="categoria">
            <?php foreach ($categorias as $c): ?>
              <option value="<?php echo $c['idCategoria']?>"><?php echo $c['dsCategoria'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 control-label text-right" for="texto">Mensagem</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="texto" rows="12" maxlength="2000"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
          <input type="submit" class="btn btn-primary" value="Enviar chamado">
        </div>
      </div>
    </form>
  </div>

<?php include 'footer.php' ?>
