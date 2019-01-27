 <main role="main">
  <div class="jumbotron bg-light">
    <div class="container">
      <h3><center>Mon compte</center></h3><br>
      <?php
        require("../model/compte.php");
        $utilisateur = $bdd_connexion->query($req_utilisateurs)->fetch();
      echo "  <form action='../controller/home_cours_modifier_compte.php' method='GET'>
                <center>Pseudo :<br>
                <input type='text' name='pseudo' value='".$utilisateur[3]."'>
                <button class='btn btn-primary text-light'> Modifier </button><br>
              </form>";
      echo "  <form action='../controller/home_cours_modifier_compte.php' method='GET'>
                <center>Nom :<br>
                <input type='text' name='nom' value='".$utilisateur[4]."'>
                <button class='btn btn-primary text-light'> Modifier </button><br>
              </form>";
      echo "  <form action='../controller/home_cours_modifier_compte.php' method='GET'>
                <center>Prenom :<br>
                <input type='text' name='prenom' value='".$utilisateur[5]."'>
                <button class='btn btn-primary text-light'> Modifier </button><br>
              </form>";
      echo "  <form action='../controller/home_cours_modifier_compte.php' method='GET'>
                <center>Email :<br>
                <input type='text' name='email' value='".$utilisateur[7]."'>
                <button class='btn btn-primary text-light'> Modifier </button><br>
              </form>";
    echo "  <form action='../controller/home_cours_modifier_compte.php' method='POST'>
              <center>Votre ancien mot de passe :<br>
              <input type='password' name='pass1' value=''>
              <center>Votre nouveau mot de passe :<br>
              <input type='password' name='pass2' value=''>
              <center>Répétez votre nouveau mot de passe :<br>
              <input type='password' name='pass3' value=''><br>
              <button class='btn btn-primary text-light'> Modifier </button><br>
            </form>";

      echo "  <form action='../controller/home_cours_modifier_compte.php' method='GET'>
                <center>Description :<br>
                <input type='text' name='description' value='".$utilisateur[8]."'>
                <button class='btn btn-primary text-light'> Modifier </button><br>
              </form>";

      echo "  <form action='../controller/home_cours_modifier_compte.php' method='GET'>
                <center>Photo :<br>
                <img width='300px' height='300px' src='$utilisateur[9]'>
              </form><br><br>";

      echo "<form action='../controller/enregistrement_photo_profile.php' method='post' enctype='multipart/form-data'>
            Changer de photo de profil :
            <input type='file' name='fileToUpload' id='fileToUpload'>
            <button class='btn btn-primary' value='Upload Image' name='submit'>Valider</button>
          </form>";
      ?>
    </div>
  </div>
</main>
