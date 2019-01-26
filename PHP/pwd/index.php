<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

echo "<h1>Passwords</h1>";

$passe = "marc";

echo password_hash($passe, PASSWORD_DEFAULT);
echo "<br>";

$hash = password_hash($passe, PASSWORD_DEFAULT); // 60 caractères

echo $hash;
echo "<br>";
if (password_verify($passe, $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

echo "<br><pre>";
print_r( password_get_info( $hash ) );
?>
