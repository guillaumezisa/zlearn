<!DOCTYPE html>
<html>
  <head>
    <script src="view/style/bootstrap1.js" ></script>
    <script src="view/style/bootstrap2.js" ></script>
    <script src="view/style/bootstrap3.js" ></script>
    <link rel="stylesheet" href="view/style/bootstrap.css" >
    <link rel="stylesheet" href="view/style/home.css">
    <link rel="stylesheet" href="view/style/index.css">
    <link rel="icon" type="image/png" href="view/images/z.png">
    <title>Zlearn</title>
    <meta charset="UTF-8">

  </head>
  <body>
		<?php
		$ip = $_SERVER["REMOTE_ADDR"];
		$nav = $_SERVER["HTTP_USER_AGENT"];
		$day = date("d.m.y");
		$time = date ("H:i:s");
		$when = "[".$time."|".$day."]";

		$x = $when." ".$where." ".$ip." | ".$nav."\n";
		$monfichier = fopen("logs/logs", 'a+');
		fputs($monfichier, $x);
		fclose($monfichier);
		?>
    <div class="col-12  text-light ">
      <div id="banniere">
        <center><br><h1>Zisa</h1>
        <p>Un site de cours</p><br>
      </div>
    </div>
        <div class="col-12  text-light ">
          <div id='box2'>
          <form action="controller/connexion.php" method="POST">
            <center><br><br>
    				Pseudo :<br><input type="text"size="15"name="pseudo"value=""><br>
    				Mot de passe : <br><input type="password"size="15"name="mdp1"value=""><br>
						<?php if ( isset($_GET['error'])){ echo "<div id='error'><b>Vous avez fait une erreurs dans vos identifiants</b></div>";} elseif ( isset($_GET['subscribe']) && $_GET['subscribe'] === "confirmed"){ echo "<div id='success'><b>Votre compte a bien été crée</b></div>";} else { echo "<br>"; } ?>
            <div class="col-5  text-light "></div>
            <div class="col-2  text-light ">
            <button class="btn btn-primary btn-block">Se connecter</button>

          </form>
    			<form action ="controller/inscription.php" method="GET">
    				<button  class="btn btn-danger btn-block" name='go' value='inscription'>S'inscrire</button><br>
    			</form></h3><br><br></div>
          <div class="col-5  text-light "></div>
        </div>
      </div>
    </div>
  </body>
</html>
