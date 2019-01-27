<?php
  require("../controller/bdd_connexion.php");
  require("../controller/loged_or_not.php");
  require("../controller/error_display.php");
  include("../view/home_cours_header.php");

  if (isset($_GET['id'])){
    require("../model/compte.php");
    $utilisateur = $bdd_connexion->query($req_utilisateurs_get)->fetch();

    echo "<main role='main'>
            <div class='jumbotron bg-light'>
              <div class='container'>
                <h3><center>Compte de ".$utilisateur[3]."</center></h3><br>
                  <div class='row'>
                    <div class='col-3'><img width='150px' src=".$utilisateur[9]."><br></div>
                    <div class='col-7'>Description :<br>".$utilisateur[8]."<br></div>
                   <div class='col-2'>Score :".$utilisateur[10]."<br></div>
                  </div><br>
                <form action='../controller/cours_nouveau_message.php' method='GET'>
                  <input type='hidden' name='id' value='".$_GET['id']."'>
                  <button class='btn btn-lg btn-block'> Contacter </button>
                </form>
              </div>
            </div>
          </main>";
  }

?>
