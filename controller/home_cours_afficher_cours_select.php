<?php
  $id_cours = $_GET['id_cours'];
  require("../controller/bdd_connexion.php");
  require("../model/cours.php");
  require("../controller/loged_or_not.php");
  $cours = $bdd_connexion->query($req_cours_unique)->fetchAll();
  require("../model/cours.php");
  $auteur = $bdd_connexion->query($req_auteur)->fetchAll();

  for ($i=0; $i < count($cours); $i++) {
    require("../model/cours.php");
    $cours_categorie = $bdd_connexion->query($req_voir_mes_cours_categorie)->fetch();
    $cours_sous_categorie = $bdd_connexion->query($req_voir_mes_cours_sous_categorie)->fetch();
    $y = $i+1;

    echo "<h3><center>".$cours[$i][5]."</center></h3><br>
          <div class='container border bg-info '><br>
            <div class='row'>
            <div class='col-sm border-right'>
              Catégorie : ".$cours_categorie[0]."
            </div>
            <div class='col-sm border-right'>
              Sous catégorie : ".$cours_sous_categorie[0]."
            </div>
            <div class='col-sm border-right'>
              Auteur : <a href ='../controller/cours_page_perso.php?id=".$cours[$i][0]."' ><font color='#FF0000'>".$auteur[0][0]."</font></a>
            </div>
            <div class='col-sm border-left'>
              Date : ".$cours[$i][4]."
            </div>
          </div><br>
        </div>";
        $nb = substr_count($cours[$i][6], "\n")+1;
    $href="../controller/home_cours_suivre_cours.php?id=".$cours[$i][0];
    echo "<div class='form-group'>

              <textarea disabled class='form-control' rows='".$nb."' name='cours' value=''>".$cours[$i][6]."</textarea>

          </div>
          <a class='btn btn-dark text-light' href=".$href." role='button'>Suivre ce cours</a><br><br>
          Si vous avez aimer ce cours ou que vous avez des question vous pouvez le commenter .<br>
          <form action='../controller/home_cours_commenter_cours.php' method ='GET'>
          <textarea class='form-control' rows='5' name='commentaire' value=''></textarea>
          <div class='btn-group' role='group' aria-label='Basic example'>
              <button type'button' class='btn btn-secondary'>Commenter</button>
              <input type='hidden' name='categorie' value='".$cours[$i][2]."'>
              <input type='hidden' name='sous_categorie' value='".$cours[$i][3]."'>
              <input type='hidden' name='cours' value='".$cours[$i][0]."'>
              <input type='hidden' name='id' value='".$_SESSION['id']."'>
            </form>
          </div><br><br>";
          $req_select_commentaire ="SELECT * FROM cours_commentaires WHERE id_cours ='".$cours[$i][0]."'";
          $select_commentaire = $bdd_connexion->query($req_select_commentaire)->fetchAll();
          for ($i=count($select_commentaire)-1; $i != 0 ; $i--) {
            echo "<textarea class='form-control' rows='2' name='commentaire' value=''>";
            echo "[".$select_commentaire[$i][6]."]";
            $req_select_utilisateur = "SELECT pseudo FROM utilisateurs WHERE id_utilisateur='".$select_commentaire[$i][1]."'";
            $select_utilisateur= $bdd_connexion->query($req_select_utilisateur)->fetch();
            echo " ".$select_utilisateur[0]." :";
            echo " ".$select_commentaire[$i][5];
            echo "</textarea>";
          }
          echo "<br><svg height='25px'width='100%'>
            <line x1='0' y1='0' x2='2000' y2='0' style='stroke:rgb(255,0,0);stroke-width:2' />
          </svg>";
  }
?>
