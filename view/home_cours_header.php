<!DOCTYPE html>
<html>
  <head>
    <script src="../view/style/bootstrap1.js" ></script>
    <script src="../view/style/bootstrap2.js" ></script>
    <script src="../view/style/bootstrap3.js" ></script>
    <link rel="stylesheet" href="../view/style/bootstrap.css" >
    <link rel="stylesheet" href="../view/style/home.css">
    <link rel="icon" type="image/png" href="../view/images/z.png">
    <title>Zlearn : Cours</title>
    <meta charset="UTF-8">

  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info">
        <a class="navbar-brand" href="../controller/home_cours.php">ZLearn </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown ml-4">
              <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mes cours</a>
              <div class="dropdown-menu active" aria-labelledby="navbarDropdown">
                <a class="dropdown-item " href="../controller/home_cours.php?ajouter=cours">Ajouter un cours</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../controller/home_cours.php?voir=cours">Voir mes cours</a>
              </div>
            </li>
            <li class="nav-item ml-4 ">
            </li>
            <li class="nav-item ml-4">
              <a class="nav-link text-dark" href="../controller/home_cours.php?voir=messagerie">Messagerie</a>
            </li>
            <li class="nav-item ml-4">
              <a class="nav-link text-dark" href="../controller/home_cours.php?voir=suivi">Cours suivi </a>
            </li>
            <li class="nav-item ml-4">
              <a class="nav-link text-dark" href="../controller/home_cours.php?voir=compte">Compte</a>
            </li>
            <li class="nav-item ml-4">
              <a class="nav-link text-dark" href="#">Points :
              <?php
                require("../controller/bdd_connexion.php");
                require("../model/compte.php");
                $point = $bdd_connexion->query($req_select_point)->fetch();
                echo $point[0];
              ?>
              </a>
            </li>
            <li class="nav-item ml-4">
              <a class="nav-link text-dark" href="../controller/home.php">Retour au menu</a>
            </li>
            <li class="nav-item ml-4">
              <a class="nav-link text-dark" href="../controller/deconnexion.php">Déconnexion</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0" action="../controller/cours_recherche.php">
            <input class="form-control mr-sm-2" name="recherche" type="text" placeholder="Chercher un cours" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Chercher</button>
          </form>
        </div>
      </nav>
    </header>
