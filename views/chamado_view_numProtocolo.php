<?php include 'header.php'; ?>

      <div class="container">
        <!-- Corpo -->
        <div class="row corpo">


          <div class="col-md-12 mr-auto" style="text-align: center; height: 100px;">
            <h1>Seu número de protocolo é: <?php echo $idChamado; ?></h1>
            <h1>Seu e-mail é: <?php echo $email; ?></h1>
          </div>

          <div class="col-md-12 mr-auto" style=" height: 100px;"></div>

          <div class="col-md-12 mr-auto" style="text-align: center; height: 100px;">
            <h2>Guarde esses dados, pois eles serão necessários para consultar seu chamado!</h2>
          </div>

          <div class="col-md-12 mr-auto text-center position-relative">
            <a href="index.php"> <button type="button" name="button" class="btn btn-primary">Voltar ao início</button></a>
          </div>

        </div>

      </div>



<?php include 'footer.php'; ?>
