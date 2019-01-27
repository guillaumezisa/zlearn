<?php

  SESSION_start();
  if (empty($_SESSION["pseudo"]) && empty($_SESSION['status'])){
    header("location:../index.php");
  }

?>
