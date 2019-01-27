<?php
  require("../controller/loged_or_not_admin.php");
  include('../view/home_header_admin.php');
  include('../controller/afk.js');
  if (isset($_GET['go'])){
    $go = $_GET['go'];
    if ($go === "site"){
      include('../view/home_bo_site.php');
    } elseif ($go === "comptes"){
      if ( isset($_GET['action'])){
        if ($_GET['action'] === "modifier"){
          header("location:../view/home_bo_modifier_compte.php?id=".$_GET['id']);
        } elseif ( $_GET['action'] === "supprimer"){
          header("location:../controller/home_bo_supprimer_compte.php?id=".$_GET['id']);
        }
      }else {
        include('../view/home_bo_comptes.php');
      }
    } elseif ($go === "cours"){
      include('../view/home_bo_cours.php');
    } elseif ($go === "forum"){
      include('../view/home_bo_forum.php');
    } elseif ($go === "jeux"){
      if (isset($_GET['voir']) && $_GET['voir'] === "monde"){
        include('../view/home_bo_voir_mondes');
      }elseif (isset($_GET['action'])){
        if ($_GET['action'] === "afficher"){
          include('../view/home_bo_rebirth_afficher_monde.php');
        }elseif ($_GET['action'] === "modifier"){
          include('../view/home_bo_rebirth_modifier_monde.php');
        }elseif ($_GET['action'] === "supprimer"){
          include('../controller/home_bo_rebirth_supprimer_monde.php');
        }
      }elseif (isset($_GET['creer']) && $_GET['creer'] === "monde"){
        include('../view/home_bo_rebirth_creer_monde.php');
      }else {
        include('../view/home_bo_rebirth.php');
      }
    } elseif ($go === "messagerie"){
      include('../view/home_bo_messagerie.php');
    }
  } else {
    include('../view/home_bo.php');
  }

?>
