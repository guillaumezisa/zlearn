<?php
require("../controller/loged_or_not.php");
require("../controller/bdd_connexion.php");
include("../view/home_cours_header.php");
include('../controller/afk.js');
echo "<br><br>";
if ( isset($_GET['ajouter'])){
  if ( $_GET['ajouter'] === 'cours'){
    include("../view/home_cours_choix_categorie.php");
  } else if ( $_GET['ajouter'] === 'cours1'){
    include("../view/home_cours_ajouter_cours.php");
  } else if ( $_GET['ajouter'] === 'categorie'){
    include("../view/home_cours_ajouter_categorie.php");
  } else if ( $_GET['ajouter'] === 'souscategorie' && isset($_GET['categorie'])){
    include("../view/home_cours_ajouter_sous_categorie.php");
  }
}else if ( isset($_GET['voir'])){
  if ( $_GET['voir'] === 'cours'){
    include("../view/home_cours_voir_cours.php");
  } elseif ( $_GET['voir'] === 'cours1'){
    include("../view/home_cours_voir_categorie.php");
  } elseif ( $_GET['voir'] === 'cours2'){
    include("../view/home_cours_voir_sous_categorie.php");
  } elseif ( $_GET['voir'] === 'cours3'){
    include("../view/home_cours_voir_cours_select.php");
  } elseif ($_GET['voir'] === 'notification'){
    include("../view/home_cours_voir_notification.php");
  } elseif ($_GET['voir'] === 'messagerie'){
    include("../view/home_cours_voir_messagerie.php");
  } elseif ($_GET['voir'] === 'conversation'){
    include("../view/home_cours_voir_conversation.php");
  }elseif ($_GET['voir'] === 'suivi'){
    include("../view/home_cours_voir_suivi.php");
  }elseif ($_GET['voir'] === 'compte'){
    include("../view/home_cours_voir_compte.php");
  }
} else {
  include("../view/home_cours_body.php");
}
?>
