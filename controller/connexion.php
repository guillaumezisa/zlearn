<?php
	include("../controller/error_display.php");
	include("../controller/bdd_connexion.php");
	include("../controller/xor.php");

	$pseudo = htmlspecialchars($_POST["pseudo"]);
	$mdp1 = htmlspecialchars($_POST["mdp1"]);

	$xor_key = 'ByTheWay777';
	$signal = base64_encode(xorIt($mdp1, $xor_key));
	$mdp = $signal;
	echo $mdp;

	require("../model/connexion.php");
	$how_much = $bdd_connexion->query($req_login)->fetch();
	$user = $bdd_connexion->query($req_status)->fetch();

	if( $how_much['COUNT(*)'] == 1 ){
				session_start();
				$_SESSION["pseudo"] = $pseudo;
				$_SESSION["id"] = $user["id_utilisateur"];
				if ( $user['status'] === "0"){
						header("location:../controller/home_cours.php");
				} else {
					$_SESSION['status']= "admin";
					header("location:../controller/home_bo.php");
				}

	} else {
		header("location:../index.php?error=wrong");
	}
?>
