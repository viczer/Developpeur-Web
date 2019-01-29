<?php

include 'fonctions.inc.php';

entete("Le eshop de la boutique connectée en ligne sur le Web");

$liste = array(
	"Le chateau de ma mère" => 51,
	"Notre dame de Paris" => 26,
	"Les misérables" => 73,
	"Les fleurs du mal" => 84,
	"L'assomoir" => 65
);

afficheFormulaire($liste);

if(!empty($_POST)){
	enregistreProduitPanier("livre");
}

pied();

?>