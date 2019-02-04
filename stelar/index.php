<?php

function __autoload($classe){
	echo "<br>Je charge la classe $classe";
	
	if ($pos = strpos($classe,'\\')){
		$classe = str_replace('\\',DIRECTORY_SEPARATOR,$classe);
		include $classe.".php";
	}else{
		include "class/$classe.php";
	}
}

$ma_page = new Page("index");

echo $ma_page;

?>