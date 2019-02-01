<?php
header("Content-type: image/jpeg");
$mon_image = imagecreatefromjpeg("icone.jpg");

$ma_couleur = imagecolorallocate($mon_image, 66,75,244);
imagestring($mon_image, 5, 50, 50, "Bonjour!",$ma_couleur);

imagejpeg($mon_image);
?>