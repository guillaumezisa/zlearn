<?php
  if (isset($_GET['go']) && $_GET['go'] === 'inscription'){
    include("../view/inscription.php");
  } else {
    if ( isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['naissance']) && isset($_POST['email']) && isset($_POST['mdp1']) && isset($_POST['mdp2']) ){
      require("../controller/bdd_connexion.php");
      require("../controller/xor.php");
      require("../model/inscription.php");

      $date = date("Y-m-d H:i:s");
    	$pseudo= htmlspecialchars($_POST["pseudo"]);
    	$nom= htmlspecialchars($_POST["nom"]);
      $prenom= htmlspecialchars($_POST["prenom"]);
    	$email = htmlspecialchars($_POST["email"]);
    	$naissance= htmlspecialchars($_POST["naissance"]);
    	$mdp1= htmlspecialchars($_POST["mdp1"]);
    	$mdp2= htmlspecialchars($_POST["mdp2"]);
      $description = "Veuillez entrer une description";
      $photo ="../view/images/utilisateurs/profil_default.jpg";

      if ( strlen($pseudo) < 3 || strlen($pseudo) > 15 ){
        header("location:../controller/inscription.php?go=inscription&erreur=pseudo");
      } elseif ( strlen($nom) < 3 || strlen($nom) > 15 ){
        header("location:../controller/inscription.php?go=inscription&erreur=nom");
      } elseif ( strlen($prenom) < 3 || strlen($prenom) > 15 ){
        header("location:../controller/inscription.php?go=inscription&erreur=prenom");
      } elseif ( strlen($email) < 5 || strlen($email) > 25 ){
         header("location:../controller/inscription.php?go=inscription&erreur=email");
      } elseif ( strlen($mdp1) < 3 || strlen($mdp1) > 15 || strlen($mdp2) < 3 || strlen($mdp2) > 15 ){
         header("location:../controller/inscription.php?go=inscription&erreur=passlen");
      } elseif ( $mdp1 != $mdp2 ){
         header("location:../controller/inscription.php?go=inscription&erreur=pass");
      } else {
        $req_insert_user = $bdd_connexion->prepare($req_insert);
        $req_insert_user->bindParam(':mdp',$mdp);
        $req_insert_user->bindParam(':date_inscription',$date);
        $req_insert_user->bindParam(':pseudo',$pseudo);
        $req_insert_user->bindParam(':nom',$nom);
        $req_insert_user->bindParam(':prenom',$prenom);
        $req_insert_user->bindParam(':date_naissance',$naissance);
        $req_insert_user->bindParam(':email',$email);
        $req_insert_user->bindParam(':description',$description);
        $req_insert_user->bindParam(':photo',$photo);
        $quote = [$nom,$prenom];
      	for ($i=0; $i < 2 ; $i++) {
      	   addslashes($quote[$i]);
      		 for ($j=0; $j < strlen($quote[$i]) ; $j++) {
      	      if ($quote[$i][$j] === "'"){
      	         $dual[$i] = explode("'", $quote[$i]);
      	         $fin[$i] = implode("\\'",$dual[$i]);
      	      } else {
      		 	     $fin[$i] = $quote[$i];
      		 	  }
      	   }
      	}
      	$nom = $fin[0];
      	$prenom = $fin[1];
        require("../model/inscription.php");
        $how_much = $bdd_connexion->query($req_subscribe)->fetch();
        echo '2';
        if( $how_much['COUNT(*)'] == 1 ){
          header("location:../controller/index_controller.php?user=exist");
        } else {
          require("../model/inscription.php");
        	$xor_key = 'ByTheWay777';
        	$signal = base64_encode(xorIt($mdp1, $xor_key));
          $mdp = $signal;
          $req_insert_user->execute();
          header("location:../index.php?subscribe=confirmed");
        }
      }
    }
  }

?>
