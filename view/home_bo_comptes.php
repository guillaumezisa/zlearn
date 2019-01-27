<body>
  <a class="btn btn-dark text-light" href="../controller/home_bo.php" role="button">Retour</a><br>
  <form action='../controller/home_bo_compte_recherche.php' method='GET'>
    <input type='text' style='margin-top:3%; margin-left:66%;' name='recherche' value=''>
    <button class='btn btn-dark'>Rechercher</button>
  </form>
  <div class="container">
    <div class="row mt-4 bg-secondary">
      <h1>Gestion des comptes :</h1>
        <?php
          if (isset($_GET['success']) && $_GET['success'] === "supprimer" ){
            echo "<br><h3 style='color:green; margin-top:1%; margin-left:2%;' > Le compte a bien été supprimé .</h3>" ;
          }elseif (isset($_GET['success']) && $_GET['success'] === "point" ){
            echo "<br><h3 style='color:green; margin-top:1%; margin-left:2%;' > Le compte a bien été crédité de points .</h3>" ;
          }elseif (isset($_GET['success']) && $_GET['success'] === "admin" ){
            echo "<br><h3 style='color:green; margin-top:1%; margin-left:2%;' > Le compte est maintenant un compte admin .</h3>" ;
          }else {
            echo "<br>";
          }
        ?>
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Pseudo</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Email</th>
              <th scope="col">Naissance</th>
              <th scope="col">Points</th>
              <th scope="col">Status</th>
              <th scope="col">Modifier</th>
              <th scope="col">Supprimer</th>
              <th scope="col">Contacter</th>
            </tr>
          </thead>
          <tbody>
            <?php
              require('../controller/home_bo_affichage_compte.php');
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
