<?php
  $req_insert = "INSERT INTO `utilisateurs` (`id_utilisateur`,`mdp`,`date_inscription`, `pseudo`, `nom`, `prenom`, `date_naissance`, `email`, `description`, `photo`, `score`, `status`) VALUES (NULL, :mdp , :date_inscription , :pseudo , :nom, :prenom, :date_naissance, :email, :description, :photo, '0', '0');";
  $req_subscribe = "SELECT COUNT(*) FROM utilisateurs WHERE pseudo='".$pseudo."'";
?>
