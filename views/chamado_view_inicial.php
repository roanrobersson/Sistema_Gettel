<?php include 'header.php'; ?>

      <?php if(isset($_GET))
              if(isset($_GET['error'])) {
                $error = $_GET['error'];

                if($error = 'register_not_found'){?>
                  <div class="msgErro">
                    <?php echo 'Chamado não encontrado! Tente novamente.';  ?>
                  </div><?php
                }
              } ?>

      <div class="container border">
        <!-- Corpo -->
        <div class="row corpo">


          <!-- Coluna esquerda -->
          <div class="col-md-6 border mr-auto">
            <div class="row h-100">

              <h1 class="col-md-12 align-self-start text-center">Consulte seu chamado:</h1>

              <div class="col-md-12 position-relative">

                <form method="GET" action="">
                  <input type="hidden" name="a" value="b">
                  <div class="form-group">
                    <label for="protocolo">Número de protocolo</label>
                    <input type="text" class="form-control" name="p" id="protocolo" placeholder="Número"required="required" maxlength="11">
                  </div>
                  <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="e" id="email" placeholder="E-mail" required="required" maxlength="45">
                  </div>
                  <input type="submit" class="btn btn-primary" value="Consultar">
                </form>


              </div>
            </div>
          </div>

          <!-- Coluna direita -->
          <div class="col-md-6 border ml-auto">
            <div class="row h-100">

              <h1 class="col-md-12 align-self-start text-center">Abra um chamado:</h1>

              <div class="col-md-12 text-center position-relative">

                <a href="?a=a"> <button type="button" name="button" class="btn btn-primary">Novo chamado</button></a>

              </div>

            </div>
          </div>
        </div>

      </div>




<?php include 'footer.php'; ?>
