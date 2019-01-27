<?php
  require("../controller/bdd_connexion.php");
  require("../controller/loged_or_not.php");

  $target_dir = "../view/images/utilisateurs/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $target_file = $target_dir . $_SESSION['id'].".".$imageFileType ;

  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
    } else {
        header("location:../controller/home_cours.php?voir=compte&error=photo_format");
    }
  }

  if ($_FILES["fileToUpload"]["size"] > 1000000) {
      header("location:../controller/home_cours.php?voir=compte&error=photo_poid");
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      header("location:../controller/home_cours.php?voir=compte&error=photo_format");
  }
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    require("../model.compte.php");
    $update_photo = $bdd_connexion->prepare($req_update_photo);
    $update_photo ->execute();
    header("location:../controller/home_cours.php?voir=compte&success=photo");
  } else {
    header("location:../controller/home_cours.php?voir=compte&error=photo_upload");
    echo "Sorry, there was an error uploading your file.";
  }
?>
