<!DOCTYPE json>

<?php
	if($_GET["activite"]  == 'c'){
		$pageFilmAffiche = file_get_contents("http://www.allocine.fr/seance/salle_gen_csalle=P0231.html");
		
		preg_match_all("/<\!--\s*picturezone\s*-->\n<div[^*<\/]*<\/div>\n<[^>]*>\n<[^>]*>\n<h2>\n<[^>]*>([^<]*)<\/a>/", $pageFilmAffiche, $titre,PREG_SET_ORDER);
		preg_match_all("/<\!--\s*\/notationbar\s*-->\n<p>\n([^<]*)<\/p>/", $pageFilmAffiche, $description, PREG_SET_ORDER);
		preg_match_all("/<\!--\s*class=\"titlebar\"\s*-->\n<p>\n(.*)\n\(([^\)]*)\)\n[^<]*<b>([^<]*)<\/b>/",$pageFilmAffiche, $information, PREG_SET_ORDER);
		preg_match_all("/<p>\nDe\s<a\shref=\'\/personne\/fichepersonne_gen_cpersonne=[^>]*>([^<]*)<\/a>/",$pageFilmAffiche, $realisateur, PREG_SET_ORDER);
		preg_match_all("/<a\shref=\"\/film\/fichefilm_gen_cfilm=[^>]*><img\ssrc=\'([^\']*)\'[^>]*><\/a>/", $pageFilmAffiche, $image, PREG_SET_ORDER);

		preg_match_all("/<div\sclass=\"showtimescore js_pane_wrapper\"><div\sclass=\"pane\" rel=\"0\">\n<p>\n<span[^<]*<\/span>,\n<span[^<]*<\/span>\n<\/p>\n<div\s[^<]*<ul>((?:<li(?:\s*class=\"[^\"]*\")?><em[^>]*>\d{2}\:\d{2}<\/em><\/li>)+)/", $pageFilmAffiche, $ligneSeance, PREG_SET_ORDER);

		echo $ligneSeance[0];
		preg_match_all("/>(\d{2}:\d{2})</", $ligneSeance[0], $seances,PREG_SET_ORDER);
		$size = sizeof($titre);
	
		echo '[';
		$i = 0; 
		while($i < $size) {
			echo '{';
			echo	'"titre" : '.json_encode($titre[$i][1]).
					',"date de sorti" : '.json_encode($information[$i][3]).
					',"durée" : '.json_encode($information[$i][2]).
					',"réalisateur" : '.json_encode($realisateur[$i][1]).
					',"genre" : '.json_encode($information[$i][2]).
				 	',"description" : '.json_encode($description[$i][1]).
				 	',"image" : '.json_encode($image[$i][1]);

			$sizeSeances=sizeof($seances);
			echo ', "seances" : ';
			for($j=1;$j<sizeSeances;$j++) {
				echo json_encode($seances[$i][$j]) .',';
			}
				 	
			echo 	'}';
			
			$i++;
			if($i < $size){
			 echo ', ';	
			}
		}
		echo ']';
	}
		
	?>

