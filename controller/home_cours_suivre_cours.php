<?php
  require('../controller/loged_or_not.php');
  require('../controller/bdd_connexion.php');
  if (isset($_GET['id'])){
    require("../model/cours.php");
    $cours_suivi = $bdd_connexion->prepare($req_cours_suivi)->execute();
    header('location:../controller/home_cours.php?success=cours_suivi');
  }
?>
