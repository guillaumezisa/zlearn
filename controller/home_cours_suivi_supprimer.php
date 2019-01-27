<?php
  require("../view/home_cours_header.php");
  require("../controller/loged_or_not.php");
  require("../controller/bdd_connexion.php");
  require("../model/cours.php");
  $supprimer_suivi = $bdd_connexion->prepare($req_supprimer_cours_suivi);
  $supprimer_suivi->execute();
  header("location:../controller/home_cours.php?voir=suivi&suivi=supprimer")
?>
