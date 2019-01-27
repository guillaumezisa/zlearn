<?php
  require("../controller/loged_or_not.php");
  require("../controller/bdd_connexion.php");

  if (isset($_GET['message']) && isset($_GET['id_conversation']) && isset($_GET['id_utilisateur'])){

    require("../model/messagerie.php");
    $verification_utilisateur = $bdd_connexion->query($req_verification_utilisateur)->fetch();
    $id = explode("-" , $verification_utilisateur[1]);

    if ( $_SESSION['id'] === $id[0] || $_SESSION['id'] === $id[1] ){
      $year = date("Y");
      $month = date("m");
      $day = date("d");
      $hour = date("H");
      $minute = date("i");
      $second = date("s");
      $date =$year."-".$month."-".$day." ".$hour.":".$minute.":$second";
      $status = 1;

      require("../model/messagerie.php");
      $req_insert_message = $bdd_connexion->prepare($req_insert_message);
      $req_insert_message->bindParam(':conversation',$_GET['id_conversation']);
      $req_insert_message->bindParam(':expediteur',$_SESSION['id']);
      $req_insert_message->bindParam(':date1',$date);
      $req_insert_message->bindParam(':message',$_GET['message']);
      $req_insert_message->bindParam(':status', $status);
      $req_insert_message->execute();

      header("location:../controller/home_cours.php?id=".$_GET['id_conversation']."&voir=conversation");

    } else {
      header("location:../controller/home_cours.php?id=".$_GET['id_conversation']."&voir=conversation&conversation=private");
    }

  } else {
    header("location:../controller/home_cours.php?id=".$_GET['id_conversation']."&voir=conversation&conversation=null");
  }
?>
