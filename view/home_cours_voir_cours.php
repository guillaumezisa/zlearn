<main role="main">
  <div class="jumbotron bg-light">
    <div class="container">
      <h3><center>Mes cours</center></h3><br>
      <?php
      require("../controller/bdd_connexion.php");
      require("../model/cours.php");
      require("../controller/error_display.php");
      $cours = $bdd_connexion->query($req_voir_mes_cours)->fetchAll();
      if ( count($cours) > 0 ){
        for ($i=0; $i < count($cours); $i++) {
          $cours_categorie = $bdd_connexion->query($req_voir_mes_cours_categorie)->fetch();
          $cours_sous_categorie = $bdd_connexion->query($req_voir_mes_cours_sous_categorie_and_categorie)->fetch();
          if (isset($_GET['success']) && $_GET['success'] === $cours[$i][0] ){
            echo "<center><font color='green'>Votre cours a bien été modifier </font></center>" ;
          }
          echo "<div class='container border bg-info '><br>
                  <div class='row'>
                  <div class='col-sm border-right'>
                    Catégorie : ".$cours_categorie[1]."
                  </div>
                  <div class='col-sm border-right'>
                    Sous catégorie : ".$cours_sous_categorie[0]."
                  </div>
                  <div class='col-sm border-right'>
                    Intitulé : ".$cours[$i][5]."
                  </div>
                  <div class='col-sm border-left'>
                    Date : ".$cours[$i][4]."
                  </div>
                </div><br>
              </div>";
          echo "<div class='form-group'>
                  <form action='../controller/home_cours_modifier_cours.php' method ='GET'>
                  <textarea class='form-control' rows='15' name='cours' value=''>".$cours[$i][6]."</textarea>
                </div>
                <div class='btn-group' role='group' aria-label='Basic example'>

                    <button type'button' class='btn btn-secondary'>Modifier</button>
                    <input type='hidden' name='id_cours' value='".$cours[$i][0]."'>
                  </form>
                  <form action='../controller/home_cours_supprimer_cours.php' method ='GET'>
                    <button type'button' class='btn btn-secondary'>Supprimer</button>
                    <input type='hidden' name='categorie' value='".$cours[$i][2]."'>
                    <input type='hidden' name='sous_categorie' value='".$cours[$i][3]."'>
                    <input type='hidden' name='id' value='".$_SESSION['id']."'>
                  </form>
                </div><br><br>
                <svg height='25px'width='100%'>
                  <line x1='0' y1='0' x2='2000' y2='0' style='stroke:rgb(255,0,0);stroke-width:2' />
                </svg>";
        }
      } else {
        echo "Vous n'avez encore ajouté aucun cours .";
      }
      ?>
    </div>
  </div>
</main>
