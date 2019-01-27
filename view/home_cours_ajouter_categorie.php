<main role="main">
  <div class="jumbotron bg-light">
    <div class="container">
      <h3><center>Créer une catégorie</h3><br>
      <form action="../controller/home_cours_ajouter_categorie.php" method="GET">
        Nom de la catégorie
        <?php
          if(isset($erreur)){
            echo "<font color='red'>Veuillez remplire le champs nom </font>" ;
          }
        ?>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name='nom' value=''></textarea>
        Description de la catégorie
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name='description' value=''></textarea><br>
        <center><button class="btn btn-primary text-light" role="button">Valider</button></center>
      </form>
    </div>
  </div>
</main>
