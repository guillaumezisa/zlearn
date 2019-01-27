<?php
  SESSION_start();

  require("../controller/bdd_connexion.php");
  require("../controller/loged_or_not.php");
  $now = date("Y-m-d H:i:s");
  $update_deconnexion="UPDATE `utilisateurs` SET `date_deconnexion` = '".$now."' WHERE `utilisateurs`.`id_utilisateur` = '".$_SESSION['id']."';";
  $deconnexion = $bdd_connexion->prepare($update_deconnexion)->execute();

  SESSION_destroy();
  header("location:../index.php");
?>
