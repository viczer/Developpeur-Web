<?php
header("Content-type: image/jpeg");
$mon_image = imagecreatefromjpeg("icone.jpg");
$ma_police = dirname(__FILE__)."/WeatherSunday-PersonalUse.ttf";
$ma_couleur = imagecolorallocate($mon_image, 66,75,244);

$msg=$_GET['msg'];
imagettftext($mon_image, 40, 45,80, 200,$ma_couleur, $ma_police, $msg);

imagejpeg($mon_image);
?>