<?php include 'header.php' ?>



      <div class="container border">
        <!-- Corpo -->
        <div class="row corpo">

          <!-- Coluna esquerda -->
          <div class="col-md-6 border mr-auto">
            <div class="row h-100">

              <h1 class="col-md-12 align-self-start text-center">Consulte seu chamado:</h1>

              <div class="col-md-12 position-relative">

                <form method="POST" action="chamado_controller_buscar.php">
                  <div class="form-group">
                    <label for="protocolo">Número de protocolo</label>
                    <input type="text" class="form-control" id="protocolo" placeholder="Número">
                  </div>
                  <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="E-mail">
                  </div>
                  <button type="submit" class="btn btn-primary">Consultar</button>
                </form>
                
              </div>
            </div>
          </div>

          <!-- Coluna direita -->
          <div class="col-md-6 border ml-auto">
            <div class="row h-100">

              <h1 class="col-md-12 align-self-start text-center">Abra um chamado:</h1>

              <div class="col-md-12 text-center position-relative">

                <a class="btn btn-primary" href="chamado_controller_adicionar.php">Novo chamado</a>

              </div>

            </div>
          </div>
        </div>

      </div>




<?php include 'footer.php' ?>
