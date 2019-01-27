<?php
  require("../controller/bdd_connexion.php");
  require("../controller/loged_or_not.php");
  require("../controller/error_display.php");
  if (empty($_GET['nom']) || empty($_GET['categorie'])){
    $erreur = true;
    include("../view/home_cours_header.php");
    include("../view/home_cours_ajouter_categorie.php");
  } else {
    require("../model/cours.php");
    $insert_categorie = $bdd_connexion->prepare($req_insert_add_sous_categorie);
    $insert_categorie->bindParam(':categorie',$categorie);
    $insert_categorie->bindParam(':nom',$nom);
    $insert_categorie->bindParam(':description',$description);

    $categorie = $_GET['categorie'];
    $nom = $_GET['nom'];
    $description = $_GET['description'];

    $insert_categorie->execute();

    $req_select_point= " SELECT score FROM utilisateurs WHERE id_utilisateur = '".$_SESSION['id']."'";
    $point = $bdd_connexion->query($req_select_point)->fetch();
    echo $nouveau_score = $point[0]+25;
    $req_ajouter_point = "UPDATE utilisateurs SET score = '".$nouveau_score."' WHERE id_utilisateur = '".$_SESSION['id']."'" ;
    $ajout_point = $bdd_connexion->prepare($req_ajouter_point);
  	$ajout_point->execute();

    header("location:../controller/home_cours.php?ajouter=cours&success=true");
  }


?>
