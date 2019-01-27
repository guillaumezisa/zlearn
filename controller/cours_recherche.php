<?php
  require("../controller/loged_or_not.php");
  require("../controller/bdd_connexion.php");
  if ( isset($_GET['recherche'])){
    $search = strtolower($_GET['recherche']);

    $req_recherche_utilisateurs = "SELECT * FROM utilisateurs";
    $req_recherche_cours = "SELECT * FROM cours";
    $req_recherche_categorie = "SELECT * FROM categorie";
    $req_recherche_sous_categorie = "SELECT * FROM sous_categorie";
    $req_utilisateurs = $bdd_connexion->query($req_recherche_utilisateurs)->fetchAll();
    $req_cours = $bdd_connexion->query($req_recherche_cours)->fetchAll();
    $req_categorie = $bdd_connexion->query($req_recherche_categorie)->fetchAll();
    $req_sous_categorie = $bdd_connexion->query($req_recherche_sous_categorie)->fetchAll();

    for ($i=0; $i < count($req_utilisateurs); $i++) {
      $pseudo = strtolower($req_utilisateurs[$i][3]);
      $description0 = strtolower($req_utilisateurs[$i][8]);
      // ALGO DECOUPAGE DE MOTS CLEF
      $description = explode(" ",$description0);
      for ($y=0; $y < count($description) ; $y++) {
        if ( $search === $pseudo || $search === $description[$y]){
          //trouvé
        }
      }
    }

    for ($i=0; $i < count($req_cours); $i++) {
      $intitule0 = strtolower($req_cours[$i][5]);
      $description0 = strtolower($req_cours[$i][6]);
      // ALGO DECOUPAGE DE MOTS CLEF
      $intitule = explode(" ",$intitule0);
      for ($y=0; $y < count($intitule) ; $y++) {
        if ($search === $intitule[$y]){
          //trouvé
        }
      }
      $description = explode(" ",$description0);
      for ($y=0; $y < count($description) ; $y++) {
        if ($search === $description[$y]){
          //trouvé
        }
      }
    }

    for ($i=0; $i < count($req_categorie); $i++) {
      $nom0 = strtolower($req_categorie[$i][1]);
      $description0 = strtolower($req_categorie[$i][2]);
      // ALGO DECOUPAGE DE MOTS CLEF
      $nom = explode(" ",$nom0);
      for ($y=0; $y < count($nom) ; $y++) {
        if ($search === $nom[$y]){
          //trouvé
        }
      }
      $description = explode(" ",$description0);
      for ($y=0; $y < count($description) ; $y++) {
        if ($search === $description[$y]){
          //trouvé
        }
      }
    }

    for ($i=0; $i < count($req_sous_categorie); $i++) {
      $nom0 = strtolower($req_sous_categorie[$i][2]);
      $description0 = strtolower($req_sous_categorie[$i][3]);
      // ALGO DECOUPAGE DE MOTS CLEF
      $nom = explode(" ",$nom0);
      for ($y=0; $y < count($nom) ; $y++) {
        if ($search === $nom[$y]){
          //trouvé
        }
      }
      $description = explode(" ",$description0);
      for ($y=0; $y < count($description) ; $y++) {
        if ($search === $description[$y]){
          //trouvé
        }
      }
    }
  }else {
    header("../controller/home_cours.php");
  }
?>
