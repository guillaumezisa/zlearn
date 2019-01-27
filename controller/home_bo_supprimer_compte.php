<?php
require("../controller/loged_or_not_admin.php");
require("../controller/bdd_connexion.php");
require("../model/bo_compte.php");
$supprimer_compte = $bdd_connexion->prepare($req_supprimer_compte);
$supprimer_compte->execute();
header("location:../controller/home_bo.php?go=comptes&success=supprimer");

?>
