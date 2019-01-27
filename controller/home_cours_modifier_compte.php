<?php
  //UPDATE `utilisateurs` SET `mdp` = 'TFdI'  WHERE `utilisateurs`.`id_utilisateur` =1
  require("../controller/loged_or_not.php");
  require("../controller/bdd_connexion.php");
  if ( isset($_GET['nom'])){
    $req_update_nom = "UPDATE `utilisateurs` SET `nom` = '".$_GET['nom']."'  WHERE `utilisateurs`.`id_utilisateur` = '".$_SESSION['id']."'";
    $update_nom = $bdd_connexion->prepare($req_update_nom);
    $update_nom->execute();
    header("location:../controller/home_cours.php?voir=compte&success=nom");
  }elseif ( isset($_GET['prenom'])){
    $req_update_prenom = "UPDATE `utilisateurs` SET `prenom` = '".$_GET['prenom']."'  WHERE `utilisateurs`.`id_utilisateur` = '".$_SESSION['id']."'";
    $update_prenom = $bdd_connexion->prepare($req_update_prenom);
    $update_prenom->execute();
    header("location:../controller/home_cours.php?voir=compte&succes=prenom");
  }elseif ( isset($_GET['pseudo'])){
    $req_update_pseudo = "UPDATE `utilisateurs` SET `pseudo` = '".$_GET['pseudo']."'  WHERE `utilisateurs`.`id_utilisateur` = '".$_SESSION['id']."'";
    $update_pseudo = $bdd_connexion->prepare($req_update_pseudo);
    $update_pseudo->execute();
    header("location:../controller/home_cours.php?voir=compte&succes=pseudo");
  }elseif ( isset($_GET['email'])){
    $req_update_email = "UPDATE `utilisateurs` SET `email` = '".$_GET['email']."'  WHERE `utilisateurs`.`id_utilisateur` = '".$_SESSION['id']."'";
    $update_email = $bdd_connexion->prepare($req_update_email);
    $update_email->execute();
    header("location:../controller/home_cours.php?voir=compte&success=email");
  }elseif ( isset($_POST['pass1'])){
    if ( isset($_POST['pass2']) && isset($_POST['pass3'])){
      $password = htmlspecialchars($_POST["pass1"]);
      $password1 = $_POST["pass2"];
      $password2 = $_POST["pass3"];
      require_once("../controller/xor.php");
      $xor_key = 'ByTheWay777';
      $signal = base64_encode(xorIt($password, $xor_key));
      $password3 = $signal;
      $req_pass_actuel = "SELECT mdp FROM utilisateurs WHERE id_utilisateur='".$_SESSION['id']."'";
      $pass_actuel = $bdd_connexion->query($req_pass_actuel)->fetch();
      if ( $pass_actuel[0] === $password3){
        if($password1 === $password2){
          require_once("../controller/xor.php");
          $xor_key = 'ByTheWay777';
          $signal = base64_encode(xorIt($password1, $xor_key));
          $password = $signal;
          $req_update_pass = "UPDATE `utilisateurs` SET `mdp` = '".$password."'  WHERE `utilisateurs`.`id_utilisateur` = '".$_SESSION['id']."'";
          $update_pass = $bdd_connexion->prepare($req_update_pass);
          $update_pass->execute();
          header("location:../controller/home_cours.php?voir=compte&success=pass");
        } else {
          header("location:../controller/home_cours.php?voir=compte&error=pass");
        }
      } else {
        header("location:../controller/home_cours.php?voir=compte&error=pass");
      }
    } else {
      header("location:../controller/home_cours.php?voir=compte&error=pass");
    }
  }elseif (isset($_GET['description'])){
    $req_update_description = "UPDATE `utilisateurs` SET `description` = '".$_GET['description']."'  WHERE `utilisateurs`.`id_utilisateur` = '".$_SESSION['id']."'";
    $update_description = $bdd_connexion->prepare($req_update_description);
    $update_description->execute();
    header("location:../controller/home_cours.php?voir=compte&success=description");
  }elseif ( isset($_GET['photo'])){
    header("location:../controller/enregistrement_photo_profil.php?id=".$_SESSION['id']);
  } else {
   header('location:../controller/home_cours.php?voir=compte&error=true');
  }
?>
