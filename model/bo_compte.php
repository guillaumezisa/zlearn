<?php
  //SELECT
  $req_modifier_compte ="SELECT * FROM utilisateurs WHERE id_utilisateur='".$_GET['id']."'";
  $req_bo_all_utilisateurs = "SELECT * FROM utilisateurs";
  //DELETE
  $req_supprimer_compte = "DELETE FROM utilisateurs WHERE id_utilisateur = '".$_GET['id']."'";
?>
