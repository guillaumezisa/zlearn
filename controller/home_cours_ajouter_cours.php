<?php
  if ($_GET["id_sous_categorie"] === "Sous catégorie"){
    header("location:../controller/home_cours.php?ajouter=cours1&sous_categorie=null&categorie=".$_GET['id_categorie']."&cours=".$_GET['cours']);
  } else if ( strlen($_GET['cours']) < 10 ){
    header("location:../controller/home_cours.php?ajouter=cours1&cours=null&categorie=".$_GET['id_categorie']);
  } else if ( strlen($_GET['nom']) < 3 ){
    header("location:../controller/home_cours.php?ajouter=cours1&nom=null&categorie=".$_GET['id_categorie']);
  }
  require("../controller/loged_or_not.php");
  require("../controller/bdd_connexion.php");
  echo $categorie = $_GET['id_categorie'];
  echo $sous_categorie = $_GET['id_sous_categorie'];
  $nom = htmlspecialchars($_GET['nom']);
  $cours = htmlspecialchars($_GET['cours']);
  $year = date("Y");
  $month = date("m");
  $day = date("d");
  $hour = date("H");
  $minute = date("i");
  $second = date("s");
  $date =$year."-".$month."-".$day." ".$hour.":".$minute.":$second";

  echo $_GET['id_categorie']."<br>";
  echo $_GET['id_sous_categorie']."<br>";


  $quote = [$nom,$cours];
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
  $nom = $fin[0];
  $cours = $fin[1];

  require("../model/cours.php");
  $req_insert_cours = $bdd_connexion->prepare($req_new_cours);
  $req_insert_cours->bindParam(':user',$_SESSION['id']);
  $req_insert_cours->bindParam(':categorie',$categorie);
  $req_insert_cours->bindParam(':sous_categorie',$sous_categorie);
  $req_insert_cours->bindParam(':date',$date);
  $req_insert_cours->bindParam(':nom',$nom);
  $req_insert_cours->bindParam(':cours',$cours);
  $req_insert_cours->execute();

  $req_select_point= " SELECT score FROM utilisateurs WHERE id_utilisateur = '".$_SESSION['id']."'";
  $point = $bdd_connexion->query($req_select_point)->fetch();
  echo $nouveau_score = $point[0]+75;
  $req_ajouter_point = "UPDATE utilisateurs SET score = '".$nouveau_score."' WHERE id_utilisateur = '".$_SESSION['id']."'" ;
  $ajout_point = $bdd_connexion->prepare($req_ajouter_point);
  $ajout_point->execute();

  header("location:../controller/home_cours.php?success=cours");
?>
