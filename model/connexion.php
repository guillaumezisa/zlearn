<?php
  //SELECT
  $req_login = "SELECT COUNT(*) FROM utilisateurs WHERE pseudo='".$pseudo."' AND mdp='".$mdp."'";
  $req_status = "SELECT * FROM utilisateurs WHERE pseudo LIKE '".$pseudo."';";
?>
