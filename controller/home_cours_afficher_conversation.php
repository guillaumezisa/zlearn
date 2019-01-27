<?php

require("../controller/bdd_connexion.php");
require("../controller/loged_or_not.php");
require("../model/messagerie.php");

$conversation = $bdd_connexion->query($req_select_all_conversations)->fetchAll();
for ($i=0; $i < count($conversation) ; $i++) {
  $utilisateur = explode("-",$conversation[$i][1]);
  if ( $utilisateur[0] === $_SESSION['id'] | $utilisateur[1] === $_SESSION['id']) {
    require("../model/messagerie.php");
    $util = $bdd_connexion->query($req_utilisateur1)->fetch();
    echo "<center>Conversation avec : ".$util[3]."<br>";
    echo "<img width='200px' src='".$util[9]."'><br>";

    require("../model/messagerie.php");
    $count_status = $bdd_connexion->query($req_status_message)->fetch();
    echo "Vous avez ".$count_status[0]." messages non lus .";
    echo "<form action='../controller/home_cours.php' method='GET'>
      <input type='hidden' value='".$conversation[$i][0]."' name='id'>
      <input type='hidden' name='voir' value='conversation'>
      <input type='hidden' name='pseudo' value='".$util[0]."'>
      <button class='btn btn-lg btn-block'>Accéder a la conversation</button>
      </form>";
  } elseif($utilisateur[1] === $_SESSION['id'] ){
    require("../model/messagerie.php");
    $util = $bdd_connexion->query($req_utilisateur0)->fetch();
    echo "Conversation avec : ".$util[0]."<br>";
  }
}

?>
