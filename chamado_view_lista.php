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






<?php include 'footer.php'; ?>
