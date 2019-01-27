<?php
  require("../controller/bdd_connexion.php");
  require("../controller/loged_or_not_admin.php");
  require("../model/bo_rebirth.php");
  $mondes = $bdd_connexion->query($req_afficher_mondes)->fetchAll();
  for ($i=0; $i < count($mondes) ; $i++) {
    echo "<tr>";
    echo "<th scope='row'>".$mondes[$i][0]."</th>";
    echo "<td>".$mondes[$i][1]."</td>";
    echo "<td>".$mondes[$i][2]."</td>";
    $href_m = "../controller/home_bo.php?go=jeux&action=modifier&id=".$mondes[$i][0];
    $href_s = "../controller/home_bo.php?go=jeux&action=supprimer&id=".$mondes[$i][0];
    $href_a = "../controller/home_bo.php?go=jeux&action=afficher&id=".$mondes[$i][0];
    echo "<td><a class='btn btn-dark text-light' href=".$href_a." role='button'>Apercut</a></td>";
    echo "<td><a class='btn btn-dark text-light' href=".$href_m." role='button'>Modifier</a></td>";
    echo "<td><a class='btn btn-dark text-light' href=".$href_s." role='button'>Supprimer</a></td>";
    echo "<td><a class='btn btn-dark text-light' href='#' role='button'>Contacter</a></td>";
    echo "</tr>";
  }
?>
