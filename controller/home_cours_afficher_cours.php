<?php
  require('../controller/loged_or_not.php');
  require('../controller/bdd_connexion.php');
  if (isset($_GET['id_categorie'])){
    require('../model/cours.php');
    $cours = $bdd_connexion->query($req_cours)->fetchAll();

    echo "<h3><center>Liste des cours correspondant a ".$_GET['nom_categorie']." > ".$_GET['nom_sous_categorie']."</center></h3>";
    echo "<div class='container border bg-info'><br>";
    for ($i=0; $i < count($cours) ; $i++) {
      $req_utilisateur = ("SELECT nom FROM utilisateurs WHERE id_utilisateur='".$cours[$i][1]."'");
      $utilisateur = $bdd_connexion->query($req_utilisateur)->fetch();
        echo"<div class='row'>
              <div class='col-5'><h4>".$cours[$i][5]."</h4></div>
              <div class='col-4'><h4><a href ='../controller/cours_page_perso.php?id=".$cours[$i][0]."' ><font color='#FF0000'>".$utilisateur[0]."</font></a></h4></div>
              <div class='col-3'><h4>".$cours[$i][4]."</h4></div>
            </div>";
        echo "<form action='../controller/home_cours.php' method='GET'>
          <input type='hidden' name='voir' value='cours3'>
          <input type='hidden' name='id_categorie' value='".$_GET['id_categorie']."'>
          <input type='hidden' name='id_cours' value='".$cours[$i][0]."'
          <input type='hidden' name='nom_categorie' value='".$_GET['nom_categorie']."'>
          <br><br>
          <center><button type'button' class='btn btn-primary'>Voir ce cours</button></center>
          </form></center>";
        echo "<br><svg height='25px'width='100%'>
          <line x1='0' y1='0' x2='2000' y2='0' style='stroke:rgb(255,0,0);stroke-width:2' />
        </svg>";
    }
  } else {
    header("location:../controller/home_cours.php");
  }
?>
