<?php
  //INSERT
  $req_insert_add_categorie = "INSERT INTO `categorie` (`id_categorie`, `nom`, `description`) VALUES (NULL,:nom,:description);";
  $req_insert_add_sous_categorie = "INSERT INTO `sous_categorie` (`id_sous_categorie`, `id_categorie`, `nom`, `description`) VALUES (NULL,:categorie,:nom,:description);";
  $req_new_cours = "INSERT INTO `cours` (`id_cours`, `id_utilisateur`, `id_categorie`, `id_sous_categorie`, `date_poste`, `intitule`, `description`) VALUES (NULL, :user , :categorie, :sous_categorie, :date , :nom, :cours );";
  $req_insert_commentaire = "INSERT INTO `cours_commentaires` (`id_cours_commentaire`, `id_utilisateur`, `id_categorie`, `id_sous_categorie`, `id_cours`, `commentaire`, `date`) VALUES (NULL, :utilisateur, :categorie, :sous_categorie, :cours, :commentaire , :date)";
  $req_cours_suivi = "INSERT INTO `cours_suivi` (`id_cours_suivi`, `id_cours`, `id_utilisateur`) VALUES (NULL, '".$_GET['id']."', '".$_SESSION['id']."');";
  //SELECT
  $req_cours="SELECT * FROM cours WHERE id_categorie = ".$_GET['id_categorie']." AND id_sous_categorie = ".$_GET['id_sous_categorie'];
  $req_cours_unique= "SELECT * FROM cours WHERE id_cours = '".$id_cours."'";
  $req_categorie = "SELECT * FROM categorie WHERE id_categorie='".$_GET['categorie']."'";
  $req_id_sous_categorie="SELECT * FROM sous_categorie WHERE id_categorie = '".$_GET['id_categorie']."'";
  $req_sous_categorie = "SELECT * FROM sous_categorie WHERE id_categorie='".$_GET['categorie']."'";
  $req_all_categorie = "SELECT * FROM categorie ;";
  $req_voir_categorie = "SELECT * FROM categorie ;";
  $req_auteur= "SELECT pseudo FROM utilisateurs WHERE id_utilisateur = '".$cours[0][1]."'";
  $req_voir_mes_cours_categorie = "SELECT nom FROM categorie WHERE id_categorie = '".$cours[$i][2]."'";
  $req_voir_mes_cours_sous_categorie = "SELECT nom FROM sous_categorie WHERE id_sous_categorie = '".$cours[$i][3]."'";
  $req_modif_cours = "UPDATE cours SET description=:description WHERE id_cours=:id_cours AND id_utilisateur =:utilisateur";
  $req_voir_mes_cours = "SELECT * FROM cours WHERE id_utilisateur = '".$_SESSION['id']."'";
  $req_voir_mes_cours_sous_categorie_and_categorie = "SELECT nom FROM sous_categorie WHERE id_sous_categorie='".$cours[$i][3]."'";
  $req_select_cours_suivi = "SELECT * FROM cours_suivi WHERE id_utilisateur='".$_SESSION['id']."'";
  //DELETE
  $req_supprimer_cours_suivi = "DELETE FROM cours_suivi WHERE id_cours_suivi = ".$_GET['id_cours']." ;";
  $req_supprimer_cours = "DELETE FROM cours WHERE id_utilisateur = ".$_GET['id']." AND id_categorie = ".$_GET['categorie']." AND id_sous_categorie=".$_GET['sous_categorie']." ;";


?>
