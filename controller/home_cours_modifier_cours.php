<?php
  require('../controller/loged_or_not.php');
  require("../controller/bdd_connexion.php");
  $id_cours = $_GET['id_cours'];
  $cours = $_GET['cours'];
  $id = $_SESSION['id'];
  echo $cours ;
  $quote = [$cours,$id];
  for ($i=0; $i < 2 ; $i++) {
     addslashes($quote[$i]);
     for ($j=0; $j < strlen($quote[$i]) ; $j++) {
        if ($quote[$i][$j] === "'"){
           $dual[$i] = explode("'", $quote[$i]);
           $fin[$i] = implode("\\'",$dual[$i]);
        } else {
           $fin[$i] = $quote[$i];
        }
     }
  }
  $cours = $fin[0];
  $id = $fin[1];

  echo "<br>".$cours ;

  require("../model/cours.php");
  $modif_cours= $bdd_connexion->prepare($req_modif_cours);
  $modif_cours -> bindParam(':description', $cours);
  $modif_cours -> bindParam(':id_cours', $id_cours);
  $modif_cours -> bindParam(':utilisateur', $id);
  $modif_cours->execute();
  header('location:../controller/home_cours.php?voir=cours3');
?>
