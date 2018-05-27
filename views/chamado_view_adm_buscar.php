<?php include 'header.php' ?>




      <!-- Corpo header-->
      <div class="container">

        <h1 class="numProtocolo" style="text-align: center; padding-top: 1rem; padding-bottom: 1rem;">
        Chamado: <?php echo $chamado->get_idChamado()?>
        </h1>

        <div class="blank-space"></div>

        <div class="border bg-blueGettel" style="padding: 1rem; color: white;">
          <div class="row assunto">
              <div class="col-md-12 assunto">
                <h3><?php echo $chamado->get_Assunto()?></h3>
              </div>
          </div>

          <hr class="linha-branca" style="border-color:white;"></hr>

          <div class="row assunto">
            <div class="col-md-4 assunto text-center">
              <p>Data de criação:</p>
              <h4><?php echo date('d/m/Y H:i:s', strtotime($chamado->get_dtChamado()));?></h4>
            </div>

            <div class="col-md-4 assunto text-center">
              <p>Categoria:</p>
              <h4><?php echo $chamado->get_dsCategoria()?></h4>
            </div>

            <div class="col-md-4 assunto text-center">
              <p>Mensagens:</p>
              <h4><?php echo $chamado->get_countMensagens()?></h4>
            </div>

          </div>
        </div>



      <!-- Mensagem -->
      <?php foreach ($mensagens as $m): ?>
        <div class="blank-space"></div>
        <div class="container">
          <div class="row border">
              <div class="col-md-3 bg-blueGettel_light" style="overflow: hidden;">
                <h4 style="font-weight: bold;"><?php echo $m['nmUsuario']?></h4>
                  <a href="mailto:<?php echo $m['email']?>"><?php echo $m['email']?></a>
              </div>
              <div class="col-md-9" >
                <p style="text-align: right; margin-bottom: 0; margin-top: 0;" ><?php echo date('d/m/Y H:i:s', strtotime($m['dtMensagem']));?></p>
                <hr style="margin-top: 0;">
                <p style="font-weight: bold;">Mensagem:</p>
                <p><?php echo $m['texto']?></p>
              </div>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="blank-space"></div>

      <form action="" method="POST">
        <input type="hidden" name="idChamado" value="<?php echo $chamado->get_idChamado(); ?>">
        <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['idUsuario'] ?>">

        <div class="form-group row">

          <div class="col-md-10 offset-md-2">
            <label class="control-label text-right" for="texto" style="font-weight: bold;">Nova mensagem:</label>
          </div>
          <div class="col-md-9 offset-md-3">
            <textarea class="form-control" name="texto" id="texto" rows="5" maxlength="2000" required></textarea>
          </div>

          <div class="blank-space"></div>

          <div class="col-md-9 offset-md-3">
            <input type="submit" class="btn btn-primary" value="Enviar">
          </div>

        </div>

      </form>
</div>




<?php include 'footer.php' ?>
