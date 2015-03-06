<?php
	if($_GET["q"] == "movie_theater"){
		// Création d'une ressource cURL
		$ch = curl_init();
		 
		// Définition de l'URL et autres options appropriées
		curl_setopt($ch, CURLOPT_URL, "http://www.google.fr/search?q=allocine+rue+praire+saint+etienne");
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 
		// Récupération de l'URL et passage au navigateur
		$ret=curl_exec($ch);
		// Fermeture de la ressource cURL et libération des ressources systèmes
		curl_close($ch);
		 
		preg_match("#http://www.allocine\.fr/seance/[^&]*#",$ret,$res);//on match une url d'image

	} else if($_GET["q"]  == 'library'){
		$pageLivre = file_get_contents("http://livre.fnac.com/l726/Nouveautes-Livre?ItemPerPage=20&PageIndex=1&ssi=6&sso=2");
		
		preg_match_all("/<img\s*src=\"([^\"]*)\"\s*alt=\"[^\"]*\"\s*class=\"mrg_r\"/", $pageLivre, $images,PREG_SET_ORDER);
		preg_match_all("/<span\s*class=\"lienInverse\s*title\">[^<]*<a\s*href=\"[^\"]*\"\s*class=\"fontbigger\">([^<]*)<\/a>/", $pageLivre, $titres,PREG_SET_ORDER);
		preg_match_all("/<span\s*class=\"participants[^\"]*\"><a[^>]*>([^<]*)<\/a>(, <a[^>]*>([^<]*)<\/a>)*/", $pageLivre, $auteurs,PREG_SET_ORDER);
		preg_match_all("/<span\s*class=\"participants[^\"]*\">(?:<a[^>]*>(?:[^<]*)<\/a>, )*<a[^>]*>([^<]*)<\/a>.*<\/span>[^>]*>[^<]*(?:<div class=\"resume\s*mrg_t_sm\s*gris6\">(?:\n|\s)*(.*))?/", $pageLivre, $description,PREG_SET_ORDER);
		
		$size = sizeof($images);
		
		function descr($description) {
			if(preg_match("/<strong(\n|\s|.)*/", $description) == 0){
				return $description;
			}
			return "Pas de description disponible";
		}
	} else {
			echo "<h1>Hin hin hin tu n'as pas dis le mot magique.<h1>";
	}
?>