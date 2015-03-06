<!DOCTYPE json>

<?php
	if($_GET["activite"]  == 'c'){
		$pageFilmAffiche = file_get_contents("http://www.allocine.fr/film/aucinema/");
		
		preg_match_all("/<h2\s*class=\"tt_18 d_inline\s*j_entities\"\s*data-entities=\'{\"entityId\":\"([0-9]+)\",\"label\":\"(.*)\",\"fanCount\":([0-9]+),\"wantToSeeCount\":([0-9]+),\"entityType\":\"Movie\"}\'>/", $pageFilmAffiche, $titre,PREG_SET_ORDER);
		preg_match_all("/<p\s*class=\"margin_5t\">\n([^<]*)\n<\/p>/", $pageFilmAffiche, $description, PREG_SET_ORDER);
		preg_match_all("/<span\s*itemprop=\"datePublished\"[^>]*>([^<]*)<\/span>\s*\(([^\)]*)\)/",$pageFilmAffiche, $dateSorti, PREG_SET_ORDER);
		preg_match_all("/<span\s*class=\"lighten\">Réalisateurs?\s*<\/span>\n<\/th>\n<td>\n<a[^>]*>([^<]*)<\/a>/",$pageFilmAffiche, $realisateur, PREG_SET_ORDER);
		preg_match_all("/<span\s*class=\"lighten\">Genres?\s*<\/th>\n\s*<td>\n\s*<[^<]*<[^>]*>([^<]*)<\/span>/",$pageFilmAffiche, $genre, PREG_SET_ORDER);
		$size = sizeof($titre);
	}
		/*for($i = 0; $i < $size; $i++) {
			echo '<div class="article"><img alt="test"  src="' . $images[$i][1]. '"><br>';
			echo '<h2>'.$titres[$i][1].'</h2>';
			
			echo '<p>';
			
			$autSize = sizeof($auteurs[$i])-1;
			for($j=1; $j<$autSize; $j+=2) {
				echo $auteurs[$i][$j].", ";
			}
			echo $auteurs[$i][$autSize];
			
			echo '</p></div><br>';
		}*/
		echo '[';
		$i = 0; 
		while($i < $size) {
			echo '{';
			echo	'"titre" : '.json_encode($titre[$i][2]).
					',"id" : '.json_encode($titre[$i][1]).
					',"date de sorti" : '.json_encode($dateSorti[$i][1]).
					',"durée" : '.json_encode($dateSorti[$i][2]);

			$realisateurSize = sizeof($realisateur[$i])-1;
			for($j=1; $j<$realisateurSize; $j++) {
				echo	',"réalisateur" : '.json_encode($realisateur[$i][1]);
			}

			$genreSize = sizeof($genre[$i])-1;
			for($j=1; $j<$genreSize; $j++) {
				echo	',"genre" : '.json_encode($genre[$i][1]);
			}
			echo ',"description" : '.json_encode($description[$i][1]);
			echo '}';
			
			$i++;
			if($i < $size){
			 echo ', ';	
			}
		}
		echo ']';
		
	?>

