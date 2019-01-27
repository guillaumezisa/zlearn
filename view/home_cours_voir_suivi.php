<main role="main">
  <div class="jumbotron bg-light">
    <div class="container">
      <h3><center>Mes cours suivi </center></h3><br>
        <?php



          require("../controller/bdd_connexion.php");
          require("../controller/loged_or_not.php");
          require("../model/cours.php");
          $cours_suivi= $bdd_connexion->query($req_select_cours_suivi)->fetchAll();
          $nb = count($cours_suivi);
          if ( $nb > 0){
            echo "<div class='container'>
                  <div class='row mt-4 bg-info'>";
            if ( isset($_GET['suivi']) && $_GET['suivi'] === "supprimer" ){
              echo "<center><font color='green'>Vous avez bien supprimer ce cours de vos cours suivi .</font></center>";
            }
            if (isset($_GET['success']) && $_GET['success'] === "supprimer" ){
              echo "<br><h3 style='color:green; margin-top:1%; margin-left:2%;' > Le compte a bien été supprimé .</h3>" ;
            }elseif (isset($_GET['success']) && $_GET['success'] === "point" ){
              echo "<br><h3 style='color:green; margin-top:1%; margin-left:2%;' > Le compte a bien été crédité de points .</h3>" ;
            }elseif (isset($_GET['success']) && $_GET['success'] === "admin" ){
              echo "<br><h3 style='color:green; margin-top:1%; margin-left:2%;' > Le compte est maintenant un compte admin .</h3>" ;
            }else {
              echo "<br>";
            }
            echo "<table class='table table-info'><br>
                    <form action='../controller/home_cours_recherche_cours_suivi.php' method='GET'>
                      <center><input type='text' style='margin-top:1.5%; margin-left:3%; margin-right:5%; ' size='75px' name='recherche' value=''></center>
                      <button class='btn btn-dark ml-5'><font size='6px'>Rechercher</font></button>
                    </form>
                    <thead>
                      <tr>
                        <th scope='col'>Categorie</th>
                        <th scope='col'>Sous Catégorie</th>
                        <th scope='col'>Nom du cours</th>
                        <th scope='col'>Auteur</th>
                        <th scope='col'>Date</th>
                        <th scope='col'>Voir</th>
                        <th scope='col'>Supprimer</th>
                      </tr>
                    </thead>
                    </tbody>";
            for ($i=0; $i < $nb ; $i++) {
              $cours= $bdd_connexion->query($req_select_cours_suivi_cours)->fetch();
              $categorie= $bdd_connexion->query($req_select_cours_suivi_categorie)->fetch();
              $sous_categorie= $bdd_connexion->query($req_select_cours_suivi_sous_categorie)->fetch();
              $auteur= $bdd_connexion->query($req_select_cours_suivi_auteur)->fetch();

              echo "<tr>";
              echo "<td>".$categorie[0]."</td>";
              echo "<td>".$sous_categorie[0]."</td>";
              echo "<td>".$cours[5]."</td>";
              echo "<td>".$auteur[0]."</td>";
              echo "<td>".$cours[4]."</td>";
              $href_v = "../controller/home_cours.php?voir=cours3&id_cours=".$cours[0];
              $href_s = "../controller/home_cours_suivi_supprimer.php?&id_cours=".$cours_suivi[$i][0];
              echo "<td><a class='btn btn-info text-light' href=".$href_v." role='button'>Voir ce cours</a></td>";
              echo "<td><a class='btn btn-danger text-light' href=".$href_s." role='button'>Supprimer ce cours</a></td>";
              echo "</tr>";
            }
          } else {
            echo "<center>Vous n'avez actuellement aucun cours dans vos favoris .</center><br>";
          }
        ?>
        </tbody>
      </table>
    </div></div>
  </div>
</main>
