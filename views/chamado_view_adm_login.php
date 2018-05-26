<?php include 'header.php' ?>


  <h2 class="numProtocolo" style="text-align: center; padding-top: 1rem; padding-bottom: 1rem;">
  Entrando como administrador.
  </h2>

  <div class="container">
    <!-- Corpo -->
    <div class="row corpo">


      <!-- Coluna esquerda -->
      <div class="col-md-12 mr-auto">
        <div class="row h-100 justify-content-center align-content-center">

          <div class="col-md-5 ">

            <form method="POST" action="chamado_controller_administrar.php">
              <input type="hidden" name="a" value="b">
              <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login" id="login" placeholder="Login"required="required" maxlength="45">
              </div>
              <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required="required" maxlength="45">
              </div>
              <input type="submit" class="btn btn-primary" value="Entrar">
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>



<?php include 'footer.php' ?>
