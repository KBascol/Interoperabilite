<!DOCTYPE json>

<?php
	if($_GET["activite"]  == 'l'){
		$pageLivre = file_get_contents("http://livre.fnac.com/l726/Nouveautes-Livre?ItemPerPage=20&PageIndex=1&ssi=6&sso=2");
		
		preg_match_all("/<img\s*src=\"([^\"]*)\"\s*alt=\"[^\"]*\"\s*class=\"mrg_r\"/", $pageLivre, $images,PREG_SET_ORDER);
		preg_match_all("/<span\s*class=\"lienInverse\s*title\">[^<]*<a\s*href=\"[^\"]*\"\s*class=\"fontbigger\">([^<]*)<\/a>/", $pageLivre, $titres,PREG_SET_ORDER);
		preg_match_all("/<span\s*class=\"participants[^\"]*\"><a[^>]*>([^<]*)<\/a>(, <a[^>]*>([^<]*)<\/a>)*/", $pageLivre, $auteurs,PREG_SET_ORDER);
		
		$size = sizeof($images);
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
			echo	'"titre" : "'.$titres[$i][1].'",';
			
			echo	'"auteurs" : [';
			$autSize = sizeof($auteurs[$i])-1;
			for($j=1; $j<$autSize; $j+=2) {
				echo '"'.$auteurs[$i][$j].'", ';
			}
			echo '"'.$auteurs[$i][$autSize].'"], ';
			
			echo	'"image" : "'.$images[$i][1].'"';
			echo '}';
			
			$i++;
			if($i < $size){
			 echo ', ';	
			}
		}
		echo ']';
		
	?>

