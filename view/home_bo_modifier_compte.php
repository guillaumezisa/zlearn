<?php
  include('../view/home_header_admin.php');
  require("../controller/loged_or_not_admin.php");
  require("../controller/bdd_connexion.php");
?>
<body>
  <a class="btn btn-dark text-light" href="../controller/home_bo.php?go=comptes" role="button">Retour</a><br><br>
  <div class="container-fluid bg-secondary"><br><center>
    <?php
      require('../model/bo_compte.php');
      $compte = $bdd_connexion->query($req_modifier_compte)->fetch();
      echo "
        <h2>Modification du compte de ".$compte[3]." :</h2>
          <form action='../controller/home_bo_modifier_compte.php' method=''>
            <br>Nouveau nombre de points:<br>
            <input type='number' name='point' value='".$compte[10]."'><br>
            <input type='hidden' name='id' value='".$_GET['id']."'>
            <button class='btn btn-dark'>Valider</button><br>
          </form>
          <form action='../controller/home_bo_modifier_compte.php' method=''>
            Faire de ce compte un compte admin 0 ou 1:<br>
            <input type='number' name='status' value='".$compte[11]."'><br>
            <input type='hidden' name='id' value='".$_GET['id']."'>
            <button class='btn btn-dark'>Valider</button><br><br>
          </form>
      ";
    ?>
  </div></center>
</body>
</html>
