<main role="main">
  <div class="jumbotron bg-light">
    <div class="container">
      <h3><center>Ajouter un cours</h3><br>
        <center>Veuillez selectionner la catégorie de votre cours ,<br>ou la créer si elle n'existe pas .</center><br><br>
      <form action="../controller/home_cours.php" method="GET">
        <?php
          if(isset($_GET['success'])){
            echo "<center><font color='green'>Votre catégorie a bien été ajouter </font></center>" ;
          } elseif (isset($_GET['categorie']) && $_GET['categorie'] === "null"){
            echo "<center><font color='red'>Veuillez choisir une categorie </font></center>" ;
          }
        ?>
        <div class="input-group">
          <select class="custom-select" id="menu1" name="categorie" id="categorie" >
            <option selected>Catégorie</option>
            <?php
              include("../controller/home_cours_choix_categorie_afficher_select.php");
            ?>
          </select>
          <div class="input-group-append">
          <a class="btn btn-outline-secondary btn-block" href='../controller/home_cours.php?ajouter=categorie' type="button" >Créer une nouvelle Catégorie </a>
          </div>
        </div>
        <input type='hidden' name='ajouter' value='cours1'>
        <br><br>
        <center><button class="btn btn-primary text-light" role="button">Valider</button></center>
      </form></center><br><br>
    </div>
  </div>
</main>
