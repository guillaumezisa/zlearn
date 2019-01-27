<?php
  require("../model/cours.php");
  $categorie = $bdd_connexion->query($req_categorie)->fetch();
  echo $categorie[1];
  $id_categorie = $categorie[0];
  require("../model/cours.php");

echo "</option>
      </select>";

$sous_categorie = $bdd_connexion->query($req_sous_categorie)->fetchAll();
if ( count($sous_categorie) > 0 ){
  echo "<input type='hidden' name='id_categorie' value='".$id_categorie."'>
          <div class='input-group-append'>
          </div>
        </div>
        <div class='input-group'><div id='demo'></div>
          <select class='custom-select' name='id_sous_categorie'>
          <option selected>Sous catégorie</option>";

  require("../model/cours.php");
  $sous_categorie = $bdd_connexion->query($req_sous_categorie)->fetchAll();
  for ($i=0; $i < count($sous_categorie); $i++) {
    echo "<option value='".$sous_categorie[$i][0]."'>".$sous_categorie[$i][2]."</option>";
  }
} else {
  echo "<input type='hidden' name='id_categorie' value='".$id_categorie."'>
          <div class='input-group-append'>
          </div>
        </div>
        <div class='input-group'><div id='demo'></div>
          <select class='custom-select' name='id_sous_categorie'>
          <option selected>Il n'y a pas de sous catégorie pour cette categorie.</option>";
}
?>
