<?php
  require("../model/cours.php");
  $categorie = $bdd_connexion->query($req_all_categorie)->fetchAll();
  if (isset($_GET['categorie'])){
    echo "<option selected value='".$categorie[$_GET['categorie']-1][0]."'>".$categorie[$_GET['categorie']-1][1]."</option>";
  } else {
    for ($i=0; $i < count($categorie); $i++) {
      echo "<option selected >Catégorie</option>";
      echo "<option value='".$categorie[$i][0]."'>".$categorie[$i][1]."</option>";
    }
  }
?>
