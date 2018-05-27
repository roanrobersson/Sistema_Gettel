<?php include 'header.php'; ?>
<div class="row">
  <div class="col-sm-12 mr-auto">
    <h3 class="bg-blueGettel_light" style="padding-left: 2rem; ">Você está logado como: <?php echo $nmUsuarioLogado ?></h3>
  </div>
  <div class="col-sm-12 mr-auto">
    <h1 class="" style="text-align: center">Lista de chamados:</h1>
  </div>
</div>

  <!-- Corpo-->
  <div class="container">
    <div class="row">



      <?php foreach ($chamados as $c): ?>
          <a href="?a=adm&p=<?php echo $c['idChamado']?>" class="col-md-12 col-lg-4" style="overflow: hidden;">
            <button type="button" class="btn btn-primary" style=" margin: 1rem; padding: 1rem; width: 100%;">
              <h2><?php echo $c['idChamado']; ?></h2>
              <p>Assunto: <?php echo $c['assunto']; ?></p>
              <p>Cliente: <?php echo $c['nmUsuario']; ?></p>
            </button>
          </a>
      <?php endforeach; ?>


    </div>
  </div>

<?php include 'footer.php'; ?>
