<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/
$photo = "cervin.jpg";
echo "<h3>photo de départ</h3><img src='depart/$photo'>";
$source = imagecreatefromjpeg("depart/".$photo);
$l = imagesx($source);
$h = imagesy($source);
echo "<br>Les dimensions de départ sont : $l, $h";
$ratio = 4;
$ld = $l/$ratio;
$hd = $h/$ratio;
$destination = imagecreatetruecolor($ld, $hd);
imagecopyresampled($destination, $source,0,0,0,0,$ld, $hd, $l, $h);
imagejpeg($destination,"arrivee/mini_".$photo);
echo "<h3>photo produite</h3><img src='arrivee/mini_$photo'>";
?>
