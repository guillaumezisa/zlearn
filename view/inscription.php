<html>
  <head>
    <title>Forum</title>
		<link rel="stylesheet"href="../view/style/index.css"type="text/css">
  </head>
  <body>
    <form action='../index.php'><button class='button'>Retour</button></form>
    <div id='box3'><center>
    <h2>Inscription .</h2>
    <form action="../controller/inscription.php" method='POST'>
      Pseudo :</br>
      <input type="text" name="pseudo" value=''><br>
      <?php if ( isset($_GET['erreur']) && $_GET['erreur'] === 'pseudo' ){ echo "<div id='error'>Votre pseudo doit comporter au moins 3 charactères .<br></div>";} else { echo "<br>";} ?>
      Nom :</br>
      <input type="text" name="nom" value=''><br>
      <?php if ( isset($_GET['erreur']) && $_GET['erreur'] === 'nom' ){ echo "<div id='error'>Votre nom doit comporter au moins 3 charactères .<br></div>";} else { echo "<br>";} ?>
      Prénom :</br>
      <input type="text" name="prenom" value=''><br>
      <?php if ( isset($_GET['erreur']) && $_GET['erreur'] === 'prenom' ){ echo "<div id='error'>Votre prenom doit comporter au moins 3 charactères .<br></div>";} else { echo "<br>";} ?>
      Date de naissance :</br>
      <input type="date" name="naissance" value=''><br>
      Email :</br>
      <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Entrez une email valide ."  name="email" value=''><br>
      Mot de passe :</br>
      <input type="password" name="mdp1" value=''><br>
      Verfication du mot de passe :</br>
      <input type="password" name="mdp2" value=''><br>
      <?php if ( isset($_GET['erreur']) && $_GET['erreur'] === 'pass' ){ echo "<div id='error'>Votre mot de passe doit comporter au moin 3 charactères<br></div>";} elseif ( isset($_GET['erreur']) && $_GET['erreur'] === 'passlen' ){"<div id='error'>Vos mot de passe ne match pas .<br></div>";} else { echo "<br>";} ?>
      <button class='button'name='valide' value='inscription'>Incription</button><br>
    </form>
    </center></div>
  </body>
</html>
