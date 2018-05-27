<?php include 'header.php' ?>


  <h1 class="numProtocolo" style="text-align: center; padding-top: 1rem; padding-bottom: 1rem;">
  Entrando como administrador.
</h1>

<?php if(isset($_GET))
        if(isset($_GET['error'])) {
          $error = $_GET['error'];

          if($error = 'account_not_found  '){?>
            <div class="msgErro">
              <?php echo 'Login ou senha incorretos! Tente novamente.';  ?>
            </div><?php
          }
        } ?>

  <div class="container">
    <!-- Corpo -->
    <div class="row corpo">


      <!-- Coluna esquerda -->
      <div class="col-md-12 mr-auto">
        <div class="row h-100 justify-content-center align-content-center">

          <div class="col-md-5 ">

            <form method="POST" action="">
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
