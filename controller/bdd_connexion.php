<?php

  $dsn = 'mysql:dbname=db_zisa;host=127.0.0.1';
  $user = 'guillaume';
  $password = 'toor';

  try {
      $bdd_connexion = new PDO($dsn, $user, $password);
  } catch (PDOException $e) {
      echo 'Connexion échouée : ' . $e->getMessage();
  }

?>
