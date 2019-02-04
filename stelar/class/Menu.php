<?php

class Menu
{
	private $menuEntry = "";
	
	function __construct($nom){
		// lecture des entrées de menu d'après dossier page
		$dossier = opendir("pages");
		while($fichier = readdir($dossier)){
			if($fichier[0] != "."){
				$page = substr($fichier, 0, -4);
				$label = $page;
				$this->menuEntry .= "<li><a href='index.php?page=$page'>$label</a>";
			}
		}
	}
	function __toString(){
		$menu    = file_get_contents("template/menu.html"); // lecture du template
		// appliquer ceci à la template
		return Page::coderTemplate($menu, array("contenu-menu"=>$this->menuEntry));		
	}
	
}		
?>