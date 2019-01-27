<?php

  require("../controller/bdd_connexion.php");
  require("../controller/loged_or_not.php");

  require("../model/messagerie.php");
  $conversation = $bdd_connexion->query($req_select_all_conversations)->fetchAll();

  for ($i=0; $i < count($conversation) ; $i++) {
    $utilisateur = explode("-",$conversation[$i][1]);
    if ( $utilisateur[0] === $_SESSION['id'] && $utilisateur[1] === $_GET['id'] || $utilisateur[1] === $_SESSION['id'] && $utilisateur[0] === $_GET['id']) {
      $flag = $conversation[$i][0];
    }
  }

  if (!empty($flag)){
    header("location:../controller/home_cours.php?id=".$flag."&voir=conversation");
  } else {
    $id_utilisateurs = $_SESSION['id']."-".$_GET['id'];
    require("../model/messagerie.php");
    $req_insert_conversation = $bdd_connexion->prepare($req_insert_conversation);
    $req_insert_conversation->bindParam(':id',$id_utilisateurs);
    $req_insert_conversation->execute();
    $conversation_id = $bdd_connexion->query($req_select_all_conversations)->fetchAll();

    for ($i=0; $i < count($conversation_id); $i++) {
      if ($conversation_id[$i][1] === $id_utilisateurs){
          header("location:../controller/home_cours.php?id=".$conversation_id[$i][0]."&voir=conversation");
      }
    }
  }
?>
