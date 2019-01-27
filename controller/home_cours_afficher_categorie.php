<?php
  require("../controller/bdd_connexion.php");
  require("../model/cours.php");
  $categorie = $bdd_connexion->query($req_voir_categorie)->fetchAll();
  echo "<div class='container border bg-info'>";
  for ($i=0; $i < count($categorie); $i++) {
  echo "<br>
          <div class='row ml-1'><center><h4>".$categorie[$i][1]." :</h4></center><br>".$categorie[$i][2]."
          </div><br>
          <form action='../controller/home_cours.php' method='GET'>
            <input type='hidden' name='id_categorie' value='".$categorie[$i][0]."'>
            <input type='hidden' name='voir' value='cours1'>
            <input type='hidden' name='nom_categorie' value='".$categorie[$i][1]."'>
            <button type'button' class=' btn btn-primary'>Voir</button><br><br>
          </form>
          <svg height='25px'width='100%'>
            <line x1='0' y1='0' x2='2000' y2='0' style='stroke:rgb(255,0,0);stroke-width:2' />
          </svg>
          ";
}
?>
