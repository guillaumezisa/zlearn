<?php
  require('../controller/loged_or_not.php');
  require('../controller/bdd_connexion.php');
  if (isset($_GET['id_categorie'])){
    require("../model/cours.php");
    $sous_categorie = $bdd_connexion->query($req_id_sous_categorie)->fetchAll();
    echo "<h3><center>".$_GET['nom_categorie']."</center></h3>";
    echo "<div class='container border bg-info'><br>";
    for ($i=0; $i < count($sous_categorie) ; $i++) {
        echo "<h4>".$sous_categorie[$i][2]." :</h4><br>";
        echo $sous_categorie[$i][3]."<br>";
        echo "<form action='../controller/home_cours.php' method='GET'>
          <input type='hidden' name='id_categorie' value='".$_GET['id_categorie']."'>
          <input type='hidden' name='id_sous_categorie' value='".$sous_categorie[$i][0]."'>
          <input type='hidden' name='nom_categorie' value='".$_GET['nom_categorie']."'>
          <input type='hidden' name='nom_sous_categorie' value='".$sous_categorie[$i][2]."'>
          <input type='hidden' name='voir' value='cours2'><br>
          <button type'button' class='btn btn-primary'>Acceder aux cours de la sous catégorie</button>
          </form>";
        echo "<br><svg height='25px'width='100%'>
          <line x1='0' y1='0' x2='2000' y2='0' style='stroke:rgb(255,0,0);stroke-width:2' />
        </svg>";
    }
    echo "</div>";
  } else {
    header("location:../controller/home_cours.php");
  }
?>
