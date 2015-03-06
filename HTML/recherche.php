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
		 
		preg_match("#http://www.allocine\.fr/seance/[^&]*#",$ret,$res);
		
		$pageFilmAffiche = file_get_contents($res[0]);
		
		preg_match_all("/<\!--\s*picturezone\s*-->\n<div[^*<\/]*<\/div>\n<[^>]*>\n<[^>]*>\n<h2>\n<[^>]*>([^<]*)<\/a>/", $pageFilmAffiche, $titre,PREG_SET_ORDER);
		preg_match_all("/<\!--\s*\/notationbar\s*-->\n<p>\n([^<]*)<\/p>/", $pageFilmAffiche, $description, PREG_SET_ORDER);
		preg_match_all("/<\!--\s*class=\"titlebar\"\s*-->\n<p>\n(.*)\n\(([^\)]*)\)\n[^<]*<b>([^<]*)<\/b>/",$pageFilmAffiche, $information, PREG_SET_ORDER);
		preg_match_all("/<p>\nDe\s<a\shref=\'\/personne\/fichepersonne_gen_cpersonne=[^>]*>([^<]*)<\/a>/",$pageFilmAffiche, $realisateur, PREG_SET_ORDER);
		preg_match_all("/<a\shref=\"\/film\/fichefilm_gen_cfilm=[^>]*><img\ssrc=\'([^\']*)\'[^>]*><\/a>/", $pageFilmAffiche, $image, PREG_SET_ORDER);
		$size = sizeof($titre);

	}
	else if($_GET["q"]  == 'library'){
		$pageLivre = file_get_contents("http://livre.fnac.com/l726/Nouveautes-Livre?ItemPerPage=25&PageIndex=1&ssi=6&sso=2");
		
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
	}
	else if($_GET["q"]  == 'bar'){
		$param = http_build_query(
		   array(
			'alcool' => '1',
			'recherche' => 'Rechercher'
		   )
		);

		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $param
			)
		);

		$result = file_get_contents('http://www.recettes-cocktails.fr/recettes-cocktails/search.php', false, stream_context_create($opts));
		$replace = trim(preg_replace('/\t+|\n|<\/?span[^>]*>/', '', $result));

		preg_match_all('/<section[^>]*><img src=\"([^\"]*)\"(?:[^>]*>){3,3}([^<]*)(?:[^>]*>){3,3}([^<]*)(?:[^>]*>){2,2}[^:]*:([^<]*).*?<\/section>/', $replace, $out, PREG_PATTERN_ORDER);

		$arraysize = sizeof($out);
		
	}
	else {
			echo "<h1>Hin hin hin tu n'as pas dis le mot magique.<h1>";
	}
?>