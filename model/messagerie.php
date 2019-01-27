<?php
//INSERT
$req_insert_message="INSERT INTO `messages` (`id_message`, `id_conversation`, `id_expediteur`, `heure`, `message`, `status`) VALUES (NULL, :conversation, :expediteur , :date1 , :message , :status )";
$req_insert_conversation = "INSERT INTO `conversations` (`id_conversation`, `id_utilisateurs`) VALUES (NULL, :id)";
//SELECT
$req_verification_utilisateur = "SELECT * FROM conversations WHERE id_conversation='".$_GET['id_conversation']."' ";
$req_select_all_conversations = "SELECT * FROM conversations";
$req_utilisateur0 = "SELECT pseudo FROM utilisateurs WHERE id_utilisateur='".$utilisateur[0]."'";
$req_utilisateur1 = "SELECT * FROM utilisateurs WHERE id_utilisateur='".$utilisateur[1]."'";
$req_status_message = " SELECT COUNT(status) FROM messages WHERE id_conversation='".$conversation[$i][0]."'AND status = '1' AND id_expediteur!= '".$_SESSION['id']."'";
$req_status_message_conversation = " SELECT COUNT(status) FROM messages WHERE id_conversation='".$_GET['id']."'AND status = '1' AND id_expediteur!= '".$_SESSION['id']."'";
$req_select_message_status_actif = "SELECT * FROM messages WHERE id_conversation='".$_GET['id']."' AND status ='1' AND id_expediteur!='".$_SESSION['id']."'";
$req_select_conversation ="SELECT id_utilisateurs FROM conversation";
$req_message = "SELECT * FROM messages WHERE id_conversation='".$_GET['id']."'";
$req_expediteur ="SELECT * FROM utilisateurs WHERE id_utilisateur = '".$message[$y][2]."'";
?>
