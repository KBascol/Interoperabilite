<!DOCTYPE html>

<?php
	if($_GET["activite"]  == 'l'){
		$pageLivres = fopen("http://ujm.eu5.org/short/dn","r");
		$contenu = "";
		while (!feof($pageLivres)){
			$contenu .= fgets($pageLivres);
		}
		preg_match_all("/<img.*src=\"(.*)\"\sonload.*<h2.*>(.*)<\/h2>/", $contenu, $livres, PREG_SET_ORDER);
		
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
			<h1>Resultats</h1>
		</div>
	</div>
	
	<div id="nav">
		<ol>
			<li><a href="index.html">Accueil</a></li>
			<li><a href="localisation.html">Localisation</a></li>
			<li><a href="http://ujm.eu5.org/short/dn">Sites livres</a></li>
		</ol>
	</div>
	
	<div id="section">
	
	<?php
		foreach ($livres as $val) {
			echo '<div class="article"><img  src="' . $val[1] . '"><br>';
			echo '<h2>' . $val[2] . '</h2></div><br>';
		}
	?>
	
	</div>
	</body>

</html>	

