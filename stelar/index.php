<?php

function __autoload($classe){
//	echo "<br>Je charge la classe $classe";
	
	if ($pos = strpos($classe,'\\')){
		$classe = str_replace('\\',DIRECTORY_SEPARATOR,$classe);
		include $classe.".php";
	}else{
		include "class/$classe.php";
	}
}

if(empty($_GET['page'])){
	$page = "index";
}else{
	$page = $_GET['page'];
}

$ma_page = new $page();

echo $ma_page;

?>