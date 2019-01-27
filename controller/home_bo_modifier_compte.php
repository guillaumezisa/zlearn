<?php
  require("../controller/loged_or_not_admin.php");
  require("../controller/bdd_connexion.php");

  if (isset($_GET['point']) && isset($_GET['id'])){
    require("../model/compte.php");
    $point = $bdd_connexion->query($req_select_score)->fetch();
    $nouveau_score= $point[0]+$_GET['point'];
    require("../model/compte.php");
    $ajout_point = $bdd_connexion->prepare($req_ajouter_point);
  	$ajout_point->execute();
    header("location:../controller/home_bo.php?go=comptes&success=point");
  }elseif (isset($_GET['status']) && isset($_GET['id'])){
    require("../model/compte.php");
    $ajout_privilege = $bdd_connexion->prepare($req_ajouter_privilege);
  	$ajout_privilege->execute();
    header("location:../controller/home_bo.php?go=comptes&success=admin");
  }
?>
