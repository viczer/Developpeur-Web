<?php

/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

// Connexion à la base de données
$db_host = "localhost:3406";
$db_user = "fanzine";
$db_pass = "top_secret";
$db_name = "fanzine";

$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

if(empty($_POST['cmd'])){
	formulaireConnexion();
}else{
	$cmd = $_POST['cmd'];
	$connect = False;

	switch($cmd){
		case "Connecter":
			$connect = connecteUtilisateur($db, $_POST['pseudo'],$_POST['passe']);
		break;
		case "Nouvel utilisateur":
			nouvelUtilisateur();
		break;
		case "Enregistrer":
			if ($_POST['passe'] != $_POST['passe2']){
				echo "<h2>Les mots de passe sont différents</h2>";
				nouvelUtilisateur();
			} else {
				$connect = enregistreUtilisateur($db, $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['pseudo'],$_POST['passe']);
			}
		break;
		case "Retour connexion":
			formulaireConnexion();
		break;
		default:
			echo "<h2>Bouton inconnu</h2>";
	}
	if($connect){
		echo "Vous êtes connecté";
	}
}

function connecteUtilisateur($db, $pseudo, $passe){
	echo "<h2>connexion</h2>";

	$sql = "SELECT utilisateur_id FROM utilisateur "
	      ."WHERE utilisateur_pseudo = :pseudo AND utilisateur_passe = :passe ;";
	if($resultat = $db->prepare($sql)){
		if($resultat->execute(array(':pseudo' => $pseudo, ':passe' => $passe))){
			if ($utilisateur = $resultat->fetch()){
					echo "connexion acceptée pour ".$utilisateur['utilisateur_id'];
				    return true;
			}else{
				echo "connexion refusée";
			}
		} else {
			echo "info <pre>";
			var_dump($db->errorInfo());
			echo"</pre>";
			echo "code ".$db->errorCode();
		}
	} else {
		echo "info <pre>";
		var_dump($db->errorInfo());
		echo"</pre>";
		echo "code ".$db->errorCode();
	}
	return False;
}

function connecteUtilisateur1($db, $pseudo, $passe){
	echo "<h2>connexion</h2>";

//	$sql = "SELECT utilisateur_id FROM utilisateur WHERE utilisateur_pseudo = '$pseudo' AND utilisateur_passe = '$passe';";
	$sql = "SELECT utilisateur_id, utilisateur_passe FROM utilisateur WHERE utilisateur_pseudo = '$pseudo';";
	echo "<h3>$sql</h3>";
	if ($resultat = $db->query($sql)){
		if ($utilisateur = $resultat->fetch()){
			if ($utilisateur['utilisateur_passe'] == $passe){
				echo "connexion acceptée pour ".$utilisateur['utilisateur_id'];
			}else{
				echo "connexion refusée";
			}
		}else{
			echo "connexion refusée";
		}
	} else {
		echo "info <pre>";
		var_dump($db->errorInfo());
		echo"</pre>";
		echo "code ".$db->errorCode();
	}
}

function nouvelUtilisateur(){

	echo "<form method='post'>
	<input type='text' name='nom' placeholder='Votre nom'><br>
	<input type='text' name='prenom' placeholder='Votre prénom'><br>
	<input type='text' name='pseudo' placeholder='Votre pseudo'><br>
	<input type='email' name='email' placeholder='Votre email'><br>
	<input type='password' name='passe' placeholder='Votre mot de passe'><br>
	<input type='password' name='passe2' placeholder='Entrez de nouveau votre mot de passe'><br>
	<input type='submit' name='cmd' value='Enregistrer'>
	<input type='submit' name='cmd' value='Retour connexion'>
	<input type='reset'  value='Tout effacer'><br>
	</form>";

}

function formulaireConnexion(){

	echo "<form method='post'>
	<input type='text' name='pseudo' placeholder='Votre identifiant'><br>
	<input type='password' name='passe' placeholder='Votre mot de passe'><br>
	<input type='submit' name='cmd' value='Connecter'>
	<input type='submit' name='cmd' value='Nouvel utilisateur'>
	</form>";

}

function enregistreUtilisateur($db, $nom, $prenom, $email, $pseudo,$passe){
	$sql = "INSERT INTO utilisateur "
	."(utilisateur_nom, utilisateur_prenom, utilisateur_email, utilisateur_pseudo, utilisateur_passe)"
	."VALUES(?,?,?,?,?)";
	$resultat = $db->prepare($sql);
	if ($resultat->execute(array($nom, $prenom, $email, $pseudo, $passe))){
		echo "<h2>Nouvel utilisateur enregistré</h2>";
		return True;
	}else{
		return False;
	}
}

?>
