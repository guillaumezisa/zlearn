<?php
  require("../controller/bdd_connexion.php");
  require("../model/bo_compte.php");
  $utilisateurs = $bdd_connexion->query("$req_bo_all_utilisateurs")->fetchAll();
  for ($i=0; $i < count($utilisateurs) ; $i++) {
    echo "<tr>
            <th scope='row'>".$utilisateurs[$i][0]."</th>
            <td>".$utilisateurs[$i][3]."</td>
            <td>".$utilisateurs[$i][4]."</td>
            <td>".$utilisateurs[$i][5]."</td>
            <td>".$utilisateurs[$i][7]."</td>
            <td>".$utilisateurs[$i][6]."</td>
            <td>".$utilisateurs[$i][10]."</td>
            <td>".$utilisateurs[$i][11]."</td>";

    $href_m = "../controller/home_bo.php?go=comptes&action=modifier&id=".$utilisateurs[$i][0];
    $href_s = "../controller/home_bo.php?go=comptes&action=supprimer&id=".$utilisateurs[$i][0];
    $href_c = "../controller/home_bo.php?go=comptes&action=contacter&id=".$utilisateurs[$i][0];
    echo "  <td><a class='btn btn-dark text-light' href=".$href_m." role='button'>Modifier</a></td>
            <td><a class='btn btn-dark text-light' href=".$href_s." role='button'>Supprimer</a></td>
            <td><a class='btn btn-dark text-light' href='#' role='button'>Contacter</a></td>
          </tr>";
  }
?>
