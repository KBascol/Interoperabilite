<?php
	if($_GET["activite"]  == 'l'){
		$pageLivre = file_get_contents("http://livre.fnac.com/l726/Nouveautes-Livre?ItemPerPage=20&PageIndex=1&ssi=6&sso=2");
		
		preg_match_all("/<img\s*src=\"([^\"]*)\"\s*alt=\"[^\"]*\"\s*class=\"mrg_r\"/", $pageLivre, $images,PREG_SET_ORDER);
		preg_match_all("/<span\s*class=\"lienInverse\s*title\">[^<]*<a\s*href=\"[^\"]*\"\s*class=\"fontbigger\">([^<]*)<\/a>/", $pageLivre, $titres,PREG_SET_ORDER);
		preg_match_all("/<span\s*class=\"participants[^\"]*\"><a[^>]*>([^<]*)<\/a>(, <a[^>]*>([^<]*)<\/a>)*/", $pageLivre, $auteurs,PREG_SET_ORDER);
		
		$size = sizeof($images);
	
		echo '[';
		$i = 0; 
		while($i < $size) {
			echo '{';
			echo	'"titre" : '.json_encode($titres[$i][1]).',';
			
			echo	'"auteurs" : [';
			$autSize = sizeof($auteurs[$i])-1;
			for($j=1; $j<$autSize; $j+=2) {
				echo json_encode($auteurs[$i][$j]).', ';
			}
			echo json_encode($auteurs[$i][$autSize]).'], ';
			
			echo	'"image" : '.json_encode($images[$i][1]);
			echo '}';
			
			$i++;
			if($i < $size){
			 echo ', ';	
			}
		}
		echo ']';
	}
		
	?>

