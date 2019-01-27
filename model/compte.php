<?php
  //SELECT
  $req_utilisateurs = "SELECT * FROM utilisateurs WHERE id_utilisateur = '".$_SESSION['id']."'";
  $req_utilisateurs_get = "SELECT * FROM utilisateurs WHERE id_utilisateur = '".$_GET['id']."'";
  $req_select_score = "SELECT score FROM utilisateurs WHERE id_utilisateur='".$_GET['id']."'";
  $req_select_point= " SELECT score FROM utilisateurs WHERE id_utilisateur = '".$_SESSION['id']."'";
  //UPDATE
  $req_ajouter_point = "UPDATE utilisateurs SET score = '".$nouveau_score."' WHERE id_utilisateur = '".$_GET['id']."'" ;
  $req_ajouter_privilege = "UPDATE utilisateurs SET status = '".$_GET['status']."' WHERE id_utilisateur = '".$_GET['id']."'" ;
  $req_update_photo = "UPDATE `utilisateurs` SET `photo` = '".$target_file."'  WHERE `utilisateurs`.`id_utilisateur` = '".$_SESSION['id']."'";
?>
