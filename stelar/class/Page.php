<?php

class Page
{
	private $titre_page = "";
	private $sous_titre_page = "";
	private $contenu_page = "";
	
	function __construct($nom){
		$parm_page = json_decode(file_get_contents("pages/$nom.json"),TRUE);
		
		$this->titre_page = $parm_page['titre_page'];
		$this->sous_titre_page =  $parm_page['sous_titre_page'];
		
		$menu = file_get_contents("template/menu.html");
		$contenu = file_get_contents("template/contenu.html");
		$pied = file_get_contents("template/pied.html");
		
		$this->contenu_page = $menu . $contenu . $pied;
	}

	function preparer_page($template, $variables){
	
		foreach($variables as $clef => $variable){
			$template = str_replace("{{ $clef }}", $variable, $template);
		}

	return $template;
}

	function __toString(){
		$template = file_get_contents("template/general.html");
		
		$tableau = array("titre-page" => $this->titre_page,
						 "sous-titre-page" => $this->sous_titre_page,
						 "contenu-page" => $this->contenu_page);
						  
		return $this->preparer_page($template, $tableau);
	}
}

?>