<?php

$to = "marc.augier@laposte.net";
$sujet = "envoi de message";
$message = "Essai d'envoi de message depuis php.";

if (mail($to, $sujet, $message)){
	echo "message envoyé";
}else{
	echo "message non envoyé";
}

?>