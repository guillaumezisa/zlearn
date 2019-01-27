<main role="main">
  <div class="jumbotron bg-light">
    <div class="container">
      <h3><center>Créer une sous catégorie</h3><br>
      <form action="../controller/home_cours_ajouter_sous_categorie.php" method="GET">
        <select class="custom-select" id="inputGroupSelect04" name="categorie">
          <?php
            include("../controller/home_cours_ajouter_sous_categorie_afficher_select.php");
          ?>
        </select>
        Nom de la Sous Catégorie
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name='nom' value=''></textarea>
        Description de la Sous Catégorie
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name='description' value=''></textarea><br>
        <center><button class="btn btn-primary text-light" role="button">Valider</button></center>
      </form>
    </div>
  </div>
</main>
