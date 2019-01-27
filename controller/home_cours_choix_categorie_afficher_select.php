<?php
  require("../model/cours.php");
  $categorie = $bdd_connexion->query($req_all_categorie)->fetchAll();
  for ($i=0; $i < count($categorie); $i++) {
    echo "<option value='".$categorie[$i][0]."'>".$categorie[$i][1]."</option>";
  }
?>
