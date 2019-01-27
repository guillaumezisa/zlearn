<?php
  require("../controller/loged_or_not.php");
  require("../controller/bdd_connexion.php");
  echo "<h3><center> Conversation avec ".$_GET['pseudo']."</center></h3><br>";
  if (!empty($_GET['id'])){

    require("../model/messagerie.php");
    $count_status = $bdd_connexion->query($req_status_message_conversation)->fetch();
    if ($count_status[0] > 0 ){
      $message_status = $bdd_connexion->query($req_select_message_status_actif)->fetchAll();
      for ($i=0; $i < count($message_status); $i++) {
          $req_update_status = "UPDATE `messages` SET `status` = '0' WHERE `messages`.`id_message` = '".$message_status[$i][0]."';";
          $req_update = $bdd_connexion->prepare($req_update_status);
          $req_update->execute();
          echo $message_status[$i][0];
      }
    }
    $message=$bdd_connexion->query($req_message)->fetchAll();
      echo "<textarea disabled id ='autoscroll' class='form-control' rows='16'>";
      for ($y=0; $y < count($message); $y++) {
        $expediteur = $bdd_connexion->query($req_expediteur)->Fetch();
        echo "\n";
        echo "[ ".$message[$y][3]." ] ";
        echo $expediteur[3]." : "; //expediteur
        echo $message[$y][4];
      }
      echo "</textarea>";
      echo "<form action='../controller/ajouter_message.php'><center>
            <input type='text' name='message' size='88%' value='' placeholder='Envoyez un message .'>
            <input type='hidden' name='id_conversation' value='".$_GET['id']."'>
            <input type='hidden' name='id_utilisateur' value ='".$_SESSION['id']."'>
            <button class='btn btn-secondary'>Envoyer</button></center>
            </form>";
    } else {

    }
    header("Refresh:100");
  ?>
