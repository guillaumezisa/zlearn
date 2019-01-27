<main role="main">
  <div class="jumbotron bg-light">
    <div class="container">
      <h3><center>Ajouter un cours</h3><br>
        <?php
          if ($_GET['categorie'] === "Catégorie"){
            header("location:../controller/home_cours.php?ajouter=cours&categorie=null");
          }
          if(isset($_GET['success'])){
            echo "<center><font color='green'>Votre catégorie a bien été ajouter </font></center>" ;
          } elseif(isset($_GET['sous_categorie']) && $_GET["sous_categorie"] === "null"){
            echo "<font color='red'>Veuillez choisir une sous catégorie .</font>";
          } elseif(isset($_GET['cours']) && $_GET['cours'] === "null"){
            echo "<font color='red'>Veuillez écrire un cours d'au moins 10 chractères vous pourrez le modifier par la suite .</font>";
          } elseif(isset($_GET['nom']) && $_GET['nom'] === "null"){
            echo "<font color='red'>Vous devez donner un nom a votre cours .</font>";
          }
        ?>
      <form action="../controller/home_cours_ajouter_cours.php" method="GET">
        <div class="input-group">
          <select class="custom-select">
            <option selected>
              <?php
                include("../controller/home_cours_ajouter_cours_afficher_select.php");
              ?>
          </select>
          <div class="input-group-append">
            <?php
              echo "<a class='btn btn-outline-secondary btn-block' href='../controller/home_cours.php?ajouter=souscategorie&categorie=".$_GET['categorie']."' type='button' >Créer une Sous Catégorie </a>";
            ?>
          </div>
        </div>
        Nom du cours
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name='nom' value=''></textarea>
        Contenus du cours
        <div class="form-group">
          <textarea class="form-control" rows="17" name='cours' value=''>
            <?php if ( isset($_GET['cours'])){ echo $_GET['cours']; } ?>
          </textarea>
        </div>
        <center><button class="btn btn-primary text-light" href='../controller/home_cours_ajouter_cours.php'role="button">Valider</button></center>
      </form></center>
    </div>
  </div>
</main>
