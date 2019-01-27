<?php
  require("../controller/loged_or_not.php");
  require("../controller/bdd_connexion.php");

  if ( isset($_GET['commentaire']) && isset($_GET['cours']) && isset($_GET['categorie']) && isset($_GET['sous_categorie']) && $_GET['id']){
    $date1 = date("Y-m-d H:i:s");
    require("../model/cours.php");

    $insert_commentaire= $bdd_connexion->prepare($req_insert_commentaire);

    $insert_commentaire -> bindParam(':utilisateur', $_GET['id']);
    $insert_commentaire -> bindParam(':categorie', $_GET['categorie']);
    $insert_commentaire -> bindParam(':sous_categorie', $_GET['sous_categorie']);
    $insert_commentaire -> bindParam(':cours', $_GET['cours']);
    $insert_commentaire -> bindParam(':commentaire', $_GET['commentaire']);
    $insert_commentaire -> bindParam(':date', $date1);
    $insert_commentaire ->execute();

    $req_select_cours = "SELECT id_utilisateur FROM cours WHERE id_cours='".$_GET['cours']."'";
    $cours = $bdd_connexion->query($req_select_cours)->fetch();
    $req_select_point= " SELECT score FROM utilisateurs WHERE id_utilisateur = '".$cours[0]."'";
    $point = $bdd_connexion->query($req_select_point)->fetch();
    echo $nouveau_score = $point[0]+10;
    $req_ajouter_point = "UPDATE utilisateurs SET score = '".$nouveau_score."' WHERE id_utilisateur = '".$cours[0]."'" ;
    $ajout_point = $bdd_connexion->prepare($req_ajouter_point);
    $ajout_point->execute();

    header("location:../controller/home_cours.php?voir=cours3&id_categorie=".$_GET['categorie']."&id_sous_categorie=".$_GET['sous_categorie']."&id_cours=".$_GET['cours']);
  }
?>
