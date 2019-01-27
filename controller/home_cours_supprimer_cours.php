<?php
  require("../view/home_cours_header.php");
  require("../controller/loged_or_not.php");
  require("../controller/bdd_connexion.php");
  ?>
  <main role="main">
    <div class="jumbotron bg-light">
      <div class="container">
        <?php
          if ( isset ($_GET['supprimer']) && $_GET['supprimer'] === 'cours'){
            if ( $_GET['id'] === $_SESSION['id']){
              require("../model/cours.php");
              $req_supprimer = $bdd_connexion->prepare($req_supprimer_cours);
              $req_supprimer->execute();
              header("location:../controller/home_cours.php?supprimer=cours");
            }
          }else{
          echo "<br><center>Voulez vous vraiment supprimé ce cours , vous ne pourrez plus le récupérer ?</center><br>";
          echo "
                  <div class='container'>
                    <div class='row'>
                      <div class='col-3'>
                      </div>
                      <div class='col-3'>
                        <form action='../controller/home_cours_supprimer_cours.php' method ='GET'>
                          <button type'button' class='btn btn-secondary bnt-lg btn-block'>Oui</button>
                          <input type='hidden' name='categorie' value='".$_GET['categorie']."'>
                          <input type='hidden' name='sous_categorie' value='".$_GET['sous_categorie']."'>
                          <input type='hidden' name='id' value='".$_GET['id']."'>
                          <input type='hidden' name='supprimer' value='cours'>
                        </form>
                      </div>
                      <div class='col-3'>
                        <form action='../controller/home_cours.php' method ='GET'>
                          <button type'button' class='btn btn-secondary bnt-lg btn-block'>Non</button>
                        </form>
                      </div>
                      <div class='col-3'>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          </main>";
        }
?>
