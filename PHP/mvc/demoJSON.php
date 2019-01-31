<?php


$menuJSON = '{"Accueil":"index", "Le Blog":"blog", "Le catalogue":"catalogue", "Album":"album"}';

$menuJSON = file_get_contents("config/menu.json");

echo "<pre>";
var_dump(json_decode($menuJSON));

echo "<br>".json_last_error();
echo "<br>".json_last_error_msg();

var_dump(json_decode($menuJSON, TRUE));

?>