<main role="main">
      <div class="jumbotron bg-light">
        <div class="container">
          <?php
            if (isset($_GET['success'] ) && $_GET['success'] === "cours" ){
              echo "<center><font color='green'>Votre cours a bien été ajouter </font></center>" ;
            } elseif (isset($_GET['success'] ) && $_GET['success'] === "cours_suivi" ){
              echo "<center><font color='green'>Votre cours a bien été ajouter aux cours suivi .</font></center>" ;
            } else if (isset($_GET['supprimer'] ) && $_GET['supprimer'] === "cours" ){
              echo "<center><font color='green'>Votre cours a bien été supprimé </font></center>" ;
            }
          ?>
          <h3><center>Liste des categories de cours</center></h3><br>
          <?php
            include("../controller/home_cours_afficher_categorie.php");
          ?>
        </div>
      </div>
    </main>
