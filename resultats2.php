<!DOCTYPE html>

<?php
	if($_GET["activite"]  == 'l'){
		$pageLivre = file_get_contents("http://livre.fnac.com/l726/Nouveautes-Livre?ItemPerPage=20&PageIndex=1&ssi=6&sso=2");
		
		preg_match_all("/<img\s*src=\"([^\"]*)\"\s*alt=\"[^\"]*\"\s*class=\"mrg_r\"/", $pageLivre, $images,PREG_SET_ORDER);
		preg_match_all("/<span\s*class=\"lienInverse\s*title\">[^<]*<a\s*href=\"[^\"]*\"\s*class=\"fontbigger\">([^<]*)<\/a>/", $pageLivre, $titres,PREG_SET_ORDER);
		preg_match_all("/<span\s*class=\"participants[^\"]*\"><a[^>]*>([^<]*)<\/a>(, <a[^>]*>([^<]*)<\/a>)*/", $pageLivre, $auteurs,PREG_SET_ORDER);
		
		$size = sizeof($images);
	}
?>

<html>

	<head>
		<meta name="Author" content="BKNK">
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
		<title>Projet Interopérabilité</title>
	</head>

	<body>
	<div id="header">
		<img src="nyancat.png" alt="nyan cat" title="nyan cat" id="nyan">
		<img src="arcenciel.png" alt="arc en ciel" title="arc en ciel" id="arc">
		<div id="titre">
			<h1>
				Resultats
			</h1>
		</div>
	</div>
	
	<div id="nav">
		<ol>
			<li><a href="index.html">Accueil</a></li>
			<li><a href="localisation.html">Localisation</a></li>
			<li><a href="resultats.php?activite=l">Autre methode</a></li>
			<li><a href="http://ujm.eu5.org/short/dn">Sites livres</a></li>
		</ol>
	</div>
	
	<div id="section">
	
	<?php
		for($i = 0; $i < $size; $i++) {
			echo '<div class="article"><img alt="test"  src="' . $images[$i][1]. '"><br>';
			echo '<h2>'.$titres[$i][1].'</h2>';
			echo '<p>';
			$autSize = sizeof($auteurs[$i])-1;
			for($j=1; $j<$autSize; $j+=2) {
				echo $auteurs[$i][$j].", ";
			}
			echo $auteurs[$i][$autSize];
			echo '</p></div><br>';
		}
	?>
	
	</div>
	</body>

</html>	

